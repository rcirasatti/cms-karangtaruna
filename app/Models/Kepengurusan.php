<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kepengurusan extends Model
{
    protected $table = 'kepengurusan';
    
    protected $fillable = [
        'nama',
        'jabatan',
        'tugas',
        'foto',
        'profil_singkat',
        'is_tokoh_utama',
        'urutan'
    ];

    protected $casts = [
        'is_tokoh_utama' => 'boolean'
    ];
}
