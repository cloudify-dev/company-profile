<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'category',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope untuk FAQ aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }

    // Getter untuk badge class berdasarkan kategori
    public function getCategoryBadgeAttribute()
    {
        $badges = [
            'general' => 'bg-primary',
            'services' => 'bg-success',
            'pricing' => 'bg-warning',
            'technical' => 'bg-info',
            'support' => 'bg-secondary'
        ];

        return $badges[$this->category] ?? 'bg-primary';
    }

    // Getter untuk kategori dengan huruf kapital
    public function getCategoryLabelAttribute()
    {
        return ucfirst($this->category);
    }
}
