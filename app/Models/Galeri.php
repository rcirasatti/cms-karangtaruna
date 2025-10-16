<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';

    protected $fillable = [
        'kegiatan_id',
        'tipe',
        'judul',
        'deskripsi',
        'url',
        'thumbnail',
        'diupload_oleh',
    ];

    /**
     * Get the berita that owns the galeri.
     */
    public function berita()
    {
        return $this->belongsTo(Berita::class, 'kegiatan_id');
    }

    /**
     * Alias untuk backward compatibility
     */
    public function kegiatan()
    {
        return $this->berita();
    }

    /**
     * Scope untuk filter berdasarkan tipe (foto/video)
     */
    public function scopeByTipe($query, $tipe)
    {
        if ($tipe) {
            return $query->where('tipe', $tipe);
        }
        return $query;
    }

    /**
     * Scope untuk filter berdasarkan kegiatan
     */
    public function scopeByKegiatan($query, $kegiatanId)
    {
        if ($kegiatanId) {
            return $query->where('kegiatan_id', $kegiatanId);
        }
        return $query;
    }

    /**
     * Scope untuk search berdasarkan judul atau deskripsi
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('judul', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%");
        }
        return $query;
    }

    /**
     * Scope untuk ordering
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
