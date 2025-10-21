<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisiMisi;
use Illuminate\Support\Facades\Storage;

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
                'gambar_visi' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'gambar_misi' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'gambar_tujuan' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'gambar_fungsi' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $profil = VisiMisi::findOrFail($id);

            // Update text fields only if they are present in request
            if ($request->has('visi')) {
                $profil->visi = $request->visi;
            }
            if ($request->has('misi')) {
                $profil->misi = $request->misi;
            }
            if ($request->has('tujuan')) {
                $profil->tujuan = $request->tujuan;
            }
            if ($request->has('fungsi')) {
                $profil->fungsi = $request->fungsi;
            }
            if ($request->has('nilai_dasar')) {
                $profil->nilai_dasar = $request->nilai_dasar;
            }

            if ($request->hasFile('gambar_visi')) {
                // Hapus foto lama jika ada
                if ($profil->gambar_visi && Storage::disk('public')->exists($profil->gambar_visi)) {
                    Storage::disk('public')->delete($profil->gambar_visi);
                }
                $fotoPath = $request->file('gambar_visi')->store('profil-gambar', 'public');
                $profil->gambar_visi = $fotoPath;
            }

            if ($request->hasFile('gambar_misi')) {
                // Hapus foto lama jika ada
                if ($profil->gambar_misi && Storage::disk('public')->exists($profil->gambar_misi)) {
                    Storage::disk('public')->delete($profil->gambar_misi);
                }
                $fotoPath = $request->file('gambar_misi')->store('profil-gambar', 'public');
                $profil->gambar_misi = $fotoPath;
            }

            // Handle gambar_tujuan upload
            if ($request->hasFile('gambar_tujuan')) {
                // Hapus foto lama jika ada
                if ($profil->gambar_tujuan && Storage::disk('public')->exists($profil->gambar_tujuan)) {
                    Storage::disk('public')->delete($profil->gambar_tujuan);
                }
                $fotoPath = $request->file('gambar_tujuan')->store('profil-gambar', 'public');
                $profil->gambar_tujuan = $fotoPath;
            }

            if ($request->hasFile('gambar_fungsi')) {
                // Hapus foto lama jika ada
                if ($profil->gambar_fungsi && Storage::disk('public')->exists($profil->gambar_fungsi)) {
                    Storage::disk('public')->delete($profil->gambar_fungsi);
                }
                $fotoPath = $request->file('gambar_fungsi')->store('profil-gambar', 'public');
                $profil->gambar_fungsi = $fotoPath;
            }

            $profil->save();

            return redirect()->route('admin.profile.index')
                ->with('success', 'Data profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.profile.index')
                ->with('error', 'Gagal memperbarui data profil: ' . $e->getMessage());
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
