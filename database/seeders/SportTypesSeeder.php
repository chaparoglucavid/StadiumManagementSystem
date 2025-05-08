<?php

namespace Database\Seeders;

use App\Models\SportTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => ['az' => 'Futbol', 'en' => 'Football'],
                'description' => ['az' => 'Futbol', 'en' => 'Football'],
            ],
            [
                'name' => ['az' => 'Basketbol', 'en' => 'Basketball'],
                'description' => ['az' => 'Basketbol', 'en' => 'Basketball'],
            ],
            [
                'name' => ['az' => 'Voleybol', 'en' => 'Volleyball'],
                'description' => ['az' => 'Voleybol', 'en' => 'Volleyball'],
            ],
            [
                'name' => ['az' => 'Tennis', 'en' => 'Tennis'],
                'description' => ['az' => 'Tennis', 'en' => 'Tennis'],
            ],
            [
                'name' => ['az' => 'Həndbol', 'en' => 'Handball'],
                'description' => ['az' => 'Həndbol', 'en' => 'Handball'],
            ],
            [
                'name' => ['az' => 'Badminton', 'en' => 'Badminton'],
                'description' => ['az' => 'Badminton', 'en' => 'Badminton'],
            ],
        ];

        foreach ($types as $type) {
            SportTypes::create($type);
        }
    }
}
