<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What services does Cloudify.id offer?',
                'answer' => 'Cloudify.id offers a comprehensive range of digital services including web development, mobile app development, cloud solutions, digital marketing, and IT consulting. We specialize in helping businesses transform their digital presence and scale their operations.',
                'category' => 'services',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'How long does a typical project take?',
                'answer' => 'Project timelines vary depending on complexity and scope. A simple website might take 2-4 weeks, while complex applications can take 3-6 months. We provide detailed project timelines during the initial consultation and keep you updated throughout the development process.',
                'category' => 'general',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'What are your pricing models?',
                'answer' => 'We offer flexible pricing models including fixed-price projects, hourly rates, and monthly retainers. Pricing depends on project complexity, timeline, and specific requirements. Contact us for a customized quote based on your needs.',
                'category' => 'pricing',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide ongoing support after project completion?',
                'answer' => 'Yes, we offer comprehensive post-launch support including maintenance, updates, bug fixes, and technical assistance. We have various support packages available to ensure your project continues to run smoothly.',
                'category' => 'support',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'What technologies do you work with?',
                'answer' => 'Our team is proficient in a wide range of modern technologies including PHP (Laravel), JavaScript (React, Vue.js, Node.js), Python, Java, mobile development (React Native, Flutter), cloud platforms (AWS, Azure, Google Cloud), and various databases.',
                'category' => 'technical',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'Can you help migrate our existing system to the cloud?',
                'answer' => 'Absolutely! We specialize in cloud migration services. We can help you migrate your existing infrastructure, applications, and data to cloud platforms while ensuring minimal downtime and maximum security.',
                'category' => 'services',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'Do you work with international clients?',
                'answer' => 'Yes, we work with clients globally. We have experience working across different time zones and provide flexible communication schedules to accommodate international partnerships.',
                'category' => 'general',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'What is included in your maintenance packages?',
                'answer' => 'Our maintenance packages include regular updates, security patches, performance monitoring, backup management, technical support, and minor feature enhancements. Packages are customized based on your specific needs.',
                'category' => 'support',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'question' => 'How do you ensure project security?',
                'answer' => 'We implement industry-standard security practices including secure coding standards, regular security audits, encryption, access controls, and compliance with data protection regulations. Security is integrated throughout our development process.',
                'category' => 'technical',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept various payment methods including bank transfers, credit cards, and digital payment platforms. Payment schedules are typically structured with milestones to ensure project progress alignment.',
                'category' => 'pricing',
                'order' => 10,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
