<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama_organisasi',
        'alamat',
        'tahun_berdiri',
        'legalitas',
        'sejarah',
        'profil_singkat',
        'logo_path',
        'filosofi_logo'
    ];
}
