<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Helpers\ImageCompressor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = \App\Models\Profile::first();
        $berita = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('berita', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = \App\Models\Profile::first();
        return view('admin.berita.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:150|unique:berita,judul',
                'deskripsi' => 'nullable|string|max:2000',
                'tanggal_kegiatan' => 'required|date',
                'kategori' => 'required|string|max:100',
                'link_video' => 'nullable|string|max:500',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'media_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ], $this->validationMessages(), $this->validationAttributes());

            if ($request->hasFile('thumbnail')) {
                $validated['thumbnail'] = ImageCompressor::compressToWebp(
                    $request->file('thumbnail'),
                    'berita-thumbnail'
                );
            }

            $mediaPaths = [];
            if ($request->hasFile('media_path')) {
                foreach ($request->file('media_path') as $file) {
                    $mediaPaths[] = ImageCompressor::compressToWebp($file, 'berita-media');
                }
            }
            $validated['media_path'] = !empty($mediaPaths) ? $mediaPaths : null;

            Berita::create($validated);

            return redirect()->route('admin.berita.index')
                ->with('success', 'Data berita berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Berita Create Error: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all()
            ]);
            return redirect()->route('admin.berita.index')
                ->with('error', 'Gagal menambahkan data berita. ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = \App\Models\Profile::first();
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $berita = Berita::findOrFail($id);

            $validated = $request->validate([
                'judul' => 'required|string|max:150|unique:berita,judul,' . $id,
                'deskripsi' => 'nullable|string|max:2000',
                'tanggal_kegiatan' => 'required|date',
                'kategori' => 'required|string|max:100',
                'link_video' => 'nullable|string|max:500',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'media_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ], $this->validationMessages(), $this->validationAttributes());

            if ($request->hasFile('thumbnail')) {
                // Hapus thumbnail lama jika ada
                if ($berita->thumbnail && Storage::disk('public')->exists($berita->thumbnail)) {
                    Storage::disk('public')->delete($berita->thumbnail);
                }
                $validated['thumbnail'] = ImageCompressor::compressToWebp(
                    $request->file('thumbnail'),
                    'berita-thumbnail'
                );
            }

            if ($request->hasFile('media_path')) {
                // Hapus media lama jika ada
                if ($berita->media_path && is_array($berita->media_path)) {
                    foreach ($berita->media_path as $image) {
                        if (Storage::disk('public')->exists($image)) {
                            Storage::disk('public')->delete($image);
                        }
                    }
                }
                
                $mediaPaths = [];
                foreach ($request->file('media_path') as $file) {
                    $mediaPaths[] = ImageCompressor::compressToWebp($file, 'berita-media');
                }
                $validated['media_path'] = $mediaPaths;
            }

            $berita->update($validated);

            return redirect()->route('admin.berita.index')
                ->with('success', 'Data berita berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Berita Update Error: ' . $e->getMessage(), [
                'exception' => $e,
                'berita_id' => $id
            ]);
            return redirect()->route('admin.berita.index')
                ->with('error', 'Gagal memperbarui data berita. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $berita = Berita::findOrFail($id);

            // Hapus thumbnail jika ada
            if ($berita->thumbnail && Storage::disk('public')->exists($berita->thumbnail)) {
                Storage::disk('public')->delete($berita->thumbnail);
            }

            // Hapus media jika ada
            if ($berita->media_path && is_array($berita->media_path)) {
                foreach ($berita->media_path as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }

            $berita->delete();

            return redirect()->route('admin.berita.index')
                ->with('success', 'Data berita berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.berita.index')
                ->with('error', 'Gagal menghapus data berita. Silakan coba lagi.');
        }
    }
}
