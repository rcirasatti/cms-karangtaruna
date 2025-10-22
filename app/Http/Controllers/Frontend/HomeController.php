<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Berita;
use App\Models\Produk;
use App\Models\Kontak;
use App\Models\Quote;
use App\Models\Hero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        $hero = Hero::first();

        // Ambil foto-foto untuk hero slider
        $heroSlides = Berita::whereNotNull('media_path')
            ->latest('tanggal_kegiatan')
            ->take(5)
            ->get()
            ->map(function ($berita) {
                // Ambil foto pertama dari media_path
                $images = is_array($berita->media_path) ? $berita->media_path : [];
                return [
                    'image' => !empty($images) ? $images[0] : null,
                    'judul' => $berita->judul,
                    'tanggal' => $berita->tanggal_kegiatan
                ];
            })
            ->filter(function ($slide) {
                return $slide['image'] !== null;
            })
            ->values();

        $galeriTerbaru = Berita::where(function ($query) {
            $query->whereNotNull('media_path')
                ->orWhereNotNull('link_video');
        })->latest('tanggal_kegiatan')->take(6)->get();
        $produkTerbaru = Produk::orderBy('created_at', 'desc')->take(4)->get();
        $kontak = Kontak::first();
        $quotes = Quote::latest()->get();

        return view('frontend.home', compact('hero', 'profile', 'heroSlides', 'galeriTerbaru', 'produkTerbaru', 'kontak', 'quotes'));
    }

}