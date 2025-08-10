<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactSection;
use App\Models\ContactFeature;

class ContactSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Contact Section
        $contactSection = ContactSection::create([
            'form_title' => 'Make An Appointment',
            'background_image' => null,
            'is_active' => true
        ]);

        // Create contact features
        ContactFeature::create([
            'contact_section_id' => $contactSection->id,
            'icon' => 'fa-solid fa-phone',
            'label' => 'Call Us On:',
            'value' => '+190-8800-0393',
            'link' => 'tel:+19088000393',
            'is_active' => true,
            'sort_order' => 1
        ]);

        ContactFeature::create([
            'contact_section_id' => $contactSection->id,
            'icon' => 'fa-solid fa-envelope',
            'label' => 'Quick Mail Us:',
            'value' => 'info@webteck.com',
            'link' => 'mailto:info@webteck.com',
            'is_active' => true,
            'sort_order' => 2
        ]);
    }
}
