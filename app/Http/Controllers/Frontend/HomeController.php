<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Produk;
use App\Models\Kontak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $galeriTerbaru = Berita::where(function ($query) {
            $query->whereNotNull('media_path')
                  ->orWhereNotNull('link_video');
        })->latest('tanggal_kegiatan')->take(6)->get();
        $produkTerbaru = Produk::orderBy('created_at', 'desc')->take(4)->get();
        $kontak = Kontak::first();
        
        return view('frontend.home', compact('profile', 'galeriTerbaru', 'produkTerbaru', 'kontak'));
    }
}
