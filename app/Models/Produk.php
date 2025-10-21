<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Produk extends Model
{
    protected $table = 'produk';
    
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'foto',
        'galeri',
        'kategori'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'galeri' => 'array'
    ];

    /**
     * Accessor untuk backward compatibility dengan nama
     */
    protected function nama(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->nama_produk,
        );
    }

    /**
     * Accessor untuk backward compatibility dengan gambar
     */
    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->foto,
        );
    }
}
