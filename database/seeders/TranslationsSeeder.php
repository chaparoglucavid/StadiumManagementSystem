<?php

namespace Database\Seeders;

use App\Models\Languages;
use App\Models\Translations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class TranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $translations = [
            ['key' => 'stadium management system', 'value' => 'Stadion İdarə sistemi', 'languages_uid' => Languages::first()->uid],
            ['key' => 'admin dashboard', 'value' => 'İdarə paneli', 'languages_uid' => Languages::first()->uid],
            ['key' => 'email', 'value' => 'Email ünvanı', 'languages_uid' => Languages::first()->uid],
            ['key' => 'name', 'value' => 'Ad', 'languages_uid' => Languages::first()->uid],
            ['key' => 'phone', 'value' => 'Telefon nömrəsi', 'languages_uid' => Languages::first()->uid],
            ['key' => 'status', 'value' => 'Status', 'languages_uid' => Languages::first()->uid],
            ['key' => 'operations', 'value' => 'Əməliyyatlar', 'languages_uid' => Languages::first()->uid],
            ['key' => 'registration date', 'value' => 'Qeydiyyat tarixi', 'languages_uid' => Languages::first()->uid],
            ['key' => 'password', 'value' => 'Şifrə', 'languages_uid' => Languages::first()->uid],
            ['key' => 'login', 'value' => 'Daxil olun', 'languages_uid' => Languages::first()->uid],
            ['key' => 'homepage', 'value' => 'Əsas səhifə', 'languages_uid' => Languages::first()->uid],
            ['key' => 'users', 'value' => 'İstifadəçilər', 'languages_uid' => Languages::first()->uid],
            ['key' => 'customers', 'value' => 'Müştərilər', 'languages_uid' => Languages::first()->uid],
            ['key' => 'vendors', 'value' => 'Vendorlar', 'languages_uid' => Languages::first()->uid],
            ['key' => 'description', 'value' => 'Açıqlama', 'languages_uid' => Languages::first()->uid],
            ['key' => 'stadiums', 'value' => 'Meydançalar', 'languages_uid' => Languages::first()->uid],
            ['key' => 'reservations', 'value' => 'Rezervasiyalar', 'languages_uid' => Languages::first()->uid],
            ['key' => 'payment_history', 'value' => 'Ödəniş tarixçəsi', 'languages_uid' => Languages::first()->uid],
            ['key' => 'settings', 'value' => 'Tənzimləmələr', 'languages_uid' => Languages::first()->uid],
            ['key' => 'general settings', 'value' => 'Ümumi tənzimləmələr', 'languages_uid' => Languages::first()->uid],
            ['key' => 'cities', 'value' => 'Şəhərlər', 'languages_uid' => Languages::first()->uid],
            ['key' => 'regions', 'value' => 'Rayonlar', 'languages_uid' => Languages::first()->uid],
            ['key' => 'languages', 'value' => 'Dillər', 'languages_uid' => Languages::first()->uid],
            ['key' => 'features', 'value' => 'Meydança özəllikləri', 'languages_uid' => Languages::first()->uid],
            ['key' => 'sport types', 'value' => 'İdman növləri', 'languages_uid' => Languages::first()->uid],
            ['key' => 'sport type', 'value' => 'İdman növü', 'languages_uid' => Languages::first()->uid],
            ['key' => 'stadium types', 'value' => 'Meydança növləri', 'languages_uid' => Languages::first()->uid],
            ['key' => 'playground surface types', 'value' => 'Meydança örtük növləri', 'languages_uid' => Languages::first()->uid],
            ['key' => 'playground surface type', 'value' => 'Meydança örtük növü', 'languages_uid' => Languages::first()->uid],
            ['key' => 'vendor packages', 'value' => 'Vendor paketləri', 'languages_uid' => Languages::first()->uid],
            ['key' => 'about system', 'value' => 'Sistem haqqında', 'languages_uid' => Languages::first()->uid],
            ['key' => 'add new user', 'value' => 'Yeni istifadəçi əlavə et', 'languages_uid' => Languages::first()->uid],
            ['key' => 'city', 'value' => 'Şəhər', 'languages_uid' => Languages::first()->uid],
            ['key' => 'date', 'value' => 'Tarix', 'languages_uid' => Languages::first()->uid],
            ['key' => 'new city', 'value' => 'Yeni şəhər', 'languages_uid' => Languages::first()->uid],
            ['key' => 'create', 'value' => 'Daxil et', 'languages_uid' => Languages::first()->uid],
            ['key' => 'update', 'value' => 'Yadda saxla', 'languages_uid' => Languages::first()->uid],
            ['key' => 'select status', 'value' => 'Status seçin', 'languages_uid' => Languages::first()->uid],
            ['key' => 'active', 'value' => 'Aktiv', 'languages_uid' => Languages::first()->uid],
            ['key' => 'inactive', 'value' => 'Deaktiv', 'languages_uid' => Languages::first()->uid],
            ['key' => 'edit', 'value' => 'Düzəliş et', 'languages_uid' => Languages::first()->uid],
            ['key' => 'delete', 'value' => 'Sil', 'languages_uid' => Languages::first()->uid],
            ['key' => 'add new vendor package', 'value' => 'Yeni vendor paketi əlavə et', 'languages_uid' => Languages::first()->uid],
            ['key' => 'new vendor package', 'value' => 'Yeni vendor paketi', 'languages_uid' => Languages::first()->uid],
            ['key' => 'package name', 'value' => 'Paket adı', 'languages_uid' => Languages::first()->uid],
            ['key' => 'package short description', 'value' => 'Paket haqqında qısa məlumat', 'languages_uid' => Languages::first()->uid],
            ['key' => 'amount', 'value' => 'Qiymət', 'languages_uid' => Languages::first()->uid],
            ['key' => 'commission', 'value' => 'Komissiya', 'languages_uid' => Languages::first()->uid],
            ['key' => 'duration', 'value' => 'Aktivlik müddəti', 'languages_uid' => Languages::first()->uid],
            ['key' => 'close', 'value' => 'Bağla', 'languages_uid' => Languages::first()->uid],
            ['key' => 'add new playground surface type', 'value' => 'Yeni meydança örtük növü', 'languages_uid' => Languages::first()->uid],
        ];

        foreach ($translations as $item) {
            Translations::create([
                'uid' => \Illuminate\Support\Str::uuid()->toString(),
                'languages_uid' => $item['languages_uid'],
                'key' => $item['key'],
                'value' => $item['value'],
            ]);
        }
    }
}
