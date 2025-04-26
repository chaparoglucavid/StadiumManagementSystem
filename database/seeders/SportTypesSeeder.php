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
            ['name' => 'Futbol', 'description' => 'Futbol'],
            ['name' => 'Basketbol', 'description' => 'Basketbol'],
            ['name' => 'Voleybol', 'description' => 'Voleybol'],
            ['name' => 'Tennis', 'description' => 'Tennis'],
            ['name' => 'Həndbol', 'description' => 'Həndbol'],
            ['name' => 'Badminton', 'description' => 'Badminton'],
        ];

        foreach ($types as $type) {
            SportTypes::create($type);
        }
    }
}
