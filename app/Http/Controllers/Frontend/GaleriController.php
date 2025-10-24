<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    /**
     * Display a listing of all galeri (foto & video combined)
     */
    public function index(Request $request)
    {
        $profile = Profile::first();
        $search = $request->input('search', '');
        $tipe = $request->input('tipe', '');
        $kegiatan_id = $request->input('kegiatan_id', '');

        $query = Berita::query();

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($tipe == 'foto') {
            $query->whereNotNull('media_path');
        } elseif ($tipe == 'video') {
            $query->whereNotNull('link_video');
        } else {
            $query->where(function ($q) {
                $q->whereNotNull('media_path')->orWhereNotNull('link_video');
            });
        }

        if ($kegiatan_id) {
            $query->where('id', $kegiatan_id);
        }

        $galeris = $query->latest('tanggal_kegiatan')->paginate(12);

        $kegiatanList = Berita::orderBy('tanggal_kegiatan', 'desc')->get();

        return view('frontend.galeri.index', compact('galeris', 'kegiatanList', 'search', 'tipe', 'kegiatan_id', 'profile'));
    }

    /**
     * Display foto gallery
     */
    public function foto(Request $request)
    {
        $profile = Profile::first();
        $search = $request->input('search', '');
        $kegiatan_id = $request->input('kegiatan_id', '');

        $query = Berita::whereNotNull('media_path');

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($kegiatan_id) {
            $query->where('id', $kegiatan_id);
        }

        $galeris = $query->latest('tanggal_kegiatan')->paginate(12);
        
        // Get all berita with photos for display
        $beritaFotosQuery = Berita::whereNotNull('media_path');
        if ($search) {
            $beritaFotosQuery->where('judul', 'like', "%{$search}%");
        }
        if ($kegiatan_id) {
            $beritaFotosQuery->where('id', $kegiatan_id);
        }
        $beritaFotos = $beritaFotosQuery->latest('tanggal_kegiatan')->get();

        $kegiatanList = Berita::orderBy('tanggal_kegiatan', 'desc')->get();

        return view('frontend.galeri.foto', compact('galeris', 'beritaFotos', 'kegiatanList', 'search', 'kegiatan_id', 'profile'));
    }

    /**
     * Display video gallery
     */
    public function video(Request $request)
    {
        $profile = Profile::first();
        $search = $request->input('search', '');
        $kegiatan_id = $request->input('kegiatan_id', '');

        $query = Berita::whereNotNull('link_video')->where('link_video', '!=', '');

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($kegiatan_id) {
            $query->where('id', $kegiatan_id);
        }

        $galeris = $query->latest('tanggal_kegiatan')->paginate(12);
        
        // Get all berita with videos for display
        $beritaVideosQuery = Berita::whereNotNull('link_video')->where('link_video', '!=', '');
        if ($search) {
            $beritaVideosQuery->where('judul', 'like', "%{$search}%");
        }
        if ($kegiatan_id) {
            $beritaVideosQuery->where('id', $kegiatan_id);
        }
        $beritaVideos = $beritaVideosQuery->latest('tanggal_kegiatan')->get();

        $kegiatanList = Berita::orderBy('tanggal_kegiatan', 'desc')->get();

        return view('frontend.galeri.video', compact('galeris', 'beritaVideos', 'kegiatanList', 'search', 'kegiatan_id', 'profile'));
    }

    /**
     * Display berita/arsip berita
     */
    public function berita(Request $request)
    {
        $profile = Profile::first();
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

        return view('frontend.galeri.berita', compact('kegiatans', 'search', 'sort', 'perPage', 'profile'));
    }

    /**
     * Display berita detail (arsip berita show)
     */
    public function beritaShow($id)
    {
        $kegiatan = Berita::findOrFail($id);
        $profile = Profile::first();

        return view('frontend.galeri.berita-show', compact('kegiatan', 'profile'));
    }
}
