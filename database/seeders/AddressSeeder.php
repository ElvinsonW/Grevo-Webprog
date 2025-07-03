<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address; // Import model Address
use App\Models\User; // Import model User jika ingin mengambil user_id secara dinamis

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada user di database. Jika belum ada, Anda bisa membuat satu di sini
        // atau pastikan DatabaseSeeder Anda sudah membuat user.
        $user = User::first(); // Ambil user pertama yang ada

        if (!$user) {
            // Jika tidak ada user, buat satu user dummy untuk keperluan seeding
            $user = User::factory()->create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'username' => 'demouser',
                'password' => bcrypt('password'), // Ganti dengan password yang aman
            ]);
        }

        // Hapus data lama untuk menghindari duplikasi saat seeding berulang
        Address::truncate();

        // Data alamat contoh
        Address::create([
            'user_id' => $user->id,
            'recipient_name' => 'Cecilia Supardi',
            'phone_number' => '(+62) 891 2173 8472',
            'street_address' => 'Jl. Pakuan no. 3, Daan Mogot Raya',
            'city' => 'KOTA JAKARTA PUSAT',
            'province' => 'DKI Jakarta',
            'postal_code' => '10101',
            'other_details' => 'Tolong titipin di resepsionis',
            'label' => 'Home',
            'is_default' => true, // Alamat default
        ]);

        Address::create([
            'user_id' => $user->id,
            'recipient_name' => 'Nama Penerima Lain',
            'phone_number' => '(+62) 812 3456 7890',
            'street_address' => 'Jl. Contoh Alamat No. 123',
            'city' => 'KABUPATEN CONTOH',
            'province' => 'PROVINSI CONTOH',
            'postal_code' => '12345',
            'other_details' => null,
            'label' => 'Work',
            'is_default' => false,
        ]);

        // Anda bisa menambahkan lebih banyak alamat di sini
        // Address::create([
        //     'user_id' => $user->id,
        //     'recipient_name' => 'Nama Lain',
        //     'phone_number' => '(+62) 876 5432 1098',
        //     'street_address' => 'Jl. Jalan Santai No. 45',
        //     'city' => 'KOTA LAIN',
        //     'province' => 'PROVINSI LAIN',
        //     'postal_code' => '54321',
        //     'other_details' => 'Dekat toko buku',
        //     'label' => 'Other',
        //     'is_default' => false,
        // ]);

        $this->command->info('Addresses seeded successfully!');
    }
}