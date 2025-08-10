<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutUsPage extends Model
{
    use HasFactory;

    protected $table = 'about_us_page';

    protected $fillable = [
        'is_active',
        'circle_title',
        'circle_subtitle',
        'title_black',
        'title_blue',
        'title_description',
        'phone_number',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function features(): HasMany
    {
        return $this->hasMany(AboutFeature::class, 'about_id');
    }

    /**
     * Get only active features in order
     */
    public function activeFeatures(): HasMany
    {
        return $this->features()->active()->ordered();
    }

    /**
     * Scope for activated about pages
     */
    public function scopeActivated($query)
    {
        return $query->where('is_activated', true);
    }
}
