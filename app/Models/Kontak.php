<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';
    
    protected $fillable = [
        'alamat_sekretariat',
        'telepon',
        'whatsapp',
        'email',
        'instagram',
        'facebook',
        'twitter',
        'youtube'
    ];
}
