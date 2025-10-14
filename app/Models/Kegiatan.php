<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    
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
        'tanggal_kegiatan' => 'date'
    ];
}
