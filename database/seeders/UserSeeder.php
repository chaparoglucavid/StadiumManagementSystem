<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'uid' => \Illuminate\Support\Str::uuid(),
            'name' => 'Cavid',
            'surname' => 'Şıxıyev',
            'fatherName' => 'Çapar',
            'email' => 'admin@sms.com',
            'phone' => '0508221300',
            'birthday' => '1994-11-29',
            'type' => 'admin',
            'role' => 'superadmin',
            'activityStatus' => 'active',
            'ban_end' => null,
            'onlineStatus' => true,
            'password' => Hash::make('salamadmin'),
            'email_verified_at' => now(),
        ]);

        User::factory(50)->create();
    }
}
