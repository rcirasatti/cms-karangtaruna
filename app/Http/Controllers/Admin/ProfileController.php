<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisiMisi;
use App\Helpers\ImageCompressor;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = VisiMisi::first();
        $profil = VisiMisi::first() ?? VisiMisi::create([
            'visi' => '',
            'misi' => '',
            'tujuan' => '',
            'fungsi' => '',
            'nilai_dasar' => [],
            'gambar_visi' => '',
            'gambar_misi' => '',
            'gambar_tujuan' => '',
            'gambar_fungsi' => '',
        ]);

        return view('admin.profil.index', compact('profil', 'profile'));
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
                'nilai_dasar' => 'nullable|array',
                'nilai_dasar.*' => 'nullable|string',
                'visi_align' => 'nullable|in:left,center,right,justify',
                'misi_align' => 'nullable|in:left,center,right,justify',
            'tujuan_align' => 'nullable|in:left,center,right,justify',
            'fungsi_align' => 'nullable|in:left,center,right,justify',
            'nilai_dasar_align' => 'nullable|in:left,center,right,justify',
            'gambar_visi' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'gambar_misi' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'gambar_tujuan' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'gambar_fungsi' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);            $profil = VisiMisi::findOrFail($id);

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
                // Filter out empty values
                $nilaiDasar = array_filter($request->nilai_dasar, function ($value) {
                    return !empty(trim($value));
                });
                // Always update, even if empty array (allow clearing all values)
                $profil->nilai_dasar = array_values($nilaiDasar);
            } elseif ($request->input('nilai_dasar') === null || $request->input('nilai_dasar') === []) {
                // Explicitly set to empty array if nilai_dasar is null or empty
                $profil->nilai_dasar = [];
            }

            // Update alignment fields
            if ($request->has('visi_align')) {
                $profil->visi_align = $request->visi_align;
            }
            if ($request->has('misi_align')) {
                $profil->misi_align = $request->misi_align;
            }
            if ($request->has('tujuan_align')) {
                $profil->tujuan_align = $request->tujuan_align;
            }
            if ($request->has('fungsi_align')) {
                $profil->fungsi_align = $request->fungsi_align;
            }
            if ($request->has('nilai_dasar_align')) {
                $profil->nilai_dasar_align = $request->nilai_dasar_align;
            }

            if ($request->hasFile('gambar_visi')) {
                // Hapus foto lama jika ada
                if ($profil->gambar_visi && Storage::disk('public')->exists($profil->gambar_visi)) {
                    Storage::disk('public')->delete($profil->gambar_visi);
                }
                $profil->gambar_visi = ImageCompressor::compressToWebp(
                    $request->file('gambar_visi'),
                    'profil-gambar'
                );
            }

            if ($request->hasFile('gambar_misi')) {
                // Hapus foto lama jika ada
                if ($profil->gambar_misi && Storage::disk('public')->exists($profil->gambar_misi)) {
                    Storage::disk('public')->delete($profil->gambar_misi);
                }
                $profil->gambar_misi = ImageCompressor::compressToWebp(
                    $request->file('gambar_misi'),
                    'profil-gambar'
                );
            }

            // Handle gambar_tujuan upload
            if ($request->hasFile('gambar_tujuan')) {
                // Hapus foto lama jika ada
                if ($profil->gambar_tujuan && Storage::disk('public')->exists($profil->gambar_tujuan)) {
                    Storage::disk('public')->delete($profil->gambar_tujuan);
                }
                $profil->gambar_tujuan = ImageCompressor::compressToWebp(
                    $request->file('gambar_tujuan'),
                    'profil-gambar'
                );
            }

            if ($request->hasFile('gambar_fungsi')) {
                // Hapus foto lama jika ada
                if ($profil->gambar_fungsi && Storage::disk('public')->exists($profil->gambar_fungsi)) {
                    Storage::disk('public')->delete($profil->gambar_fungsi);
                }
                $profil->gambar_fungsi = ImageCompressor::compressToWebp(
                    $request->file('gambar_fungsi'),
                    'profil-gambar'
                );
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
