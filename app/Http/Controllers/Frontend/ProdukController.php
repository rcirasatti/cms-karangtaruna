<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Mitra;
use App\Models\Kontak;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {

        $produk = Produk::paginate(12);
        $mitra = Mitra::all();
        $profile = Profile::first();
        return view('frontend.produk.index', compact('produk', 'mitra', 'profile'));
    }

    public function produk(Request $request)
    {
        $profile = Profile::first();
        $kategori = $request->get('kategori');
        $search = $request->get('search');
        $sort = $request->get('sort', 'nama_produk'); // default sort by nama_produk
        
        // Ambil semua kategori yang ada
        $kategoris = Produk::whereNotNull('kategori')
                           ->distinct()
                           ->pluck('kategori');
        
        // Filter produk berdasarkan kategori dan search jika ada
        $query = Produk::query();
        
        if ($kategori) {
            $query->where('kategori', $kategori);
        }
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_produk', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%');
            });
        }
        
        // Apply sorting
        switch ($sort) {
            case 'harga_asc':
                $query->orderBy('harga', 'asc');
                break;
            case 'harga_desc':
                $query->orderBy('harga', 'desc');
                break;
            case 'nama_produk':
                $query->orderBy('nama_produk', 'asc');
                break;
            case 'terbaru':
                $query->orderBy('created_at', 'desc');
                break;
            case 'terlama':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->orderBy('nama_produk', 'asc');
        }
        
        $produk = $query->paginate(9)->appends($request->query());
        $kontak = Kontak::first();
        $profile = Profile::first();

        return view('frontend.produk.produk', compact('produk', 'kontak', 'kategoris', 'kategori', 'search', 'sort', 'profile'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $profile = Profile::first();
        return view('frontend.produk.show', compact('produk', 'profile'));
    }

    public function mitra(Request $request)
    {
        $profile = Profile::first();
        $search = $request->get('search');
        $jenis = $request->get('jenis');

        // Build query with filters
        $query = Mitra::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_mitra', 'like', '%' . $search . '%')
                  ->orWhere('jenis', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        if ($jenis) {
            $query->where('jenis', $jenis);
        }

        $mitra = $query->get();

        // Get all unique jenis for filter dropdown
        $jenisOptions = Mitra::distinct()->pluck('jenis')->filter()->values();

        return view('frontend.produk.mitra', compact('mitra', 'search', 'jenis', 'jenisOptions', 'profile'));
    }

    public function testimoni()
    {
        $profile = Profile::first();
        $testimoni = Mitra::whereNotNull('testimoni')->get();
        return view('frontend.produk.testimoni', compact('testimoni', 'profile'));
    }
}
