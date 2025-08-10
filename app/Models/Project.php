<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'category',
        'client',
        'location',
        'completion_date',
        'demo_url',
        'image',
        'challenges',
        'challenge_image',
        'challenge_points',
        'results',
        'result_images',
        'brochure_pdf',
        'brochure_doc',
        'help_banner_image',
        'is_active',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'featured' => 'boolean',
        'challenge_points' => 'array',
        'result_images' => 'array',
        'completion_date' => 'date',
    ];

    // Scope for ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }

    // Scope for active projects
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
