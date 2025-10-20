<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_kegiatan',
        'kategori',
        'media_path',
        'thumbnail',
        'link_video'
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
        'media_path' => 'array'
    ];
}
