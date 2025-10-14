<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('tanggal_kegiatan', 'desc')->paginate(12);
        return view('frontend.kegiatan.index', compact('kegiatan'));
    }

    public function galeri()
    {
        $kegiatan = Kegiatan::where('kategori', 'galeri')
                           ->orderBy('tanggal_kegiatan', 'desc')
                           ->paginate(12);
        return view('frontend.kegiatan.galeri', compact('kegiatan'));
    }

    public function video()
    {
        $kegiatan = Kegiatan::where('kategori', 'video')
                           ->orderBy('tanggal_kegiatan', 'desc')
                           ->paginate(12);
        return view('frontend.kegiatan.video', compact('kegiatan'));
    }

    public function berita()
    {
        $kegiatan = Kegiatan::where('kategori', 'berita')
                           ->orderBy('tanggal_kegiatan', 'desc')
                           ->paginate(12);
        return view('frontend.kegiatan.berita', compact('kegiatan'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('frontend.kegiatan.show', compact('kegiatan'));
    }
}
