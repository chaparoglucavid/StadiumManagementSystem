<?php

namespace Database\Seeders;

use App\Models\PlaygroundSurfaceTypes;
use App\Models\SportTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaygroundSurfaceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surfaces = [
            'Futbol' => [
                ['az' => 'Təbii ot', 'en' => 'Natural grass'],
                ['az' => 'Süni ot', 'en' => 'Artificial grass'],
                ['az' => 'Hibrid ot', 'en' => 'Hybrid grass'],
            ],
            'Basketbol' => [
                ['az' => 'Parket', 'en' => 'Parquet'],
                ['az' => 'Beton', 'en' => 'Concrete'],
                ['az' => 'Süni rezin', 'en' => 'Artificial rubber'],
            ],
            'Voleybol' => [
                ['az' => 'Qumlu', 'en' => 'Sandy'],
                ['az' => 'Taxta', 'en' => 'Wooden'],
                ['az' => 'Süni örtük', 'en' => 'Synthetic surface'],
            ],
            'Tennis' => [
                ['az' => 'Hard court', 'en' => 'Hard court'],
                ['az' => 'Clay (torpaq)', 'en' => 'Clay'],
                ['az' => 'Grass (ot)', 'en' => 'Grass'],
            ],
            'Həndbol' => [
                ['az' => 'Parket', 'en' => 'Parquet'],
                ['az' => 'Süni rezin', 'en' => 'Artificial rubber'],
            ],
            'Badminton' => [
                ['az' => 'Süni rezin', 'en' => 'Artificial rubber'],
                ['az' => 'Parket', 'en' => 'Parquet'],
            ],
        ];

        foreach ($surfaces as $sportAz => $surfaceTypes) {
            $sportType = SportTypes::where('name->az', $sportAz)->first();

            if ($sportType) {
                foreach ($surfaceTypes as $surface) {
                    PlaygroundSurfaceTypes::create([
                        'sport_types_uid' => $sportType->uid,
                        'name' => [
                            'az' => $surface['az'],
                            'en' => $surface['en'],
                        ],
                        'description' => [
                            'az' => $sportAz . ' üçün ' . strtolower($surface['az']),
                            'en' => $sportType->getTranslation('name', 'en') . ' for ' . strtolower($surface['en']),
                        ],
                        'status' => true,
                    ]);
                }
            }
        }
    }
}
