<?php

use App\Http\Controllers\SuryaRentalController;
use App\Http\Controllers\SuryaItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Route untuk halaman items
Route::get('/items', [SuryaItemController::class, 'index']);

// Route untuk halaman rentals
Route::get('/rentals', [SuryaRentalController::class, 'create']);
Route::post('/rentals', [SuryaRentalController::class, 'store']);


// Route::resource('rentals', SuryaRentalController::class);

