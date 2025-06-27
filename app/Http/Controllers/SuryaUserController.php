<?php

namespace App\Http\Controllers;

use App\Models\SuryaUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuryaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

        public function adminIndex()
    {
        $users = SuryaUser::all();
        return view('admin.customer', compact('users'));
    }
// Tampilkan form register
public function showRegisterForm()
{
    return view('register');
}

// Proses simpan register
public function register(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:surya_users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    // Simpan user
    $user = SuryaUser::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Login otomatis setelah register
    auth()->login($user);

    // Redirect ke halaman booking rental
    return redirect('/rentals')->with('success', 'Pendaftaran berhasil! Silakan lakukan pemesanan.');
}

public function logout()
{
    Auth::logout(); // Logout user yang sedang login
    return redirect('/')->with('success', 'Berhasil logout.');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuryaUser $suryaUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuryaUser $suryaUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuryaUser $suryaUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuryaUser $suryaUser)
    {
        //
    }
}
