<?php

use App\Http\Controllers\SuryaRentalController;
use App\Http\Controllers\SuryaItemController;
use App\Http\Controllers\SuryaUserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [SuryaUserController::class, 'showRegisterForm']);
Route::post('/register', [SuryaUserController::class, 'register']);

// Logout universal (baik admin maupun user)
Route::post('/logout', function (Request $request) {
    $user = Auth::user();
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    if ($user && $user->role === 'admin') {
        return redirect('/')->with('success', 'Anda berhasil logout dari admin.');
    }

    return redirect('/')->with('success', 'Anda berhasil logout.');
})->name('logout');

// Halaman item & rental untuk user umum
Route::get('/items', [SuryaItemController::class, 'index']);
Route::get('/rentals', [SuryaRentalController::class, 'create']);
Route::post('/rentals', [SuryaRentalController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Admin Routes (gunakan prefix & middleware kalau mau lebih aman)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.adminDashboard');
    })->name('admin.dashboard');

    // Customer Management
    Route::get('/customers', [SuryaUserController::class, 'adminIndex']);

    // Item Management
    Route::get('/items', [SuryaItemController::class, 'adminIndex']);
    Route::get('/items/create', [SuryaItemController::class, 'create']);
    Route::post('/items', [SuryaItemController::class, 'store']);
    Route::get('/items/{id}/edit', [SuryaItemController::class, 'edit']);
    Route::put('/items/{id}', [SuryaItemController::class, 'update']);
    Route::delete('/items/{id}', [SuryaItemController::class, 'destroy']);

    // Rental Management
    Route::get('/rentals', [SuryaRentalController::class, 'adminIndex']);
    Route::get('/rentals/search', [SuryaRentalController::class, 'search']);
    Route::put('/rentals/{id}', [SuryaRentalController::class, 'update']);
    Route::delete('/rentals/{id}', [SuryaRentalController::class, 'destroy']);
});
