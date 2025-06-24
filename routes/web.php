<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuryaRentalController;
use App\Http\Controllers\SuryaItemController;

Route::get('/', function () {
    return view('landing');
});

// Route::get('/items', function () {
//     return view('items');
// });
Route::get('/items', [SuryaItemController::class, 'index']);


// Route::get('/rentals', function () {
//     return view('rentals');
// });
Route::get('/rentals', [SuryaRentalController::class, 'create']);
