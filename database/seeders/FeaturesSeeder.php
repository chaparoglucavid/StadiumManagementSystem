<?php

namespace Database\Seeders;

use App\Models\Features;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'name' => ['az' => 'VIP Zal', 'en' => 'VIP Lounge'],
                'description' => [
                    'az' => 'VIP qonaqlar üçün xüsusi komfort sahəsi',
                    'en' => 'Exclusive comfort area for VIP guests',
                ],
                'icon' => 'vip.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Avtodayanacaq', 'en' => 'Parking Lot'],
                'description' => [
                    'az' => 'Azarkeşlər və qonaqlar üçün geniş avtodayanacaq sahəsi',
                    'en' => 'Spacious parking for fans and guests',
                ],
                'icon' => 'electric-car.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Qida Zonası', 'en' => 'Food Court'],
                'description' => [
                    'az' => 'Stadion daxilində yemək və içki məntəqələri',
                    'en' => 'Food and beverage points inside the stadium',
                ],
                'icon' => 'cafe.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Pulsuz Wi-Fi', 'en' => 'Free Wi-Fi'],
                'description' => [
                    'az' => 'Ziyarətçilər üçün yüksək sürətli pulsuz internet',
                    'en' => 'High-speed free internet for visitors',
                ],
                'icon' => 'wifi-router.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Təcili Yardım Xidməti', 'en' => 'Emergency Medical Service'],
                'description' => [
                    'az' => 'Təcili tibbi yardım məntəqələri',
                    'en' => 'Emergency medical service points',
                ],
                'icon' => 'ambulance.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Əlillər üçün Əlçatanlıq', 'en' => 'Accessibility for Disabled'],
                'description' => [
                    'az' => 'Əlillər üçün xüsusi giriş və xidmətlər',
                    'en' => 'Dedicated access and services for the disabled',
                ],
                'icon' => 'toilet.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'LED Ekranlar', 'en' => 'LED Screens'],
                'description' => [
                    'az' => 'Böyük ölçülü yüksək keyfiyyətli LED ekranlar',
                    'en' => 'Large high-quality LED screens',
                ],
                'icon' => 'monitor.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Uşaqlar üçün Əyləncə Sahəsi', 'en' => 'Kids Entertainment Area'],
                'description' => [
                    'az' => 'Uşaqlar üçün oyun və əyləncə məkanları',
                    'en' => 'Play and entertainment areas for children',
                ],
                'icon' => 'playground.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Paltardəyişmə Otaqları', 'en' => 'Changing Rooms'],
                'description' => [
                    'az' => 'Komandalar üçün geniş və rahat paltardəyişmə otaqları',
                    'en' => 'Spacious and comfortable changing rooms for teams',
                ],
                'icon' => 'closet.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Təlim Mərkəzi', 'en' => 'Training Center'],
                'description' => [
                    'az' => 'Komandalar üçün xüsusi məşq və hazırlıq sahələri',
                    'en' => 'Special training and preparation areas for teams',
                ],
                'icon' => 'training.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Əlverişli İqlimləşdirilmiş Sahələr', 'en' => 'Climate-Controlled Areas'],
                'description' => [
                    'az' => 'Soyudulmuş və ya isitilmiş sahələr (klimat kontrol)',
                    'en' => 'Heated or cooled climate-controlled areas',
                ],
                'icon' => 'field.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Oyun Sahəsi İşıqlandırması', 'en' => 'Field Lighting'],
                'description' => [
                    'az' => 'Gecə oyunları üçün yüksək keyfiyyətli işıqlandırma sistemi',
                    'en' => 'High-quality lighting system for night games',
                ],
                'icon' => 'light.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Tribunalar', 'en' => 'Stands'],
                'description' => [
                    'az' => 'Azarkeşlər üçün tribunalar',
                    'en' => 'Stands for fans',
                ],
                'icon' => 'tribune.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Elektron Bilet Sistemi', 'en' => 'Electronic Ticketing System'],
                'description' => [
                    'az' => 'Rəqəmsal bilet satışı və yoxlanışı üçün sistem',
                    'en' => 'System for digital ticketing and validation',
                ],
                'icon' => 'tickets.png',
                'status' => 'active',
            ],
            [
                'name' => ['az' => 'Təhlükəsizlik Kameraları', 'en' => 'Security Cameras'],
                'description' => [
                    'az' => 'Təhlükəsizlik üçün 24/7 kameralarla nəzarət sistemi',
                    'en' => '24/7 surveillance system with security cameras',
                ],
                'icon' => 'cctv-camera.png',
                'status' => 'active',
            ],
        ];

        foreach ($features as $feature) {
            Features::create($feature);
        }
    }
}
