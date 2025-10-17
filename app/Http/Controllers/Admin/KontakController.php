<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::first() ?? Kontak::create([
            'alamat_sekretariat' => '',
            'telepon' => '',
            'whatsapp' => '',
            'email' => '',
            'instagram' => '',
            'facebook' => '',
            'twitter' => '',
            'youtube' => ''
        ]);
        
        return view('admin.kontak.index', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
                'alamat_sekretariat' => 'nullable|string|max:500',
                'telepon' => 'nullable|string|max:20',
                'whatsapp' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:100',
                'instagram' => 'nullable|string|max:100',
                'facebook' => 'nullable|string|max:100',
                'twitter' => 'nullable|string|max:100',
                'youtube' => 'nullable|string|max:100'
            ]);

            $kontak = Kontak::findOrFail($id);
            $kontak->update($validated);

            return redirect()->route('admin.kontak.index')
                ->with('success', 'Data kontak berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.kontak.index')
                ->with('error', 'Gagal memperbarui data kontak. Silakan coba lagi.');
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
