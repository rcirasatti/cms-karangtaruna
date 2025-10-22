<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kepengurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KepengurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurus = Kepengurusan::orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.organisasi.index', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tugas' => 'nullable|string|max:500',
            'profil_singkat' => 'nullable|string|max:500',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_tokoh_utama' => 'sometimes|boolean',
            'urutan' => 'nullable|integer|min:0|max:1000',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengurus-fotos', 'public');
            $validated['foto'] = $fotoPath;
        }

        // Set default value for is_tokoh_utama if not provided
        $validated['is_tokoh_utama'] = $request->has('is_tokoh_utama') ? (bool) $request->is_tokoh_utama : false;

        // Get urutan value (default to 0 if not provided)
        $urutanBaru = $validated['urutan'] ?? 0;

        // Shift urutan pengurus yang >= urutan baru
        if ($urutanBaru > 0) {
            Kepengurusan::where('urutan', '>=', $urutanBaru)
                ->increment('urutan');
        }

        Kepengurusan::create($validated);

        return redirect()->route('admin.kepengurusan.index')->with('success', 'Pengurus berhasil ditambahkan.');
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
        $pengurus = Kepengurusan::findOrFail($id);
        return view('admin.organisasi.edit', compact('pengurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $pengurus = Kepengurusan::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'tugas' => 'nullable|string|max:500',
                'profil_singkat' => 'nullable|string|max:500',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'is_tokoh_utama' => 'sometimes|boolean',
                'urutan' => 'nullable|integer|min:0|max:1000',
            ]);

            // Handle foto upload
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($pengurus->foto && Storage::disk('public')->exists($pengurus->foto)) {
                    Storage::disk('public')->delete($pengurus->foto);
                }
                $fotoPath = $request->file('foto')->store('pengurus-fotos', 'public');
                $validated['foto'] = $fotoPath;
            }

            // Set value for is_tokoh_utama
            $validated['is_tokoh_utama'] = $request->has('is_tokoh_utama') ? (bool) $request->is_tokoh_utama : false;

            // Get new urutan value
            $urutanBaru = $validated['urutan'] ?? $pengurus->urutan;
            $urutanLama = $pengurus->urutan;

            // Handle urutan shifting if urutan changed
            if ($urutanBaru != $urutanLama) {
                if ($urutanBaru < $urutanLama) {
                    // Moving up: shift down pengurus with urutan between new and old position
                    Kepengurusan::where('id', '!=', $id)
                        ->where('urutan', '>=', $urutanBaru)
                        ->where('urutan', '<', $urutanLama)
                        ->increment('urutan');
                } else {
                    // Moving down: shift up pengurus with urutan between old and new position
                    Kepengurusan::where('id', '!=', $id)
                        ->where('urutan', '>', $urutanLama)
                        ->where('urutan', '<=', $urutanBaru)
                        ->decrement('urutan');
                }
            }

            $pengurus->update($validated);

            return redirect()->route('admin.kepengurusan.index')
                ->with('success', 'Data pengurus berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('admin.kepengurusan.index')
                ->with('error', 'Gagal memperbarui data pengurus. Silakan coba lagi.');
        }
    }

    /**
     * Toggle tokoh utama status
     */
    public function toggleTokohUtama(Request $request, string $id)
    {
        try {
            $pengurus = Kepengurusan::findOrFail($id);
            $pengurus->is_tokoh_utama = !$pengurus->is_tokoh_utama;
            $pengurus->save();

            return response()->json([
                'success' => true,
                'is_tokoh_utama' => $pengurus->is_tokoh_utama,
                'message' => 'Status tokoh utama berhasil diperbarui!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status tokoh utama.'
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $pengurus = Kepengurusan::findOrFail($id);
            $urutanDihapus = $pengurus->urutan;

            // Hapus foto jika ada
            if ($pengurus->foto && Storage::disk('public')->exists($pengurus->foto)) {
                Storage::disk('public')->delete($pengurus->foto);
            }

            $pengurus->delete();

            // Shift down pengurus with urutan > urutan yang dihapus
            Kepengurusan::where('urutan', '>', $urutanDihapus)
                ->decrement('urutan');

            return redirect()->route('admin.kepengurusan.index')
                ->with('success', 'Data pengurus berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.kepengurusan.index')
                ->with('error', 'Gagal menghapus data pengurus. Silakan coba lagi.');
        }
    }
}
