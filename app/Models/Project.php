<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';

    protected $fillable = [
        'title',
        'description',
        'category',
        'image',
        'is_featured',
        'status',
        'client_name',
        'project_url',
        'technologies',
        'duration',
        'budget_range',
        'team_size',
        'tags',
        'completion_date',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'technologies' => 'array',
        'completion_date' => 'date',
    ];

    // Scope for ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }

    // Scope for featured projects
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for active projects
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
