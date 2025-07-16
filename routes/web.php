<?php

use App\Http\Controllers\SuryaRentalController;
use App\Http\Controllers\SuryaItemController;
use App\Http\Controllers\SuryaUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuryaCustomerController;
use App\Http\Controllers\AdminDashboardController;  
use App\Http\Middleware\RoleAdmin;
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
| Admin Routes (pakai prefix & middleware auth)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth')->group(function () {

    // Dashboard pakai Controller (fix variable passing)
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Customer Management
    Route::get('/customers', [SuryaUserController::class, 'adminIndex']);
    Route::delete('/customers/{id}', [SuryaCustomerController::class, 'destroy'])
        ->middleware(RoleAdmin::class)
        ->name('customers.destroy');

    // Item Management
    Route::get('/items', [SuryaItemController::class, 'adminIndex']);
    Route::get('/items/create', [SuryaItemController::class, 'create'])->middleware(RoleAdmin::class);
    Route::post('/items', [SuryaItemController::class, 'store'])->middleware(RoleAdmin::class);
    Route::get('/items/{id}/edit', [SuryaItemController::class, 'edit']);
    Route::put('/items/{id}', [SuryaItemController::class, 'update']);
    Route::delete('/items/{id}', [SuryaItemController::class, 'destroy']);

    // API Stock item
    Route::get('/api/item-stock/{id}', [SuryaItemController::class, 'getStock']);

    // Rental Management
    Route::get('/rentals', [SuryaRentalController::class, 'adminIndex']);
    Route::get('/rentals/search', [SuryaRentalController::class, 'search']);
    Route::put('/rentals/{id}', [SuryaRentalController::class, 'update']);
    Route::delete('/rentals/{id}', [SuryaRentalController::class, 'destroy']);

});

// 🚫 Hapus route dashboard duplikat ini:
# Route::get('/admin/adminDashboard', [AdminDashboardController::class, 'index']);
