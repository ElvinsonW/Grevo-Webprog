<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\User; // Pastikan Anda memiliki model User

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada setidaknya satu user untuk dihubungkan dengan alamat
        // Jika belum ada user, Anda bisa membuat satu di sini atau melalui UserSeeder.
        $user = User::first(); // Ambil user pertama, atau buat jika tidak ada
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        Address::create([
            'user_id' => $user->id,
            'recipient_name' => 'Nama Penerima 1',
            'phone_number' => '(+62) 896 6105 2439',
            'street_address' => 'Jl. Kebon Jeruk Raya No. 123',
            'city' => 'Jakarta Barat',
            'province' => 'DKI Jakarta',
            'urban_village' => 'Kebon Jeruk',
            'subdistrict' => 'Kebon Jeruk',
            'label' => 'Home',
            'is_default' => true,
        ]);

        Address::create([
            'user_id' => $user->id,
            'recipient_name' => 'Nama Penerima 2',
            'phone_number' => '(+62) 812 3456 7890',
            'street_address' => 'Perkantoran Taman Aries Blok A No. 1',
            'city' => 'Jakarta Barat',
            'province' => 'DKI Jakarta',
            'urban_village' => 'Kembangan',
            'subdistrict' => 'Kembangan',
            'label' => 'Office',
            'is_default' => false,
        ]);

        Address::create([
            'user_id' => $user->id,
            'recipient_name' => 'Nama Toko ABC',
            'phone_number' => '(+62) 877 1234 5678',
            'street_address' => 'Ruko XYZ No. 5',
            'city' => 'Bandung',
            'province' => 'Jawa Barat',
            'urban_village' => null, // Contoh tanpa urban_village
            'subdistrict' => 'Sukajadi',
            'label' => 'Toko',
            'is_default' => false,
        ]);

        // Anda bisa menambahkan lebih banyak data di sini
    }
}