<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Elvinson Wijaya',
            'username' => 'elvinson',
            'email' => 'elvinso@gmail.com',
            'phone_number' => '085263506419',
            'address' => 'RTB BCA',
            'gender' => 'male',
            'image' => 'elvinson.jpg',
            'role' => 'user',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(5)->create([
            'image' => 'profile-image/elvinson.jpg'
        ]);
    }
}
