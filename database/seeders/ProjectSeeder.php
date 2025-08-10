<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform Modernization',
                'description' => 'Complete overhaul of legacy e-commerce system with modern microservices architecture, improved performance, and enhanced user experience.',
                'category' => 'Web Development',
                'client' => 'RetailCorp Indonesia',
                'location' => 'Jakarta, Indonesia',
                'demo_url' => 'https://shop.retailcorp.id',
                'completion_date' => '2024-03-15',
                'image' => 'project_images/ecommerce-main.jpg',
                'challenges' => 'The legacy system was built on outdated technology stack with performance bottlenecks and security vulnerabilities. The main challenge was migrating millions of product records and user data without downtime while ensuring data integrity.',
                'challenge_image' => 'project_images/ecommerce-challenge.jpg',
                'challenge_points' => [
                    'Migrating 2M+ product records without data loss',
                    'Implementing real-time inventory synchronization',
                    'Zero-downtime deployment strategy',
                    'Legacy payment gateway integration',
                    'Performance optimization for high traffic'
                ],
                'results' => 'Successfully delivered a modern, scalable e-commerce platform with 80% performance improvement and enhanced user experience. The new system handles 10x more concurrent users.',
                'result_images' => [
                    'project_images/ecommerce-result-1.jpg',
                    'project_images/ecommerce-result-2.jpg',
                    'project_images/ecommerce-result-3.jpg'
                ],
                'brochure_pdf' => 'project_brochures/ecommerce-brochure.pdf',
                'brochure_doc' => 'project_brochures/ecommerce-brochure.docx',
                'help_banner_image' => 'project_images/ecommerce-help-banner.jpg',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'FinTech Mobile Banking App',
                'description' => 'Secure mobile banking application with biometric authentication, real-time transactions, and comprehensive financial management tools.',
                'category' => 'Mobile Development',
                'client' => 'BankTech Solutions',
                'location' => 'Singapore',
                'demo_url' => 'https://apps.apple.com/banktech-mobile',
                'completion_date' => '2024-06-20',
                'image' => 'project_images/fintech-main.jpg',
                'challenges' => 'Building a secure banking application required implementing multiple layers of security including biometric authentication, encryption, and fraud detection while maintaining smooth user experience.',
                'challenge_image' => 'project_images/fintech-challenge.jpg',
                'challenge_points' => [
                    'Multi-layer security implementation',
                    'Biometric authentication integration',
                    'Real-time fraud detection system',
                    'Cross-platform compatibility',
                    'Banking API integration compliance'
                ],
                'results' => 'Delivered a secure, user-friendly banking app with advanced security features. The app achieved 4.8-star rating on app stores and processed over $1M in transactions within the first month.',
                'result_images' => [
                    'project_images/fintech-result-1.jpg',
                    'project_images/fintech-result-2.jpg'
                ],
                'brochure_pdf' => 'project_brochures/fintech-brochure.pdf',
                'brochure_doc' => 'project_brochures/fintech-brochure.docx',
                'help_banner_image' => 'project_images/fintech-help-banner.jpg',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Healthcare Management System',
                'description' => 'Comprehensive healthcare management platform for hospitals and clinics with patient records, appointment scheduling, and telemedicine capabilities.',
                'category' => 'Web Development',
                'client' => 'MediCare Hospitals',
                'location' => 'Surabaya, Indonesia',
                'demo_url' => 'https://portal.medicare.id',
                'completion_date' => '2024-01-30',
                'image' => 'project_images/healthcare-main.jpg',
                'challenges' => 'Healthcare systems require strict compliance with medical data regulations and seamless integration with existing hospital infrastructure while ensuring 99.9% uptime.',
                'challenge_image' => 'project_images/healthcare-challenge.jpg',
                'challenge_points' => [
                    'HIPAA compliance implementation',
                    'Legacy system integration',
                    'Real-time appointment scheduling',
                    'Telemedicine video integration',
                    'Medical data security protocols'
                ],
                'results' => 'Implemented a comprehensive healthcare platform that improved patient management efficiency by 60% and reduced appointment scheduling time by 40%.',
                'result_images' => [
                    'project_images/healthcare-result-1.jpg',
                    'project_images/healthcare-result-2.jpg',
                    'project_images/healthcare-result-3.jpg'
                ],
                'brochure_pdf' => 'project_brochures/healthcare-brochure.pdf',
                'brochure_doc' => null,
                'help_banner_image' => 'project_images/healthcare-help-banner.jpg',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
