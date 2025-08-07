<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePage;

class ServicePageSeeder extends Seeder
{
    public function run()
    {
        ServicePage::create([
            'breadcrumb_title' => 'Our Services',
            'service_section_subtitle' => 'OUR SERVICES',
            'service_section_title' => 'Comprehensive IT Solutions',
            'service_section_description' => 'We provide a wide range of IT services to help your business grow and succeed in the digital world.',
            'cta_subtitle' => 'CONTACT US',
            'cta_title_black' => 'Need Any Kind Of IT Solution For',
            'cta_title_blue' => 'Your Business?',
            'cta_button_text' => 'Get In Touch',
            'cta_button_link' => '/contact',
            'process_subtitle' => 'WORK PROCESS',
            'process_title_black' => 'How to work',
            'process_title_blue' => 'it!',
            'process_steps' => [
                ['number' => '01', 'title' => 'Select a project', 'icon' => '', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
                ['number' => '02', 'title' => 'Project analysis', 'icon' => '', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
                ['number' => '03', 'title' => 'Plan Execute', 'icon' => '', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
                ['number' => '04', 'title' => 'Deliver result', 'icon' => '', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
            ],
            'testimonial_subtitle' => 'CUSTOMER FEEDBACK',
            'testimonial_title_black' => 'What Happy Clients Says',
            'testimonial_title_blue' => 'About Us?',
            'is_active' => true
        ]);
    }
}
