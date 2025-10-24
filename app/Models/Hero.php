<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'title_navbar',
        'subtitle_navbar',
    ];
}
