<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilosofiLogoItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'gambar',
        'urutan'
    ];

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
