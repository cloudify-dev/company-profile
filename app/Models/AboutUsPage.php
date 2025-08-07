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
        'is_activated',
        'circle_title',
        'circle_subtitle',
        'title_black',
        'title_blue',
        'title_description',
        'team_logo_name',
        'team_section_title_black',
        'team_section_title_blue',
    ];

    protected $casts = [
        'is_activated' => 'boolean'
    ];

    public function features(): HasMany
    {
        return $this->hasMany(AboutFeature::class, 'about_id');
    }

    public function achievements(): HasMany
    {
        return $this->hasMany(AboutAchievement::class, 'about_id');
    }

    /**
     * Get only active features in order
     */
    public function activeFeatures(): HasMany
    {
        return $this->features()->active()->ordered();
    }

    /**
     * Get only active achievements in order
     */
    public function activeAchievements(): HasMany
    {
        return $this->achievements()->active()->ordered();
    }

    /**
     * Scope for activated about pages
     */
    public function scopeActivated($query)
    {
        return $query->where('is_activated', true);
    }
}
