<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisiMisi;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = VisiMisi::first() ?? VisiMisi::create([
            'visi' => '',
            'misi' => '',
            'tujuan' => '',
            'fungsi' => '',
            'nilai_dasar' => '',
            'gambar_visi' => '',
            'gambar_misi' => '',
            'gambar_tujuan' => '',
            'gambar_fungsi' => '',
        ]);

        return view('admin.profil.index', compact('profil'));
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'visi' => 'nullable|string',
                'misi' => 'nullable|string',
                'tujuan' => 'nullable|string',
                'fungsi' => 'nullable|string',
                'nilai_dasar' => 'nullable|string',
                'gambar_visi' => 'nullable|string',
                'gambar_misi' => 'nullable|string',
                'gambar_tujuan' => 'nullable|string',
                'gambar_fungsi' => 'nullable|string',
            ]);

            $profil = VisiMisi::findOrFail($id);
            $profil->update($validated);

            return redirect()->route('admin.profil.index')
                ->with('success', 'Data profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.profil.index')
                ->with('error', 'Gagal memperbarui data profil. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
