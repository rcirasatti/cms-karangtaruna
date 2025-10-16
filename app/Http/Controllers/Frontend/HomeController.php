<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Galeri;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $galeriTerbaru = Galeri::latest()->take(6)->get();
        $produkTerbaru = Produk::orderBy('created_at', 'desc')->take(4)->get();
        
        return view('frontend.home', compact('profile', 'galeriTerbaru', 'produkTerbaru'));
    }
}
