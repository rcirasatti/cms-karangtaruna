<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Helpers\ImageCompressor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_produk' => 'required|string|max:100|unique:produk,nama_produk',
                'deskripsi' => 'required|string|max:1000',
                'harga' => 'nullable|numeric|min:0',
                'kategori' => 'nullable|string|max:100',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'galeri.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ], $this->validationMessages(), $this->validationAttributes());

            if ($request->hasFile('foto')) {
                $validated['foto'] = ImageCompressor::compressToWebp(
                    $request->file('foto'),
                    'produk-fotos'
                );
            }

            $galeriPaths = [];
            if ($request->hasFile('galeri')) {
                foreach ($request->file('galeri') as $file) {
                    $galeriPaths[] = ImageCompressor::compressToWebp($file, 'produk-galeri');
                }
            }
            $validated['galeri'] = !empty($galeriPaths) ? $galeriPaths : null;

            Produk::create($validated);

            return redirect()->route('admin.produk.index')
                ->with('success', 'Data produk berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('admin.produk.index')
                ->with('error', 'Gagal menambahkan data produk. Silakan coba lagi.');
        }
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
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $produk = Produk::findOrFail($id);

            $validated = $request->validate([
                'nama_produk' => 'required|string|max:100|unique:produk,nama_produk,' . $id,
                'deskripsi' => 'required|string|max:1000',
                'harga' => 'nullable|numeric|min:0',
                'kategori' => 'nullable|string|max:100',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'galeri.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ], $this->validationMessages(), $this->validationAttributes());

            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                    Storage::disk('public')->delete($produk->foto);
                }
                $validated['foto'] = ImageCompressor::compressToWebp(
                    $request->file('foto'),
                    'produk-fotos'
                );
            }

            if ($request->hasFile('galeri')) {
                // Hapus galeri lama jika ada
                if ($produk->galeri && is_array($produk->galeri)) {
                    foreach ($produk->galeri as $image) {
                        if (Storage::disk('public')->exists($image)) {
                            Storage::disk('public')->delete($image);
                        }
                    }
                }
                
                $galeriPaths = [];
                foreach ($request->file('galeri') as $file) {
                    $galeriPaths[] = ImageCompressor::compressToWebp($file, 'produk-galeri');
                }
                $validated['galeri'] = $galeriPaths;
            }

            $produk->update($validated);

            return redirect()->route('admin.produk.index')
                ->with('success', 'Data produk berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('admin.produk.index')
                ->with('error', 'Gagal memperbarui data produk. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $produk = Produk::findOrFail($id);

            // Hapus foto jika ada
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }

            // Hapus galeri jika ada
            if ($produk->galeri && is_array($produk->galeri)) {
                foreach ($produk->galeri as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }

            $produk->delete();

            return redirect()->route('admin.produk.index')
                ->with('success', 'Data produk berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.produk.index')
                ->with('error', 'Gagal menghapus data produk. Silakan coba lagi.');
        }
    }
}
