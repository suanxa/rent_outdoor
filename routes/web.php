<?php

use App\Http\Controllers\SuryaRentalController;
use App\Http\Controllers\SuryaItemController;
use App\Http\Controllers\SuryaUserController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');


//Admin
Route::get('/admin-dashboard', function () {
    return view('admin.adminDashboard');
})->name('admin.adminDashboard');

//ADMIN Validasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/admin/customers', [SuryaUserController::class, 'adminIndex']);
Route::get('/admin/items', [SuryaItemController::class, 'adminIndex']);
Route::get('/admin/rentals', [SuryaRentalController::class, 'adminIndex']);
//CRUD Rental
// Route::get('/admin/rentals', [SuryaRentalController::class, 'index']);
Route::get('/admin/rentals/search', [SuryaRentalController::class, 'search']);
Route::put('/admin/rentals/{id}', [SuryaRentalController::class, 'update']);
Route::delete('/admin/rentals/{id}', [SuryaRentalController::class, 'destroy']);
//CRUD Item
Route::get('/admin/items/create', [SuryaItemController::class, 'create']); // tampil form tambah
Route::post('/admin/items', [SuryaItemController::class, 'store']); // simpan item
Route::get('/admin/items/{id}/edit', [SuryaItemController::class, 'edit']); // edit item
Route::put('/admin/items/{id}', [SuryaItemController::class, 'update']); // update item
Route::delete('/admin/items/{id}', [SuryaItemController::class, 'destroy']); // hapus item



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

