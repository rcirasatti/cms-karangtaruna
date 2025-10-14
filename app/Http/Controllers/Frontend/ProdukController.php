<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Mitra;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::paginate(12);
        $mitra = Mitra::all();
        return view('frontend.produk.index', compact('produk', 'mitra'));
    }

    public function produk()
    {
        $produk = Produk::paginate(12);
        return view('frontend.produk.produk', compact('produk'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('frontend.produk.show', compact('produk'));
    }

    public function mitra()
    {
        $mitra = Mitra::all();
        return view('frontend.produk.mitra', compact('mitra'));
    }

    public function testimoni()
    {
        $testimoni = Mitra::whereNotNull('testimoni')->get();
        return view('frontend.produk.testimoni', compact('testimoni'));
    }
}
