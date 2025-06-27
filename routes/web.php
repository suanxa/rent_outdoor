<?php

use App\Http\Controllers\SuryaRentalController;
use App\Http\Controllers\SuryaItemController;
use App\Http\Controllers\SuryaUserController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

//Admin
Route::get('/admin-dashboard', function () {
    return view('admin.adminDashboard');
});
Route::get('/admin/customers', [SuryaUserController::class, 'adminIndex']);
Route::get('/admin/items', [SuryaItemController::class, 'adminIndex']);
Route::get('/admin/rentals', [SuryaRentalController::class, 'adminIndex']);

//Akun
Route::get('/register', [SuryaUserController::class, 'showRegisterForm']);
Route::post('/register', [SuryaUserController::class, 'register']);
Route::get('/logout', [SuryaUserController::class, 'logout']);


// Route untuk halaman items
Route::get('/items', [SuryaItemController::class, 'index']);

// Route untuk halaman rentals
Route::get('/rentals', [SuryaRentalController::class, 'create']);
Route::post('/rentals', [SuryaRentalController::class, 'store']);


// Route::resource('rentals', SuryaRentalController::class);

