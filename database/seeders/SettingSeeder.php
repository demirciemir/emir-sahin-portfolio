<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'contact_name', 'value' => 'Emir Şahin'],
            ['key' => 'contact_email', 'value' => 'info@emirsahin.com'],
            ['key' => 'contact_phone', 'value' => '+90 555 123 45 67'],
            ['key' => 'contact_address', 'value' => 'Istanbul, Türkiye'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }
    }
}
