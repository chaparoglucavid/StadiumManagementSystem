<?php

namespace Database\Seeders;

use App\Models\StadiumTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StadiumTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => ['az' => 'Açıq Stadion', 'en' => 'Open Stadium'],
                'description' => [
                    'az' => 'Tam açıq stadion',
                    'en' => 'Completely open stadium',
                ],
                'status' => true,
            ],
            [
                'name' => ['az' => 'Qapalı Stadion', 'en' => 'Indoor Stadium'],
                'description' => [
                    'az' => 'Tam qapalı stadion',
                    'en' => 'Completely indoor stadium',
                ],
                'status' => true,
            ],
            [
                'name' => ['az' => 'Yarı Açıq', 'en' => 'Semi-Open Stadium'],
                'description' => [
                    'az' => 'Qismən qapalı stadion',
                    'en' => 'Partially indoor stadium',
                ],
                'status' => true,
            ],
        ];

        foreach ($types as $type) {
            StadiumTypes::create($type);
        }
    }
}
