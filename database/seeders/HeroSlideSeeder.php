<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hero_slides')->insert([
            [
                'subtitle'    => 'SECURE & IT SERVICES',
                'title_1'     => 'Webteck Best',
                'title_2'     => 'IT Solution 2024',
                'description' => 'Energistically harness ubiquitous imperatives without state of the art collaboration and idea-sharing. Monotonectally parallel task cross-unit experiences and front-end.',
                'image'       => 'hero_images/pic_1920x850.png',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'subtitle'    => 'SECURE & IT SERVICES',
                'title_1'     => 'Perfect IT Solution',
                'title_2'     => 'For Your Business',
                'description' => 'We provide smart solutions for IT-based companies and startups. Let\'s build something impactful together.',
                'image'       => 'hero_images/pic_1920x850.png',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'subtitle'    => 'SECURE & IT SERVICES',
                'title_1'     => 'Make The Easiest',
                'title_2'     => 'Solution For You',
                'description' => 'Grow your digital business faster with our reliable IT solutions and professional team.',
                'image'       => 'hero_images/pic_1920x850.png',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
