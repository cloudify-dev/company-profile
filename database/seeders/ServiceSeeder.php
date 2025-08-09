<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceFeature;
use App\Models\ServiceBenefit;
use App\Models\ServiceFaq;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $service = Service::create([
            'title' => 'Smart Farming Technology',
            'description' => 'Menghadirkan solusi teknologi untuk pertanian modern dan efisien.',
            'image' => 'default/service.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example',
            'section_title' => 'We Serve The Best Technology',
            'checklist_items' => [
                'Real-time soil and weather monitoring',
                'Data-driven fertilization recommendations',
                'IoT integration for automatic irrigation control',
                'Crop yield prediction analytics',
                'Pest and disease early detection'
            ],
            'additional_description' => 'Our smart farming technology revolutionizes agriculture by providing data-driven insights and automated solutions to optimize crop yield and reduce operational costs.',
            'benefits_title' => 'Benefits Of Smart Farming',
            'faqs_title' => 'Frequently Asked Questions',
            'sidebar_title' => 'Our Technology Services',
            'sidebar_services' => [
                ['name' => 'Smart Farming Technology', 'url' => '#'],
                ['name' => 'IoT Solutions', 'url' => '#'],
                ['name' => 'Data Analytics', 'url' => '#'],
                ['name' => 'Automation Systems', 'url' => '#'],
                ['name' => 'Mobile Applications', 'url' => '#'],
                ['name' => 'Cloud Services', 'url' => '#']
            ],
            'contact_widget_text' => 'NEED HELP?',
            'contact_widget_title' => 'Ready to Get Started?',
            'contact_widget_button_text' => 'CONTACT US',
            'contact_widget_button_link' => '/contact',
        ]);

        // Features
        $features = [
            'Pemantauan kondisi tanah dan cuaca secara real-time',
            'Rekomendasi pemupukan berbasis data',
            'Integrasi IoT untuk kontrol irigasi otomatis'
        ];

        foreach ($features as $feature) {
            ServiceFeature::create([
                'service_id' => $service->id,
                'text' => $feature,
            ]);
        }

        // Benefits
        $benefits = [
            [
                'icon' => 'bi-graph-up',
                'title' => 'Produktivitas Meningkat',
                'description' => 'Membantu meningkatkan hasil panen melalui pemanfaatan data.'
            ],
            [
                'icon' => 'bi-shield-check',
                'title' => 'Keamanan Terjamin',
                'description' => 'Melindungi lahan dari kerusakan dengan pemantauan berkelanjutan.'
            ]
        ];

        foreach ($benefits as $benefit) {
            ServiceBenefit::create([
                'service_id' => $service->id,
                'icon' => $benefit['icon'],
                'title' => $benefit['title'],
                'description' => $benefit['description'],
            ]);
        }

        // FAQs
        $faqs = [
            [
                'question' => 'Apakah sistem ini memerlukan koneksi internet?',
                'answer' => 'Ya, untuk mengakses data dan analitik secara real-time, koneksi internet diperlukan.'
            ],
            [
                'question' => 'Apakah petani perlu pelatihan khusus?',
                'answer' => 'Kami menyediakan pelatihan dan panduan agar mudah digunakan oleh semua kalangan.'
            ]
        ];

        foreach ($faqs as $faq) {
            ServiceFaq::create([
                'service_id' => $service->id,
                'question' => $faq['question'],
                'answer' => $faq['answer'],
            ]);
        }
    }
}
