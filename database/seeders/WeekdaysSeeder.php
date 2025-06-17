<?php

namespace Database\Seeders;

use App\Models\Languages;
use App\Models\Weekdays;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeekdaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weekdays = [
            ['en' => 'Monday',    'az' => 'Bazar ertəsi'],
            ['en' => 'Tuesday',   'az' => 'Çərşənbə axşamı'],
            ['en' => 'Wednesday', 'az' => 'Çərşənbə'],
            ['en' => 'Thursday',  'az' => 'Cümə axşamı'],
            ['en' => 'Friday',    'az' => 'Cümə'],
            ['en' => 'Saturday',  'az' => 'Şənbə'],
            ['en' => 'Sunday',    'az' => 'Bazar'],
        ];

        foreach ($weekdays as $day) {
            Weekdays::create([
                'name' => $day,
            ]);
        }

    }
}
