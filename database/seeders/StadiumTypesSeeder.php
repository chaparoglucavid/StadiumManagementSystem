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
            ['name' => 'Açıq Stadion', 'description' => 'Tam açıq stadion', 'status' => true],
            ['name' => 'Qapalı Stadion', 'description' => 'Tam qapalı stadion', 'status' => true],
            ['name' => 'Yarı Açıq', 'description' => 'Qismən qapalı stadion', 'status' => true],
        ];

        foreach ($types as $type) {
            StadiumTypes::create($type);
        }
    }
}
