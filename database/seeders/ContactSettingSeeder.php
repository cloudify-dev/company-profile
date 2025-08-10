<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactSetting::create([
            'title' => 'Have Any Questions?',
            'subtitle' => 'Enthusiastically disintermediate one-to-one leadership via business e-commerce. Dramatically reintermediate compelling process improvements rather than empowered relationships.',
            'addresses' => [
                'Burnsville, MN 55337 Street, United States',
                'Jl. Raya Jakarta No. 123, Indonesia'
            ],
            'phones' => [
                '(+65) - 48596 - 5789',
                '+65-48596-5789',
                '+62-812-3456-7890'
            ],
            'emails' => [
                'info.example@gmail.com',
                'contact@cloudify.id',
                'support@cloudify.id'
            ],
            'contact_action_type' => 'form',
            'contact_action_value' => null,
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sThemeholy!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd',
            'is_active' => true
        ]);
    }
}
