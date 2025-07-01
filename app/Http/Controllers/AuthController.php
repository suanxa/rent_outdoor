<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required'
    ]);

    // Ambil data email dan password
    $credentials = $request->only('email', 'password');

    // Coba login
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Prevent session fixation attack

        // Cek role user yang login
        $user = Auth::user(); // ambil user
        $role = $user->role;

        if ($role === 'admin' || $role === 'sek_admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('landing');
        }
    }

    // Jika gagal
    return back()->withErrors([
        'login' => 'Email atau password salah.',
    ])->onlyInput('email');
}


    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();    // Hapus session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('landing');
    }
}
