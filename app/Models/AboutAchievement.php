<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutAchievement extends Model
{
    protected $table = 'about_achievements';

    protected $fillable = [
        'about_id',
        'achievement_value',
        'achievement_unit',
        'achievement_description',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Get the about us page that owns this achievement
     */
    public function aboutUsPage(): BelongsTo
    {
        return $this->belongsTo(AboutUsPage::class, 'about_id');
    }

    /**
     * Scope for active achievements
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered achievements
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }
}
