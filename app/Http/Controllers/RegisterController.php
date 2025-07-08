<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User; // Import model User Anda
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password; // Untuk validasi password lebih kuat (PHP 8+)

class RegisterController extends Controller
{
    /**
     * Menampilkan form pendaftaran.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('signup'); // Mengembalikan view signup.blade.php
    }

    /**
     * Menangani permintaan pendaftaran.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'], // Nama depan wajib diisi
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Email unik dan format valid
            'password' => ['required', 'confirmed', Password::defaults()], // Password wajib, konfirmasi, dan memenuhi default aturan Laravel
            'terms' => ['accepted'], // Checkbox "terms" harus dicentang
        ], [
            // Pesan error kustom untuk validasi
            'first_name.required' => 'Nama depan wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email ini sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'terms.accepted' => 'Anda harus menyetujui Syarat Layanan dan Kebijakan Privasi.',
        ]);

        // Jika validasi gagal, kembalikan ke form dengan error dan input lama
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->except('password', 'password_confirmation'));
        }

        // Buat user baru di database
        User::create([
            'name' => $request->first_name, // Menggunakan 'first_name' dari form untuk mengisi kolom 'name' di model User
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
        ]);

        // Redirect ke halaman signin dengan pesan sukses setelah pendaftaran berhasil
        return redirect()->route('signin')->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }
}

