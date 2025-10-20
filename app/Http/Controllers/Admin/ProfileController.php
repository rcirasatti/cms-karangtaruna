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

            // Handle gambar_visi upload
            if ($request->hasFile('gambar_visi')) {
                // Delete old image if exists
                if ($profil->gambar_visi && file_exists(public_path($profil->gambar_visi))) {
                    unlink(public_path($profil->gambar_visi));
                }

                $file = $request->file('gambar_visi');
                $fileName = time() . '_visi_' . $file->getClientOriginalName();
                $file->move(public_path('images/profil'), $fileName);
                $profil->gambar_visi = 'images/profil/' . $fileName;
            }

            // Handle gambar_misi upload
            if ($request->hasFile('gambar_misi')) {
                // Delete old image if exists
                if ($profil->gambar_misi && file_exists(public_path($profil->gambar_misi))) {
                    unlink(public_path($profil->gambar_misi));
                }

                $file = $request->file('gambar_misi');
                $fileName = time() . '_misi_' . $file->getClientOriginalName();
                $file->move(public_path('images/profil'), $fileName);
                $profil->gambar_misi = 'images/profil/' . $fileName;
            }

            // Handle gambar_tujuan upload
            if ($request->hasFile('gambar_tujuan')) {
                // Delete old image if exists
                if ($profil->gambar_tujuan && file_exists(public_path($profil->gambar_tujuan))) {
                    unlink(public_path($profil->gambar_tujuan));
                }

                $file = $request->file('gambar_tujuan');
                $fileName = time() . '_tujuan_' . $file->getClientOriginalName();
                $file->move(public_path('images/profil'), $fileName);
                $profil->gambar_tujuan = 'images/profil/' . $fileName;
            }

            // Handle gambar_fungsi upload
            if ($request->hasFile('gambar_fungsi')) {
                // Delete old image if exists
                if ($profil->gambar_fungsi && file_exists(public_path($profil->gambar_fungsi))) {
                    unlink(public_path($profil->gambar_fungsi));
                }

                $file = $request->file('gambar_fungsi');
                $fileName = time() . '_fungsi_' . $file->getClientOriginalName();
                $file->move(public_path('images/profil'), $fileName);
                $profil->gambar_fungsi = 'images/profil/' . $fileName;
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
