<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutFeature extends Model
{
    protected $table = 'about_features';

    protected $fillable = [
        'about_id',
        'icon_path',
        'title',
        'description',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Get the about us page that owns this feature
     */
    public function aboutUsPage(): BelongsTo
    {
        return $this->belongsTo(AboutUsPage::class, 'about_id');
    }

    /**
     * Scope for active features
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered features
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }
}
