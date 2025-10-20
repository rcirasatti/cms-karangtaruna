<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseControllerClass;

abstract class Controller extends BaseControllerClass
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Custom validation error messages
     */
    protected function validationMessages()
    {
        return [
            // Required fields
            'required' => '⚠️ :attribute wajib diisi',
            'required_if' => '⚠️ :attribute wajib diisi jika :other adalah :value',

            // String & Text
            'string' => ':attribute harus berupa teks',
            'max' => ':attribute maksimal :max karakter',
            'min' => ':attribute minimal :min karakter',

            // Numeric
            'numeric' => ':attribute harus berupa angka',
            'integer' => ':attribute harus berupa angka bulat',

            // Date
            'date' => ':attribute harus berupa tanggal yang valid (format: YYYY-MM-DD)',
            'date_format' => ':attribute format harus :format',
            'before' => ':attribute harus sebelum :date',
            'after' => ':attribute harus setelah :date',

            // File & Image
            'file' => ':attribute harus berupa file',
            'image' => ':attribute harus berupa gambar (JPG, PNG, GIF)',
            'mimes' => ':attribute hanya boleh format: JPG, PNG, GIF',
            'image.*' => 'Setiap file di :attribute harus berupa gambar (JPG, PNG, GIF)',

            // URL
            'url' => ':attribute harus berupa URL yang valid',

            // Unique
            'unique' => ':attribute sudah terdaftar sebelumnya, gunakan yang berbeda',

            // Email
            'email' => ':attribute harus berupa email yang valid',

            // JSON
            'json' => ':attribute harus berupa JSON yang valid',
        ];
    }

    /**
     * Custom attribute names
     */
    protected function validationAttributes()
    {
        return [
            'judul' => 'Judul',
            'nama_produk' => 'Nama Produk',
            'deskripsi' => 'Deskripsi',
            'harga' => 'Harga',
            'kategori' => 'Kategori',
            'tanggal_kegiatan' => 'Tanggal Kegiatan',
            'link_video' => 'Link Video',
            'thumbnail' => 'Gambar Thumbnail',
            'foto' => 'Foto Produk',
            'media_path' => 'Media Galeri',
            'nama_mitra' => 'Nama Mitra',
            'jenis' => 'Jenis Mitra',
            'logo' => 'Logo Mitra',
            'galeri' => 'Galeri Foto',
            'kontak' => 'Kontak',
            'testimoni' => 'Testimoni',
            'alamat_sekretariat' => 'Alamat Sekretariat',
            'telepon' => 'Telepon',
            'whatsapp' => 'WhatsApp',
            'email' => 'Email',
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'youtube' => 'YouTube',
        ];
    }
}
