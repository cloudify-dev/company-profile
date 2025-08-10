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
        'video_url',
        'video_thumbnail',
        'section_title',
        'checklist_items',
        'additional_description',
        'benefits_title',
        'faqs_title',
        'sidebar_title',
        'brochure_pdf',
        'brochure_doc',
        'contact_widget_text',
        'contact_widget_title',
        'contact_widget_button_text',
        'contact_widget_button_link',
        'contact_widget_background',
    ];

    protected $casts = [
        'checklist_items' => 'array',
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
