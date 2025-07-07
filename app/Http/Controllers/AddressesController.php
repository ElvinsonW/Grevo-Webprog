<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada untuk Auth::user()

class AddressesController extends Controller
{
    public function index()
    {
        // Data user dummy atau user yang sedang login
        $user = Auth::user();
        if (!$user) {
            // Jika tidak ada user login, berikan data user dummy
            $user = (object)[
                'username' => 'Dummy User', // Nama dummy
                'image' => null, // Atau 'images/skz.jpg' jika ingin ada gambar default
                'points' => 1234
            ];
        }

        // Data alamat dummy
        $addresses = [
            (object)[
                'id' => 1,
                'recipient_name' => 'Cecilia Supardi',
                'phone_number' => '(+62) 891 2173 8472',
                'street_address' => 'Jl. Pakuan no. 3, Daan Mogot Raya',
                'province' => 'DKI Jakarta',
                'city' => 'KOTA JAKARTA PUSAT',
                'district' => 'GAMBIR',
                'postal_code' => '10101',
                'other_details' => 'Tolong titipkan di resepsionis.',
                'label' => 'Home',
                'is_default' => true,
            ],
            (object)[
                'id' => 2,
                'recipient_name' => 'Nama Penerima Lain',
                'phone_number' => '(+62) 812 3456 7890',
                'street_address' => 'Jl. Contoh Alamat No. 123',
                'province' => 'PROVINSI CONTOH',
                'city' => 'KABUPATEN CONTOH',
                'district' => 'KECAMATAN CONTOH',
                'postal_code' => '12345',
                'other_details' => null,
                'label' => 'Work',
                'is_default' => false,
            ],
            (object)[
                'id' => 3,
                'recipient_name' => 'John Doe',
                'phone_number' => '(+62) 876 5432 1098',
                'street_address' => 'Apartemen Sukajadi Blok C No. 5',
                'province' => 'Jawa Barat',
                'city' => 'Bandung',
                'district' => 'Cihampelas',
                'postal_code' => '40123',
                'other_details' => 'Unit 10B, dekat lift.',
                'label' => 'Other',
                'is_default' => false,
            ],
        ];

        return view('edit-profile.addresses', compact('user', 'addresses'));
    }

    // Metode dummy untuk operasi CRUD (tanpa implementasi database)
    public function store(Request $request)
    {
        return redirect()->back()->with('success', 'Address added (dummy)!');
    }

    public function update(Request $request, $id)
    {
        return redirect()->back()->with('success', "Address $id updated (dummy)! ");
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', "Address $id deleted (dummy)! ");
    }

    public function setDefault($id)
    {
        return redirect()->back()->with('success', "Address $id set as default (dummy)! ");
    }
    
}