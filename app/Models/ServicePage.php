<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $table = 'service_page';
    
    protected $fillable = [
        'breadcrumb_title',
        'breadcrumb_image',
        'service_section_subtitle',
        'service_section_title',
        'service_section_description',
        'cta_subtitle',
        'cta_title_black',
        'cta_title_blue',
        'cta_button_text',
        'cta_button_link',
        'cta_background_image',
        'process_subtitle',
        'process_title_black',
        'process_title_blue',
        'process_steps',
        'testimonial_subtitle',
        'testimonial_title_black',
        'testimonial_title_blue',
        'is_active'
    ];
    
    protected $casts = [
        'process_steps' => 'array',
        'is_active' => 'boolean'
    ];
    
    /**
     * Get the default process steps
     */
    public function getDefaultProcessSteps()
    {
        return [
            ['number' => '01', 'title' => 'Select a project', 'icon' => 'process_card_1.svg', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
            ['number' => '02', 'title' => 'Project analysis', 'icon' => 'process_card_2.svg', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
            ['number' => '03', 'title' => 'Plan Execute', 'icon' => 'process_card_3.svg', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
            ['number' => '04', 'title' => 'Deliver result', 'icon' => 'process_card_4.svg', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
        ];
    }
}
