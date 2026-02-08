<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Profile;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display the hero section edit form
     */
    public function index()
    {
        // Ambil data hero pertama atau buat baru jika belum ada
        $hero = Hero::first();

        if (!$hero) {
            $hero = new Hero();
        }

        // Ambil data profile untuk logo
        $profile = Profile::first();

        return view('admin.home.herosection', compact('hero', 'profile'));
    }

    /**
     * Update the hero section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'title_navbar' => 'required|string|max:255',
            'subtitle_navbar' => 'nullable|string|max:255',
        ], [
            'title.required' => 'Title Hero wajib diisi',
            'title.max' => 'Title Hero maksimal 255 karakter',
            'subtitle.max' => 'Subtitle Hero maksimal 255 karakter',
            'title_navbar.required' => 'Title Navbar wajib diisi',
            'title_navbar.max' => 'Title Navbar maksimal 255 karakter',
            'subtitle_navbar.max' => 'Subtitle Navbar maksimal 255 karakter',
        ]);

        // Cek apakah sudah ada data hero
        $hero = Hero::first();

        if ($hero) {
            // Update data yang sudah ada
            $hero->update($validated);
            $message = 'Hero section berhasil diperbarui!';
        } else {
            // Buat data baru
            Hero::create($validated);
            $message = 'Hero section berhasil dibuat!';
        }

        return redirect()->route('admin.hero.index')->with('success', $message);
    }
}
