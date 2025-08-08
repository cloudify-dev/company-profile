<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SectionTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'subtitle',
        'title_black',
        'title_blue',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static function getForSection($sectionName)
    {
        return self::where('section_name', $sectionName)
                   ->where('is_active', true)
                   ->first();
    }
}
