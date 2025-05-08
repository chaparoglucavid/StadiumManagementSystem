<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\StadiumTypes;
use App\Models\PlaygroundSurfaceTypes;
use App\Models\SportTypes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LanguagesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FeaturesSeeder::class);
        $this->call(CityRegionsSeedeer::class);
        $this->call(StadiumTypesSeeder::class);
        $this->call(SportTypesSeeder::class);
        $this->call(PlaygroundSurfaceTypesSeeder::class);
    }
}
