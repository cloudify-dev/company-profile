<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'name',
        'position',
        'company',
        'bio',
        'phone',
        'email',
        'availability',
        'experience',
        'image',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'personal_biography',
        'professional_skills_description',
        'skills',
        'activities_description',
        'activities_list',
        'educational_qualification',
        'experience_timeline',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'skills' => 'array',
        'activities_list' => 'array',
        'experience_timeline' => 'array'
    ];

    /**
     * Scope for active team members
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordering team members
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }
}
