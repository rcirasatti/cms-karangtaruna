<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\FilosofiLogoItem;
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

        // Handle logo upload
        if ($request->hasFile('logo_path')) {
            // Delete old logo if exists
            if ($profile->logo_path && \Storage::disk('public')->exists($profile->logo_path)) {
                \Storage::disk('public')->delete($profile->logo_path);
            }

            // Store new logo
            $logoPath = $request->file('logo_path')->store('logos', 'public');
            $data['logo_path'] = $logoPath;
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
        return view('admin.about.sejarah', compact('profile'));
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
}
