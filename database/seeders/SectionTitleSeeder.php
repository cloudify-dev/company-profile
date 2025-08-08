<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectionTitle;

class SectionTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionTitles = [
            [
                'section_name' => 'team',
                'subtitle' => 'TEAM MEMBER',
                'title_black' => 'See Our Skilled Expert',
                'title_blue' => 'Team',
                'description' => 'Meet our experienced and dedicated team members',
                'is_active' => true,
            ],
            [
                'section_name' => 'testimonial',
                'subtitle' => 'CUSTOMER FEEDBACK',
                'title_black' => 'What Happy Clients Says',
                'title_blue' => 'About Us?',
                'description' => 'Read what our satisfied clients have to say about our services',
                'is_active' => true,
            ],
            [
                'section_name' => 'service',
                'subtitle' => 'OUR SERVICES',
                'title_black' => 'Elevating Businesses With',
                'title_blue' => 'IT Ingenuity',
                'description' => 'Discover our comprehensive IT solutions and services',
                'is_active' => true,
            ],
            [
                'section_name' => 'project',
                'subtitle' => 'OUR PORTFOLIO',
                'title_black' => 'Let\'s Check Our',
                'title_blue' => 'Latest Projects',
                'description' => 'Explore our recent successful projects and achievements',
                'is_active' => true,
            ],
        ];

        foreach ($sectionTitles as $title) {
            SectionTitle::updateOrCreate(
                ['section_name' => $title['section_name']],
                $title
            );
        }
    }
}
