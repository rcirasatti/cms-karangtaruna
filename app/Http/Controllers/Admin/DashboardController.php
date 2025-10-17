<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Produk;
use App\Models\Mitra;
use App\Models\Kepengurusan;
use App\Models\Galeri;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $data = [
            'total_berita' => Berita::count(),
            'total_produk' => Produk::count(),
            'total_mitra' => Mitra::count(),
            'total_kepengurusan' => Kepengurusan::count(),
            'total_galeri' => Galeri::count(),
            'berita_terbaru' => Berita::orderBy('created_at', 'desc')->take(5)->get(),
            'produk_terbaru' => Produk::orderBy('created_at', 'desc')->take(5)->get(),
        ];

        return view('admin.dashboard.index', $data);
    }
}
