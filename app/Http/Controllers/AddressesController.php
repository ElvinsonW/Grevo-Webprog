<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
     * Show the form for creating a new resource.
     * (Not typically used when using modals, but kept for convention or API purposes)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // This method is generally not needed when using modals where the form
        // is part of the main page or triggered directly by JS.
        // If it were an API endpoint, you might return a JSON response.
        return abort(404); // Or return response()->json(['message' => 'Not found'], 404);
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
            'label' => 'nullable|string|max:255',
            'is_default' => 'nullable|boolean', // 'nullable' because checkbox might not be present if unchecked
        ]);

        $validatedData['user_id'] = Auth::id();

        // Handle the 'is_default' logic
        $userHasAddresses = Auth::user()->addresses()->exists();

        // If 'is_default' checkbox was checked, or if it's the first address and no other default exists
        if (isset($validatedData['is_default']) && $validatedData['is_default'] == true) {
            // Unset all other default addresses for this user
            Auth::user()->addresses()->update(['is_default' => false]);
            $validatedData['is_default'] = true;
        } elseif (!$userHasAddresses) {
            // If it's the very first address, make it default by default (even if checkbox wasn't checked)
            $validatedData['is_default'] = true;
        } else {
            // If there are existing addresses and 'is_default' was not checked or sent as false
            $validatedData['is_default'] = false;
        }

        Address::create($validatedData);

        // Remove the flash flag if successful, so modal doesn't pop up on next load
        $request->session()->forget('show_add_modal');

        return redirect()->route('addresses')->with('success', 'Address added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     * (This method is generally not needed when using modals where data is pre-filled by JS)
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function edit(Address $address)
    {
        // In a modal-based UI, this method typically doesn't return a view.
        // Data is pre-filled by client-side JS using data-attributes from the list.
        // If you were to use this as an API endpoint to fetch data for editing:
        // Ensure the authenticated user owns this address
        if (Auth::id() !== $address->user_id) {
            abort(403, 'Unauthorized action.');
        }
        // return response()->json($address); // Uncomment if you need an API endpoint
        abort(404); // If not used as an API, it's safer to block direct access.
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
            'urban_village' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:255',
            'is_default' => 'nullable|boolean',
        ]);

        $isDefaultRequested = $request->has('is_default'); // Check if checkbox was even present in request

        if ($isDefaultRequested && $request->boolean('is_default')) {
            // If 'is_default' was checked and sent as true (1)
            // Unset all other default addresses for this user, except the current one if it was already default
            Auth::user()->addresses()->where('id', '!=', $address->id)->update(['is_default' => false]);
            $validatedData['is_default'] = true;
        } else {
            // If 'is_default' was unchecked (0) or not present in request (meaning it was unchecked)
            $validatedData['is_default'] = false;

            // If the address being updated *was* the default, and now it's being unset,
            // we must ensure another address becomes default if one exists.
            if ($address->is_default) {
                // Find the first *other* address and set it as default
                $newDefault = Auth::user()->addresses()
                                ->where('id', '!=', $address->id)
                                ->orderBy('id') // Order by ID to ensure consistent selection
                                ->first();
                if ($newDefault) {
                    $newDefault->update(['is_default' => true]);
                }
            }
        }

        $address->update($validatedData);

        // Remove the flash flags if successful
        $request->session()->forget('show_edit_modal_id');
        $request->session()->forget('old_edit_data');

        return redirect()->route('addresses')->with('success', 'Address updated successfully.');
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

        return redirect()->route('addresses')->with('success', 'Address deleted successfully.');
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

        return redirect()->route('addresses')->with('success', 'Address set as default.');
    }
    
}