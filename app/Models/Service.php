<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function features()
    {
        return $this->hasMany(ServiceFeature::class);
    }

    public function benefits()
    {
        return $this->hasMany(ServiceBenefit::class);
    }

    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class);
    }
}
