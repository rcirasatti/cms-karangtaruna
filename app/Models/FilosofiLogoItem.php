<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilosofiLogoItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope untuk hanya mengambil item yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
