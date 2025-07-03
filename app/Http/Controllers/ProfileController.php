<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function showProfile()
    {
        // Get the authenticated user. If not logged in, $user will be null.
        $user = Auth::user();
        // You might consider passing a dummy user object for testing if $user is null,
        // but it's better to handle null directly in the Blade if no auth middleware is used.
        return view('User.edit-profile.edit-profile', compact('user'));
    }

    /**
     * Menampilkan halaman daftar alamat pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function showAddresses()
    {
        $user = Auth::user();
        if (!$user) {
            // Handle case where user is not logged in, perhaps redirect to login
            return redirect()->route('signin')->with('error', 'You must be logged in to view addresses.');
        }

        // Ambil alamat-alamat user yang sedang login
        $addresses = $user->addresses; // Menggunakan relasi hasMany

        // Path view disesuaikan: resources/views/User/edit-profile/addresses.blade.php
        return view('User.edit-profile.addresses', compact('user', 'addresses'));
    }

    /**
     * Menampilkan halaman daftar pesanan pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function showOrders()
    {
        $user = User::find(1);
        // Asumsi path view orders, bisa jadi User/orders/index atau User/edit-profile/orders
        return view('User.orders.history', compact('user'));
    }

    /**
     * Menampilkan halaman daftar ulasan pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function showReviews()
    {
        $user = Auth::user();
        // Asumsi path view reviews, bisa jadi User/reviews/index atau User/edit-profile/reviews
        return view('User.reviews.index', compact('user'));
    }

    /**
     * Mengupdate profil pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $username
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request, $username)
    {
        // This method *requires* a logged-in user.
        // If you've disabled 'auth' middleware, this method will fail if no user is logged in.
        // For temporary testing without auth, you might need to mock a user or just avoid calling this method.
        if (!Auth::check()) {
            // Redirect to login or show an error if not authenticated
            return redirect()->route('signin')->with('error', 'You must be logged in to update your profile.');
        }

        $user = Auth::user();

        if ($user->username !== $username) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024', // Max 1MB
        ]);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $user->image = $imagePath;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}