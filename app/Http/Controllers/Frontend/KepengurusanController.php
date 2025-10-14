<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kepengurusan;
use Illuminate\Http\Request;

class KepengurusanController extends Controller
{
    public function index()
    {
        $pengurus = Kepengurusan::orderBy('urutan')->get();
        return view('frontend.kepengurusan.index', compact('pengurus'));
    }

    public function struktur()
    {
        $pengurus = Kepengurusan::orderBy('urutan')->get();
        return view('frontend.kepengurusan.struktur', compact('pengurus'));
    }

    public function tugas()
    {
        $pengurus = Kepengurusan::whereNotNull('tugas')->orderBy('urutan')->get();
        return view('frontend.kepengurusan.tugas', compact('pengurus'));
    }

    public function tokohUtama()
    {
        $tokoh = Kepengurusan::where('is_tokoh_utama', true)->orderBy('urutan')->get();
        return view('frontend.kepengurusan.tokoh', compact('tokoh'));
    }
}
