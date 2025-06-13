<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Digunakan untuk autentikasi nanti
use Illuminate\Support\Facades\Validator; // Digunakan untuk validasi nanti

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('signin'); // Mengembalikan view signin.blade.php
    }

    /**
     * Menangani permintaan login (placeholder untuk nanti).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->except('password'));
        }

        // Coba autentikasi user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerasi session ID untuk mencegah session fixation attacks
            $request->session()->regenerate();

            // Redirect ke halaman yang diinginkan setelah login sukses
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }

        // Jika login gagal, kembalikan ke form dengan pesan error
        return redirect()->back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->withInput($request->except('password'));
    }

    /**
     * Menangani permintaan logout (opsional).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}