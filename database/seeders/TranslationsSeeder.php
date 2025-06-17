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
        $languages = Languages::all();
        $translations = [
            ['key' => 'keep your password secret for system security', 'value' => 'Sistemin təhlükəsizliyi üçün şifrənizi gizli saxlayın'],
            ['key' => 'stadium management system', 'value' => 'Stadion İdarə sistemi'],
            ['key' => 'admin dashboard', 'value' => 'İdarə paneli'],
            ['key' => 'email', 'value' => 'Email ünvanı'],
            ['key' => 'name', 'value' => 'Ad'],
            ['key' => 'surname', 'value' => 'Soyad'],
            ['key' => 'fatherName', 'value' => 'Ata adı'],
            ['key' => 'phone', 'value' => 'Telefon nömrəsi'],
            ['key' => 'birthday', 'value' => 'Doğum tarixi'],
            ['key' => 'status', 'value' => 'Status'],
            ['key' => 'operations', 'value' => 'Əməliyyatlar'],
            ['key' => 'registration date', 'value' => 'Qeydiyyat tarixi'],
            ['key' => 'password', 'value' => 'Şifrə'],
            ['key' => 'login', 'value' => 'Daxil olun'],
            ['key' => 'homepage', 'value' => 'Əsas səhifə'],
            ['key' => 'users', 'value' => 'İstifadəçilər'],
            ['key' => 'user', 'value' => 'İstifadəçi'],
            ['key' => 'admins', 'value' => 'Adminlər'],
            ['key' => 'admin', 'value' => 'Admin'],
            ['key' => 'vendor', 'value' => 'Sahibkar'],
            ['key' => 'customers', 'value' => 'Müştərilər'],
            ['key' => 'vendors', 'value' => 'Sahibkarlar'],
            ['key' => 'description', 'value' => 'Açıqlama'],
            ['key' => 'stadiums', 'value' => 'Meydançalar'],
            ['key' => 'reservations', 'value' => 'Rezervasiyalar'],
            ['key' => 'payment_history', 'value' => 'Ödəniş tarixçəsi'],
            ['key' => 'settings', 'value' => 'Tənzimləmələr'],
            ['key' => 'general settings', 'value' => 'Ümumi tənzimləmələr'],
            ['key' => 'cities', 'value' => 'Şəhərlər'],
            ['key' => 'regions', 'value' => 'Rayonlar'],
            ['key' => 'languages', 'value' => 'Dillər'],
            ['key' => 'language', 'value' => 'Dil'],
            ['key' => 'features', 'value' => 'Meydança özəllikləri'],
            ['key' => 'feature', 'value' => 'Meydança özəlliyi'],
            ['key' => 'sport types', 'value' => 'İdman növləri'],
            ['key' => 'sport type', 'value' => 'İdman növü'],
            ['key' => 'stadium types', 'value' => 'Meydança növləri'],
            ['key' => 'stadium type', 'value' => 'Meydança növü'],
            ['key' => 'playground surface types', 'value' => 'Meydança örtük növləri'],
            ['key' => 'playground surface type', 'value' => 'Meydança örtük növü'],
            ['key' => 'vendor packages', 'value' => 'Vendor paketləri'],
            ['key' => 'about system', 'value' => 'Sistem haqqında'],
            ['key' => 'add new user', 'value' => 'Yeni istifadəçi əlavə et'],
            ['key' => 'city', 'value' => 'Şəhər'],
            ['key' => 'date', 'value' => 'Tarix'],
            ['key' => 'add new city', 'value' => 'Yeni şəhər'],
            ['key' => 'create', 'value' => 'Daxil et'],
            ['key' => 'update', 'value' => 'Yadda saxla'],
            ['key' => 'select status', 'value' => 'Status seçin'],
            ['key' => 'active', 'value' => 'Aktiv'],
            ['key' => 'inactive', 'value' => 'Deaktiv'],
            ['key' => 'blocked', 'value' => 'Blok edilib'],
            ['key' => 'edit', 'value' => 'Düzəliş et'],
            ['key' => 'delete', 'value' => 'Sil'],
            ['key' => 'add new vendor package', 'value' => 'Yeni vendor paketi əlavə et'],
            ['key' => 'new vendor package', 'value' => 'Yeni vendor paketi'],
            ['key' => 'package name', 'value' => 'Paket adı'],
            ['key' => 'package short description', 'value' => 'Paket haqqında qısa məlumat'],
            ['key' => 'amount', 'value' => 'Qiymət'],
            ['key' => 'commission', 'value' => 'Komissiya'],
            ['key' => 'duration', 'value' => 'Aktivlik müddəti'],
            ['key' => 'close', 'value' => 'Bağla'],
            ['key' => 'add new playground surface type', 'value' => 'Yeni meydança örtük növü'],
            ['key' => 'select sport type', 'value' => 'İdman növünü seçin'],
            ['key' => 'select user type', 'value' => 'İstifadəçi növünü seçin'],
            ['key' => 'add new stadium type', 'value' => 'Yeni meydança növü'],
            ['key' => 'add new sport type', 'value' => 'Yeni idman növü'],
            ['key' => 'add new feature', 'value' => 'Yeni özəllik'],
            ['key' => 'icon', 'value' => 'İkon'],
            ['key' => 'add new language', 'value' => 'Yeni dil əlavə et'],
            ['key' => 'shortened', 'value' => 'Qısaldılmış ad'],
            ['key' => 'add new region', 'value' => 'Yeni rayon'],
        ];

        foreach ($languages as $lang) {
            foreach ($translations as $item) {
                Translations::create([
                    'uid' => \Illuminate\Support\Str::uuid()->toString(),
                    'languages_uid' => $lang->uid,
                    'key' => $item['key'],
                    'value' => $lang->getTranslation('name', app()->getLocale()) === 'İngilis dili' ? ucfirst($item['key']) : $item['value']
                ]);
            }
        }
    }
}
