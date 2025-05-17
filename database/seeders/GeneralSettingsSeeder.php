<?php

namespace Database\Seeders;

use App\Models\GeneralSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSettings::firstOrCreate([], [
            'site_name' => [
                'en' => 'MultiVendor Stadium System',
                'az' => 'ÇoxSatıcılı Stadion Sistemi'
            ],
            'site_description' => [
                'en' => 'Manage stadiums and events across multiple vendors.',
                'az' => 'Çoxlu satıcılar arasında stadion və tədbirləri idarə edin.'
            ],
            'timezone' => 'UTC',
            'date_format' => 'Y-m-d',
            'time_format' => 'H:i',
            'default_language' => 'en',
            'meta_keywords' => [
                'en' => 'stadium, management, multi-vendor',
                'az' => 'stadion, idarəetmə, çoxsatıcılı'
            ],
            'meta_description' => [
                'en' => 'Advanced stadium management platform.',
                'az' => 'İnkişaf etmiş stadion idarəetmə platforması.'
            ],
            'primary_color' => '#007bff',
            'secondary_color' => '#6c757d',
            'maintenance_mode' => false,
            'maintenance_message' => [
                'en' => 'The site is under maintenance. Please check back later.',
                'az' => 'Sayt texniki işlər səbəbilə bağlanıb. Zəhmət olmasa sonra yenidən yoxlayın.'
            ],
            'support_email' => null,
            'support_phone' => null,
            'social_networks' => null,
            'logo' => null,
            'favicon' => null,
        ]);
    }
}
