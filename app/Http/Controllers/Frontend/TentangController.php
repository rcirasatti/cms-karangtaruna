<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('frontend.tentang.index', compact('profile'));
    }

    public function logo()
    {
        $profile = Profile::first();
        return view('frontend.tentang.logo', compact('profile'));
    }

    public function filosofiLogo()
    {
        $profile = Profile::first();
        return view('frontend.tentang.filosofi', compact('profile'));
    }

    public function profil()
    {
        $profile = Profile::first();
        return view('frontend.tentang.profil', compact('profile'));
    }
}
