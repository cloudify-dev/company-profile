<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'John Smith',
                'position' => 'CEO',
                'company' => 'Tech Solutions Inc',
                'review' => 'Outstanding service and exceptional quality. The team exceeded our expectations in every way possible.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Marketing Director',
                'company' => 'Creative Agency Ltd',
                'review' => 'Professional, reliable, and innovative. They delivered exactly what we needed on time and within budget.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Michael Brown',
                'position' => 'Project Manager',
                'company' => 'Global Enterprises',
                'review' => 'Great communication throughout the project. Very satisfied with the end result.',
                'rating' => 4,
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
