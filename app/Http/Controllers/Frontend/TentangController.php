<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\FilosofiLogoItem;
use App\Models\Quote;
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
        $filosofiItems = FilosofiLogoItem::ordered()->get();
        return view('frontend.tentang.logo', compact('profile', 'filosofiItems'));
    }

    public function filosofiLogo()
    {
        $profile = Profile::first();
        return view('frontend.tentang.profil', compact('profile'));
    }

    public function profil()
    {
        $profile = Profile::first();
        $quotes = Quote::orderBy('created_at', 'desc')->get();
        return view('frontend.tentang.profil', compact('profile', 'quotes'));
    }
}
