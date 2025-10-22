<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'peran',
        'quote',
        'is_tampil',
    ];

    protected $casts = [
        'is_tampil' => 'boolean',
    ];
}