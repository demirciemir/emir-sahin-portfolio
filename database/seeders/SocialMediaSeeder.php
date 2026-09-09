<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            [
                'name' => 'Instagram',
                'icon_class' => 'fa-brands fa-instagram',
                'url' => 'https://www.instagram.com/',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'LinkedIn',
                'icon_class' => 'fa-brands fa-linkedin-in',
                'url' => 'https://www.linkedin.com/',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'YouTube',
                'icon_class' => 'fa-brands fa-youtube',
                'url' => 'https://www.youtube.com/',
                'is_active' => false,
                'order' => 3,
            ],
            [
                'name' => 'X (Twitter)',
                'icon_class' => 'fa-brands fa-x-twitter',
                'url' => 'https://x.com/',
                'is_active' => false,
                'order' => 4,
            ],
            [
                'name' => 'TikTok',
                'icon_class' => 'fa-brands fa-tiktok',
                'url' => 'https://www.tiktok.com/',
                'is_active' => false,
                'order' => 5,
            ],
            [
                'name' => 'Facebook',
                'icon_class' => 'fa-brands fa-facebook-f',
                'url' => 'https://www.facebook.com/',
                'is_active' => false,
                'order' => 6,
            ],
        ];

        foreach ($platforms as $platform) {
            SocialMedia::create($platform);
        }
    }
}
