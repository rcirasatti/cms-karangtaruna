<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\FilosofiLogoItem;
use App\Models\Quote;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // return view('admin.about.index');
    }

    public function logo()
    {
        $profile = Profile::first() ?? Profile::create([
            'nama_organisasi' => '',
            'alamat' => '',
            'tahun_berdiri' => '',
            'legalitas' => '',
            'sejarah' => '',
            'profil_singkat' => '',
            'logo_path' => '',
            'filosofi_logo' => ''
        ]);

        $filosofiItems = FilosofiLogoItem::ordered()->get();

        return view('admin.about.logo', compact('profile', 'filosofiItems'));
    }

    public function update_logo(Request $request)
    {
        $request->validate([
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_url' => 'nullable|url',
            'filosofi_logo' => 'required|string',
            'filosofi_items' => 'nullable|array',
            'filosofi_items.*.title' => 'required|string|max:255',
            'filosofi_items.*.description' => 'required|string',
            'filosofi_items.*.icon' => 'nullable|string',
            'filosofi_items.*.gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'filosofi_items.*.use_icon' => 'required|boolean',
            'filosofi_items.*.urutan' => 'required|integer',
        ]);

        $profile = Profile::first();
        if (!$profile) {
            $profile = Profile::create([
                'nama_organisasi' => '',
                'alamat' => '',
                'tahun_berdiri' => '',
                'legalitas' => '',
                'sejarah' => '',
                'profil_singkat' => '',
                'logo_path' => '',
                'filosofi_logo' => $request->filosofi_logo
            ]);
        }

        $data = ['filosofi_logo' => $request->filosofi_logo];

        // Handle logo upload or URL
        if ($request->hasFile('logo_path')) {
            // Delete old logo if exists and it's not a URL
            if ($profile->logo_path && !preg_match('/^https?:\/\//i', $profile->logo_path) && \Storage::disk('public')->exists($profile->logo_path)) {
                \Storage::disk('public')->delete($profile->logo_path);
            }

            // Store new logo
            $logoPath = $request->file('logo_path')->store('logos', 'public');
            $data['logo_path'] = $logoPath;
        } elseif ($request->filled('logo_url')) {
            // Delete old logo if exists and it's not a URL
            if ($profile->logo_path && !preg_match('/^https?:\/\//i', $profile->logo_path) && \Storage::disk('public')->exists($profile->logo_path)) {
                \Storage::disk('public')->delete($profile->logo_path);
            }

            // Save URL directly
            $data['logo_path'] = $request->logo_url;
        }

        $profile->update($data);

        // Handle filosofi items
        if ($request->has('filosofi_items')) {
            // Get existing item IDs from request
            $requestItemIds = collect($request->filosofi_items)
                ->pluck('id')
                ->filter()
                ->toArray();

            // Delete items that are not in the request
            $itemsToDelete = FilosofiLogoItem::whereNotIn('id', $requestItemIds)->get();
            foreach ($itemsToDelete as $item) {
                // Delete associated image if exists
                if ($item->gambar && \Storage::disk('public')->exists($item->gambar)) {
                    \Storage::disk('public')->delete($item->gambar);
                }
                $item->delete();
            }

            // Update or create items
            foreach ($request->filosofi_items as $index => $itemData) {
                $useIcon = filter_var($itemData['use_icon'], FILTER_VALIDATE_BOOLEAN);

                $data = [
                    'title' => $itemData['title'],
                    'description' => $itemData['description'],
                    'urutan' => $itemData['urutan'],
                ];

                // Handle icon or image based on use_icon
                if ($useIcon) {
                    $data['icon'] = $itemData['icon'] ?? 'star';
                    $data['gambar'] = null;
                } else {
                    $data['icon'] = null;

                    // Handle image upload
                    if ($request->hasFile("filosofi_items.{$index}.gambar")) {
                        // Delete old image if updating existing item
                        if (isset($itemData['id']) && $itemData['id']) {
                            $existingItem = FilosofiLogoItem::find($itemData['id']);
                            if ($existingItem && $existingItem->gambar && \Storage::disk('public')->exists($existingItem->gambar)) {
                                \Storage::disk('public')->delete($existingItem->gambar);
                            }
                        }

                        $imagePath = $request->file("filosofi_items.{$index}.gambar")->store('filosofi', 'public');
                        $data['gambar'] = $imagePath;
                    }
                }

                if (isset($itemData['id']) && $itemData['id']) {
                    // Update existing item
                    $item = FilosofiLogoItem::find($itemData['id']);
                    if ($item) {
                        // If changing from image to icon, delete old image
                        if ($useIcon && $item->gambar && \Storage::disk('public')->exists($item->gambar)) {
                            \Storage::disk('public')->delete($item->gambar);
                        }
                        $item->update($data);
                    }
                } else {
                    // Create new item
                    FilosofiLogoItem::create($data);
                }
            }
        } else {
            // If no items in request, delete all items and their images
            $allItems = FilosofiLogoItem::all();
            foreach ($allItems as $item) {
                if ($item->gambar && \Storage::disk('public')->exists($item->gambar)) {
                    \Storage::disk('public')->delete($item->gambar);
                }
                $item->delete();
            }
        }

        return redirect()->back()->with('success', 'Logo, filosofi logo, dan item filosofi berhasil diperbarui.');
    }

    public function sejarah()
    {
        $profile = Profile::first() ?? Profile::create([
            'sejarah' => ''
        ]);

        $quote = Quote::find(1) ?? Quote::create([
            'id' => 1,
            'nama' => 'Nama Tokoh',
            'peran' => 'Jabatan/Peran',
            'quote' => 'Kutipan inspiratif...'
        ]);

        return view('admin.about.sejarah', compact('profile', 'quote'));
    }

    public function update_sejarah(Request $request)
    {
        $request->validate([
            'sejarah' => 'required|string'
        ]);

        $profile = Profile::first();
        if (!$profile) {
            $profile = Profile::create([
                'nama_organisasi' => '',
                'alamat' => '',
                'tahun_berdiri' => '',
                'legalitas' => '',
                'sejarah' => $request->sejarah,
                'profil_singkat' => '',
                'logo_path' => '',
                'filosofi_logo' => ''
            ]);
        } else {
            $profile->update([
                'sejarah' => $request->sejarah
            ]);
        }

        return redirect()->back()->with('success', 'Sejarah organisasi berhasil diperbarui.');
    }

    public function update_identitas(Request $request)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'tahun_berdiri' => 'required|integer',
            'legalitas' => 'nullable|string|max:255',
            'alamat' => 'required|string',
            'profil_singkat' => 'required|string'
        ]);

        $profile = Profile::first();
        if (!$profile) {
            return redirect()->back()->with('error', 'Data profil tidak ditemukan.');
        }

        $profile->update([
            'nama_organisasi' => $request->nama_organisasi,
            'tahun_berdiri' => $request->tahun_berdiri,
            'legalitas' => $request->legalitas,
            'alamat' => $request->alamat,
            'profil_singkat' => $request->profil_singkat
        ]);

        return redirect()->back()->with('success', 'Identitas dan profil organisasi berhasil diperbarui.');
    }

    public function update_quote(Request $request)
    {
        $request->validate([
            'quote' => 'required|string',
            'nama' => 'required|string|max:255',
            'peran' => 'required|string|max:255'
        ]);

        $quote = Quote::find(1);
        if (!$quote) {
            $quote = Quote::create([
                'id' => 1,
                'quote' => $request->quote,
                'nama' => $request->nama,
                'peran' => $request->peran
            ]);
        } else {
            $quote->update([
                'quote' => $request->quote,
                'nama' => $request->nama,
                'peran' => $request->peran
            ]);
        }

        return redirect()->back()->with('success', 'Quote berhasil diperbarui.');
    }
}
