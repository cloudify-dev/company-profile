<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'addresses',
        'phones',
        'emails',
        'contact_action_type',
        'contact_action_value',
        'map_embed_url',
        'is_active'
    ];

    protected $casts = [
        'addresses' => 'array',
        'phones' => 'array',
        'emails' => 'array',
        'is_active' => 'boolean'
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
