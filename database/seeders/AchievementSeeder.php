<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'achievement_value' => '500',
                'achievement_unit' => '+',
                'achievement_description' => 'Projects Completed',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'achievement_value' => '200',
                'achievement_unit' => '+',
                'achievement_description' => 'Happy Clients',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'achievement_value' => '10',
                'achievement_unit' => '+',
                'achievement_description' => 'Years Experience',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'achievement_value' => '50',
                'achievement_unit' => '+',
                'achievement_description' => 'Team Members',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}
