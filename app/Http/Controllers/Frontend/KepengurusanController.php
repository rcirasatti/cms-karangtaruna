<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kepengurusan;
use App\Models\Profile;
use Illuminate\Http\Request;

class KepengurusanController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $pengurus = Kepengurusan::orderBy('urutan')->get();
        return view('frontend.organisasi.index', compact('profile', 'pengurus'));
    }

    public function struktur()
    {
        $profile = Profile::first();
        $pengurus = Kepengurusan::orderBy('urutan')->get();
        return view('frontend.organisasi.index', compact('profile', 'pengurus'));
    }

    public function tokohUtama()
    {
        $profile = Profile::first();
        $tokoh = Kepengurusan::where('is_tokoh_utama', true)->orderBy('urutan')->get();
        return view('frontend.organisasi.index', compact('profile', 'tokoh'));
    }
}
