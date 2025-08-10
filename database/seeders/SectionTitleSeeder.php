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
                'section_name' => 'customer-feedback',
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
            [
                'section_name' => 'testimonials',
                'subtitle' => 'TESTIMONIALS',
                'title_black' => 'Let\'s Hear What Are The Customer ',
                'title_blue' => 'Saying',
                'description' => 'Appropriately envisioneer leveraged information through 2.0 communities.
                Synergistically parallel task inexpensive products whereas cross-media ideas.',
                'is_active' => true,
            ],
            [
                'section_name' => 'appointment-contact',
                'subtitle' => 'APPOINTMENT NOW',
                'title_black' => 'We\'re Ready to Talk About Your ',
                'title_blue' => 'Opportunities',
                'description' => 'Progressively morph principle-centered e-markets without an expanded array of opportunities. Conveniently incubate e-tailers for extensive leadership skills. Holisticly extend leading-edge vortals vis-a-vis 24/7 e-markets. Appropriately evolve efficient functionalities with installed base relationships.',
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
