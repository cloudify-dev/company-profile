<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'subtitle',
        'title_1',
        'title_2',
        'description',
        'image',
    ];
}
