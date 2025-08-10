<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsFeature;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Why Choose Us section
        $whyChooseUs = WhyChooseUs::create([
            'subtitle' => 'WHY CHOOSE US',
            'title_black' => 'We Deal With The Aspects Professional',
            'title_blue' => 'IT Services',
            'description' => 'Collaboratively envisioneer user friendly supply chains and cross unit imperative. Authoritativel fabricate competitive resource and holistic.',
            'image' => null,
            'is_active' => true,
            'sort_order' => 1
        ]);

        // Create features for left column
        WhyChooseUsFeature::create([
            'why_choose_us_id' => $whyChooseUs->id,
            'title' => 'Big Data Analysis',
            'description' => null,
            'icon' => 'far fa-check',
            'is_active' => true,
            'sort_order' => 1
        ]);

        WhyChooseUsFeature::create([
            'why_choose_us_id' => $whyChooseUs->id,
            'title' => '24/7 Online Support',
            'description' => null,
            'icon' => 'far fa-check',
            'is_active' => true,
            'sort_order' => 2
        ]);

        WhyChooseUsFeature::create([
            'why_choose_us_id' => $whyChooseUs->id,
            'title' => 'Business Improvement',
            'description' => null,
            'icon' => 'far fa-check',
            'is_active' => true,
            'sort_order' => 3
        ]);

        // Create features for right column
        WhyChooseUsFeature::create([
            'why_choose_us_id' => $whyChooseUs->id,
            'title' => 'High Quality Security',
            'description' => null,
            'icon' => 'far fa-check',
            'is_active' => true,
            'sort_order' => 4
        ]);

        WhyChooseUsFeature::create([
            'why_choose_us_id' => $whyChooseUs->id,
            'title' => '24/7 Support Team',
            'description' => null,
            'icon' => 'far fa-check',
            'is_active' => true,
            'sort_order' => 5
        ]);

        WhyChooseUsFeature::create([
            'why_choose_us_id' => $whyChooseUs->id,
            'title' => 'Easy Solutions',
            'description' => null,
            'icon' => 'far fa-check',
            'is_active' => true,
            'sort_order' => 6
        ]);
    }
}
