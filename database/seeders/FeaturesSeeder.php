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
                'icon' => 'fa-crown', // FontAwesome icon
                'status' => 'active',
            ],
            [
                'name' => 'Avtodayanacaq',
                'description' => 'Azarkeşlər və qonaqlar üçün geniş avtodayanacaq sahəsi',
                'icon' => 'fa-car',
                'status' => 'active',
            ],
            [
                'name' => 'Qida Zonası',
                'description' => 'Stadion daxilində yemək və içki məntəqələri',
                'icon' => 'fa-utensils',
                'status' => 'active',
            ],
            [
                'name' => 'Pulsuz Wi-Fi',
                'description' => 'Ziyarətçilər üçün yüksək sürətli pulsuz internet',
                'icon' => 'fa-wifi',
                'status' => 'active',
            ],
            [
                'name' => 'Təcili Yardım Xidməti',
                'description' => 'Təcili tibbi yardım məntəqələri',
                'icon' => 'fa-briefcase-medical',
                'status' => 'active',
            ],
            [
                'name' => 'Əlillər üçün Əlçatanlıq',
                'description' => 'Əlillər üçün xüsusi giriş və xidmətlər',
                'icon' => 'fa-wheelchair',
                'status' => 'active',
            ],
            [
                'name' => 'LED Ekranlar',
                'description' => 'Böyük ölçülü yüksək keyfiyyətli LED ekranlar',
                'icon' => 'fa-tv',
                'status' => 'active',
            ],
            [
                'name' => 'Uşaqlar üçün Əyləncə Sahəsi',
                'description' => 'Uşaqlar üçün oyun və əyləncə məkanları',
                'icon' => 'fa-child',
                'status' => 'active',
            ],
            [
                'name' => 'Paltardəyişmə Otaqları',
                'description' => 'Komandalar üçün geniş və rahat paltardəyişmə otaqları',
                'icon' => 'fa-tshirt',
                'status' => 'active',
            ],
            [
                'name' => 'Təlim Mərkəzi',
                'description' => 'Komandalar üçün xüsusi məşq və hazırlıq sahələri',
                'icon' => 'fa-dumbbell',
                'status' => 'active',
            ],
            [
                'name' => 'Əlverişli İqlimləşdirilmiş Sahələr',
                'description' => 'Soyudulmuş və ya isitilmiş sahələr (klimat kontrol)',
                'icon' => 'fa-snowflake',
                'status' => 'active',
            ],
            [
                'name' => 'Oyun Sahəsi İşıqlandırması',
                'description' => 'Gecə oyunları üçün yüksək keyfiyyətli işıqlandırma sistemi',
                'icon' => 'fa-lightbulb',
                'status' => 'active',
            ],
            [
                'name' => 'Tribunalar Üzərində Kölgəlik',
                'description' => 'Azarkeşlər üçün kölgəliklə təmin olunmuş tribunalar',
                'icon' => 'fa-umbrella',
                'status' => 'active',
            ],
            [
                'name' => 'Elektron Bilet Sistemi',
                'description' => 'Rəqəmsal bilet satışı və yoxlanışı üçün sistem',
                'icon' => 'fa-ticket-alt',
                'status' => 'active',
            ],
            [
                'name' => 'Təhlükəsizlik Kameraları',
                'description' => 'Təhlükəsizlik üçün 24/7 kameralarla nəzarət sistemi',
                'icon' => 'fa-video',
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
