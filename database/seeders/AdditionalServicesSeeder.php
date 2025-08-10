<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class AdditionalServicesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Professional web development services for modern businesses.',
                'section_title' => 'Professional Web Solutions',
                'checklist_items' => [
                    'Responsive Web Design',
                    'Custom Web Applications',
                    'E-commerce Solutions',
                    'Performance Optimization',
                    'SEO Integration'
                ],
                'benefits_title' => 'Web Development Benefits',
                'faqs_title' => 'Web Development FAQs',
                'additional_description' => 'Our web development services help businesses establish a strong online presence with modern, scalable solutions.',
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Cross-platform mobile applications for iOS and Android.',
                'section_title' => 'Mobile Solutions That Work',
                'checklist_items' => [
                    'Native iOS Development',
                    'Native Android Development',
                    'Cross-platform Solutions',
                    'App Store Optimization',
                    'Mobile UI/UX Design'
                ],
                'benefits_title' => 'Mobile App Benefits',
                'faqs_title' => 'Mobile Development FAQs',
                'additional_description' => 'Create engaging mobile experiences that reach your customers wherever they are.',
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Comprehensive digital marketing strategies to grow your business.',
                'section_title' => 'Marketing That Delivers Results',
                'checklist_items' => [
                    'Social Media Marketing',
                    'Search Engine Optimization',
                    'Pay-per-Click Advertising',
                    'Content Marketing Strategy',
                    'Email Marketing Campaigns'
                ],
                'benefits_title' => 'Digital Marketing Benefits',
                'faqs_title' => 'Marketing FAQs',
                'additional_description' => 'Boost your online visibility and reach your target audience with our proven digital marketing strategies.',
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }
    }
}
