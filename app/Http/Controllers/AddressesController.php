<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AddressesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses()->orderByDesc('is_default')->get();

        return view('User.edit-profile.addresses', compact('user', 'addresses'));
    }

    public function create()
    {
        // Jika Anda ingin form "tambah alamat" dalam modal juga,
        // Anda mungkin tidak perlu metode ini mengembalikan view,
        // melainkan hanya ada tombol di halaman utama yang memicu modal kosong.
        // return view('addresses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'street_address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'urban_village' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:255',
            'is_default' => 'boolean',
        ]);

        $validatedData['user_id'] = Auth::id();

        if (isset($validatedData['is_default']) && $validatedData['is_default']) {
            Auth::user()->addresses()->update(['is_default' => false]);
        } else {
            if (Auth::user()->addresses()->doesntExist()) {
                $validatedData['is_default'] = true;
            }
        }

        Address::create($validatedData);

        return redirect()->route('addresses')->with('success', 'Address added successfully.');
    }

    public function edit(Address $address)
    {
        // Dalam kasus modal, metode ini tidak mengembalikan view.
        // Data diambil oleh JS di client-side dari data-attributes.
        // Jika perlu data tambahan, Anda bisa mengembalikan JSON:
        // return response()->json($address);
        if (Auth::id() !== $address->user_id) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function update(Request $request, Address $address)
    {
        if (Auth::id() !== $address->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'street_address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'urban_village' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:255',
            'is_default' => 'boolean',
        ]);

        $isDefaultRequested = $request->has('is_default');

        if ($isDefaultRequested) {
            Auth::user()->addresses()->where('id', '!=', $address->id)->update(['is_default' => false]);
            $validatedData['is_default'] = true;
        } else {
            $validatedData['is_default'] = false;
        }

        $address->update($validatedData);

        return redirect()->route('addresses')->with('success', 'Address updated successfully.');
    }

    public function destroy(Address $address)
    {
        if (Auth::id() !== $address->user_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($address->is_default) {
            $newDefault = Auth::user()->addresses()->where('id', '!=', $address->id)->first();
            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
        }

        $address->delete();

        return redirect()->route('addresses')->with('success', 'Address deleted successfully.');
    }

    public function setDefault(Address $address)
    {
        if (Auth::id() !== $address->user_id) {
            abort(403, 'Unauthorized action.');
        }

        Auth::user()->addresses()->update(['is_default' => false]);
        $address->update(['is_default' => true]);

        return redirect()->route('addresses')->with('success', 'Address set as default.');
    }
}