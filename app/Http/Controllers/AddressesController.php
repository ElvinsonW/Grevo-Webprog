<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Services\RajaOngkirService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses()->orderByDesc('is_default')->get();

        return view('User.edit-profile.addresses', compact('user', 'addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Flash a session variable to indicate that the "add address" modal should be shown
        // if validation fails. This helps to re-open the correct modal and retain old input.
        $request->session()->flash('show_add_modal', true);

        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'street_address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'urban_village' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'postal_code' => 'string|min:5|max:5',
            'label' => 'nullable|string|max:255'
        ]);

        $validatedData['user_id'] = Auth::id();

        $full_address = collect([
            $validatedData['urban_village'],
            $validatedData['subdistrict'],
            $validatedData['city'],
            $validatedData['province'],
            $validatedData['postal_code']
        ])->filter()->implode(', ');

        $rajaOngkirId = $this->searchRajaOngkirId($full_address);

        $validatedData['rajaOngkirId'] = $rajaOngkirId['id'] ?? 1;

        Address::create($validatedData);

        $request->session()->forget('show_add_modal');

        return redirect()->route('addresses')->with('success', 'Alamat berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        // Ensure the authenticated user owns this address
        if (Auth::id() !== $address->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Flash a session variable to indicate that the "edit address" modal should be shown
        // if validation fails, and include the ID of the address being edited.
        $request->session()->flash('show_edit_modal_id', $address->id);
        $request->session()->flash('old_edit_data', $request->all()); // Flash all request data for old() helper

        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'street_address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'urban_village' => 'string|max:255',
            'subdistrict' => 'string|max:255',
            'postal_code' => 'string|min:5|max:5',
            'label' => 'nullable|string|max:255',
        ]);

        $full_address = collect([
            $validatedData['urban_village'],
            $validatedData['subdistrict'],
            $validatedData['city'],
            $validatedData['province'],
            $validatedData['postal_code']
        ])->filter()->implode(', ');

        $rajaOngkirId = $this->searchRajaOngkirId($full_address);

        $validatedData['rajaOngkirId'] = $rajaOngkirId['id'] ?? 1;

        $address->update($validatedData);

        // Remove the flash flags if successful
        $request->session()->forget('show_edit_modal_id');
        $request->session()->forget('old_edit_data');

        return redirect()->route('addresses')->with('success', 'Alamat berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        // Ensure the authenticated user owns this address
        if (Auth::id() !== $address->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // If the address to be deleted is the default one,
        // assign a new default before deleting it.
        if ($address->is_default) {
            // Find another address to become default (preferring an existing one if possible)
            $newDefault = Auth::user()->addresses()->where('id', '!=', $address->id)->first();
            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
            // If no other addresses exist, no default will be set for the user for now.
        }

        $address->delete();

        return redirect()->route('addresses')->with('success', 'Alamat berhasil dihapus.');
    }

    /**
     * Set the specified address as default.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function setDefault(Address $address)
    {
        if (Auth::id() !== $address->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Unset current default for this user
        Auth::user()->addresses()->update(['is_default' => false]);

        // Set the chosen address as default
        $address->update(['is_default' => true]);

        return redirect()->route('addresses')->with('success', 'Alamat berhasil diatur sebagai default.');
    }
    
    public function searchRajaOngkirId(string $search){
        $rajaOngkir = new RajaOngkirService();
        return $rajaOngkir->searchDestination($search);
    }
}