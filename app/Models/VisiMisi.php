<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visi_misi';

    protected $fillable = [
        'visi',
        'visi_align',
        'misi',
        'misi_align',
        'tujuan',
        'tujuan_align',
        'fungsi',
        'fungsi_align',
        'nilai_dasar',
        'nilai_dasar_align',
        'gambar_visi',
        'gambar_misi',
        'gambar_tujuan',
        'gambar_fungsi'
    ];

    protected $casts = [
        'nilai_dasar' => 'array',
    ];
}
