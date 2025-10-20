<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visi_misi';
    
    protected $fillable = [
        'visi',
        'misi',
        'tujuan',
        'fungsi',
        'nilai_dasar',
        'gambar_visi',
        'gambar_misi',
        'gambar_tujuan',
        'gambar_fungsi'
    ];
}
