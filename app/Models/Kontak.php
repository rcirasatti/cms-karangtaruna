<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';
    
    protected $fillable = [
        'alamat_sekretariat',
        'maps_url',
        'telepon',
        'whatsapp',
        'email',
        'instagram',
        'facebook',
        'twitter',
        'youtube'
    ];
}
