<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Galeri;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    /**
     * Display a listing of all galeri (foto & video combined)
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $tipe = $request->input('tipe', '');
        $kegiatan_id = $request->input('kegiatan_id', '');

        $galeris = Galeri::latest()
            ->search($search)
            ->byTipe($tipe)
            ->byKegiatan($kegiatan_id)
            ->paginate(12);

        $kegiatanList = Berita::orderBy('tanggal_kegiatan', 'desc')->get();

        return view('frontend.galeri.index', compact('galeris', 'kegiatanList', 'search', 'tipe', 'kegiatan_id'));
    }

    /**
     * Display foto gallery
     */
    public function foto(Request $request)
    {
        $search = $request->input('search', '');
        $kegiatan_id = $request->input('kegiatan_id', '');

        // Get galeri foto
        $galeris = Galeri::latest()
            ->where('tipe', 'foto')
            ->search($search)
            ->byKegiatan($kegiatan_id)
            ->paginate(12);

        // Get foto dari berita (media_path)
        $beritaFotos = Berita::whereNotNull('media_path')
            ->when($search, function($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%");
            })
            ->latest('tanggal_kegiatan')
            ->get();

        $kegiatanList = Berita::orderBy('tanggal_kegiatan', 'desc')->get();

        return view('frontend.galeri.foto', compact('galeris', 'beritaFotos', 'kegiatanList', 'search', 'kegiatan_id'));
    }

    /**
     * Display video gallery
     */
    public function video(Request $request)
    {
        $search = $request->input('search', '');
        $kegiatan_id = $request->input('kegiatan_id', '');

        // Get galeri video
        $galeris = Galeri::latest()
            ->where('tipe', 'video')
            ->search($search)
            ->byKegiatan($kegiatan_id)
            ->paginate(12);

        // Get video dari berita (link_video)
        $beritaVideos = Berita::whereNotNull('link_video')
            ->where('link_video', '!=', '')
            ->when($search, function($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%");
            })
            ->latest('tanggal_kegiatan')
            ->get();

        $kegiatanList = Berita::orderBy('tanggal_kegiatan', 'desc')->get();

        return view('frontend.galeri.video', compact('galeris', 'beritaVideos', 'kegiatanList', 'search', 'kegiatan_id'));
    }

    /**
     * Display berita/arsip berita
     */
    public function berita(Request $request)
    {
        $search = $request->input('search', '');
        $sort = $request->input('sort', 'terbaru');
        $perPage = $request->input('per_page', 10);

        $query = Berita::where(function ($query) use ($search) {
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        });

        // Apply sorting
        switch ($sort) {
            case 'terlama':
                $query->oldest('tanggal_kegiatan');
                break;
            case 'judul_az':
                $query->orderBy('judul', 'asc');
                break;
            case 'judul_za':
                $query->orderBy('judul', 'desc');
                break;
            default: // 'terbaru'
                $query->latest('tanggal_kegiatan');
        }

        $kegiatans = $query->paginate($perPage);

        return view('frontend.galeri.berita', compact('kegiatans', 'search', 'sort', 'perPage'));
    }

    /**
     * Display berita detail (arsip berita show)
     */
    public function beritaShow($id)
    {
        $kegiatan = Berita::findOrFail($id);

        return view('frontend.galeri.berita-show', compact('kegiatan'));
    }

    /**
     * Display a single galeri item with related items
     */
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        $relatedGaleris = Galeri::where('kegiatan_id', $galeri->kegiatan_id)
            ->where('id', '!=', $id)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.galeri.show', compact('galeri', 'relatedGaleris'));
    }
}
