<?php

namespace Database\Seeders;

use App\Models\Languages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'name' => [
                    'az' => 'Azərbaycan dili',
                    'en' => 'Azerbaijani',
                ],
                'shortened' => [
                    'az' => 'az',
                    'en' => 'az',
                ],
                'icon' => 'az.png',
                'status' => 1
            ],
            [
                'name' => [
                    'az' => 'İngilis dili',
                    'en' => 'English',
                ],
                'shortened' => [
                    'az' => 'en',
                    'en' => 'en',
                ],
                'icon' => 'en.png',
                'status' => 1
            ]
        ];

        foreach ($array as $language) {
            Languages::create($language);
        }

    }
}
