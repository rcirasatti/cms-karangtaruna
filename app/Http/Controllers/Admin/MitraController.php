<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitra = Mitra::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.mitra.index', compact('mitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_mitra' => 'required|string|max:100|unique:mitra,nama_mitra',
                'jenis' => 'required|string|max:100',
                'deskripsi' => 'nullable|string|max:1000',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'kontak' => 'nullable|string|max:100',
                'testimoni' => 'nullable|string|max:1000'
            ], $this->validationMessages(), $this->validationAttributes());

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('mitra-logos', 'public');
                $validated['logo'] = $logoPath;
            }

            Mitra::create($validated);

            return redirect()->route('admin.mitra.index')
                ->with('success', 'Data mitra berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('admin.mitra.index')
                ->with('error', 'Gagal menambahkan data mitra. Silakan coba lagi.');
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
        $mitra = Mitra::findOrFail($id);
        return view('admin.mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $mitra = Mitra::findOrFail($id);

            $validated = $request->validate([
                'nama_mitra' => 'required|string|max:100|unique:mitra,nama_mitra,' . $id,
                'jenis' => 'required|string|max:100',
                'deskripsi' => 'nullable|string|max:1000',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'kontak' => 'nullable|string|max:100',
                'testimoni' => 'nullable|string|max:1000'
            ], $this->validationMessages(), $this->validationAttributes());

            if ($request->hasFile('logo')) {
                // Hapus logo lama jika ada
                if ($mitra->logo && Storage::disk('public')->exists($mitra->logo)) {
                    Storage::disk('public')->delete($mitra->logo);
                }
                $logoPath = $request->file('logo')->store('mitra-logos', 'public');
                $validated['logo'] = $logoPath;
            }

            $mitra->update($validated);

            return redirect()->route('admin.mitra.index')
                ->with('success', 'Data mitra berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('admin.mitra.index')
                ->with('error', 'Gagal memperbarui data mitra. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $mitra = Mitra::findOrFail($id);

            // Hapus logo jika ada
            if ($mitra->logo && Storage::disk('public')->exists($mitra->logo)) {
                Storage::disk('public')->delete($mitra->logo);
            }

            $mitra->delete();

            return redirect()->route('admin.mitra.index')
                ->with('success', 'Data mitra berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.mitra.index')
                ->with('error', 'Gagal menghapus data mitra. Silakan coba lagi.');
        }
    }
}
