<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User di-import

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan baris ini untuk menghapus data lama sebelum seeding

        User::create([
            'name' => 'Elvinson Wijaya',
            'username' => 'elvinson',
            'email' => 'elvinso@gmail.com',
            'phone_number' => '085263506419',
            'address' => 'RTB BCA',
            'gender' => 'male',
            'image' => 'elvinson.jpg',
            'role' => 'user',
            'password' => bcrypt('password'), // Gunakan bcrypt untuk password
        ]);

        $this->command->info('Users seeded successfully!');
    }
}