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
            'Futbol' => ['Təbii ot', 'Süni ot', 'Hibrid ot'],
            'Basketbol' => ['Parket', 'Beton', 'Süni rezin'],
            'Voleybol' => ['Qumlu', 'Taxta', 'Süni örtük'],
            'Tennis' => ['Hard court', 'Clay (torpaq)', 'Grass (ot)'],
            'Həndbol' => ['Parket', 'Süni rezin'],
            'Badminton' => ['Süni rezin', 'Parket'],
        ];

        foreach ($surfaces as $sport => $surfaceTypes) {
            $sportType = SportTypes::where('name', $sport)->first();

            if ($sportType) {
                foreach ($surfaceTypes as $name) {
                    PlaygroundSurfaceTypes::create([
                        'sport_type_uid' => $sportType->uid,
                        'name' => $name,
                        'description' => $sport . ' üçün ' . strtolower($name),
                        'status' => true
                    ]);
                }
            }
        }
    }
}
