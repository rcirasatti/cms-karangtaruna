<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use App\Models\Profile;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        $profile = Profile::first();
        return view('frontend.kontak.index', compact('kontak', 'profile'));
    }
}
