<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use App\Models\Profile;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('profile', 'visiMisi'));
    }

    public function visi()
    {
        $profile = Profile::first();
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('profile', 'visiMisi'));
    }

    public function misi()
    {
        $profile = Profile::first();
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('profile', 'visiMisi'));
    }

    public function tujuanFungsi()
    {
        $profile = Profile::first();
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('profile', 'visiMisi'));
    }

    public function nilaiDasar()
    {
        $profile = Profile::first();
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('profile', 'visiMisi'));
    }

}
