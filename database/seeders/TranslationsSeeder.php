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
        $array = [
            [
                'uid' => \Illuminate\Support\Str::uuid()->toString(),
                'languages_uid' => 'a0012cf3-b0a0-459d-8e71-a632230e7889',
                'key' => "Homepage",
                'value' => "Əsas səhifə",
            ]
        ];

        Translations::insert($array);
    }
}
