<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Validate CAPTCHA
        try {
            $request->validate([
                'cf-turnstile-response' => ['required', Rule::turnstile()],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->with('error', 'CAPTCHA tidak valid! Silahkan coba lagi.');
        }

        // Validate login credentials
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        // Check if username exists
        $user = \App\Models\User::where('username', $credentials['username'])->first();
        if ($user) {
            // If username exists but password is incorrect
            if (!Auth::attempt($credentials)) {
                return back()->with('error', 'Kata Sandi tidak valid. Silahkan coba lagi.');
            }
        } else {
            // If username does not exist
            return back()->with('error', 'Nama Pengguna tidak ditemukan.');
        }

        // Login successful
        if (Auth::check()) {
            $request->session()->regenerate();

            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->intended('/admin');
            } elseif ($user->role === 'operator') {
                return redirect()->intended('/operator');
            }

            return redirect()->intended('/pengguna');
        }

        // Default error message if something unexpected happens
        return back()->with('error', 'Login gagal! Terjadi kesalahan, silahkan coba lagi.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
