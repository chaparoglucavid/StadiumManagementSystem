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
                'name' => 'VIP Zal',
                'description' => 'VIP qonaqlar üçün xüsusi komfort sahəsi',
                'icon' => 'vip.png', // FontAwesome icon
                'status' => 'active',
            ],
            [
                'name' => 'Avtodayanacaq',
                'description' => 'Azarkeşlər və qonaqlar üçün geniş avtodayanacaq sahəsi',
                'icon' => 'electric-car.png',
                'status' => 'active',
            ],
            [
                'name' => 'Qida Zonası',
                'description' => 'Stadion daxilində yemək və içki məntəqələri',
                'icon' => 'cafe.png',
                'status' => 'active',
            ],
            [
                'name' => 'Pulsuz Wi-Fi',
                'description' => 'Ziyarətçilər üçün yüksək sürətli pulsuz internet',
                'icon' => 'wifi-router.png',
                'status' => 'active',
            ],
            [
                'name' => 'Təcili Yardım Xidməti',
                'description' => 'Təcili tibbi yardım məntəqələri',
                'icon' => 'ambulance.png',
                'status' => 'active',
            ],
            [
                'name' => 'Əlillər üçün Əlçatanlıq',
                'description' => 'Əlillər üçün xüsusi giriş və xidmətlər',
                'icon' => 'toilet.png',
                'status' => 'active',
            ],
            [
                'name' => 'LED Ekranlar',
                'description' => 'Böyük ölçülü yüksək keyfiyyətli LED ekranlar',
                'icon' => 'monitor.png',
                'status' => 'active',
            ],
            [
                'name' => 'Uşaqlar üçün Əyləncə Sahəsi',
                'description' => 'Uşaqlar üçün oyun və əyləncə məkanları',
                'icon' => 'playground.png',
                'status' => 'active',
            ],
            [
                'name' => 'Paltardəyişmə Otaqları',
                'description' => 'Komandalar üçün geniş və rahat paltardəyişmə otaqları',
                'icon' => 'closet.png',
                'status' => 'active',
            ],
            [
                'name' => 'Təlim Mərkəzi',
                'description' => 'Komandalar üçün xüsusi məşq və hazırlıq sahələri',
                'icon' => 'training.png',
                'status' => 'active',
            ],
            [
                'name' => 'Əlverişli İqlimləşdirilmiş Sahələr',
                'description' => 'Soyudulmuş və ya isitilmiş sahələr (klimat kontrol)',
                'icon' => 'field.png',
                'status' => 'active',
            ],
            [
                'name' => 'Oyun Sahəsi İşıqlandırması',
                'description' => 'Gecə oyunları üçün yüksək keyfiyyətli işıqlandırma sistemi',
                'icon' => 'light.png',
                'status' => 'active',
            ],
            [
                'name' => 'Tribunalar ',
                'description' => 'Azarkeşlər üçün tribunalar',
                'icon' => 'tribune.png',
                'status' => 'active',
            ],
            [
                'name' => 'Elektron Bilet Sistemi',
                'description' => 'Rəqəmsal bilet satışı və yoxlanışı üçün sistem',
                'icon' => 'tickets.png',
                'status' => 'active',
            ],
            [
                'name' => 'Təhlükəsizlik Kameraları',
                'description' => 'Təhlükəsizlik üçün 24/7 kameralarla nəzarət sistemi',
                'icon' => 'cctv-camera.png',
                'status' => 'active',
            ],
        ];

        foreach ($features as $feature) {
            Features::create([
                'name' => $feature['name'],
                'description' => $feature['description'],
                'icon' => $feature['icon'],
                'status' => $feature['status'],
            ]);
        }
    }
}
