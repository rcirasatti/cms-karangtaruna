<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('visiMisi'));
    }

    public function visi()
    {
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('visiMisi'));
    }

    public function misi()
    {
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('visiMisi'));
    }

    public function tujuanFungsi()
    {
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('visiMisi'));
    }

    public function nilaiDasar()
    {
        $visiMisi = VisiMisi::first();
        return view('frontend.profil.visimisi', compact('visiMisi'));
    }
}
