<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cars/search', [CarController::class,'search'])->name('search');
Route::resource('cars', CarController::class)->only('show', 'create');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('cars', CarController::class)->except('show')->middleware('verified');
    Route::get('/cars/{car}/edit/car_images', [CarController::class,'editCarImages'])->name('car_images')->middleware('verified');
    Route::put('/cars/{car}/edit/car_images/update', [CarController::class, 'updateCarImages'])->name('updateCarImages')->middleware('verified');
    Route::post('/cars/{car}/create/car_images', [CarController::class,'carImageCreate'])->name('carImageCreate')->middleware('verified');
    Route::get('/favourite_cars', [CarController::class,'favourite_cars'])->name('favourite_cars')->middleware('verified');
    Route::delete('/favourite_cars/{car}/delete', [CarController::class, 'deleteFavouriteCar'])->name('deleteFavouriteCar')->middleware('verified');
    Route::post('/favourite_cars/{car}/create', [CarController::class, 'createFavouriteCar'])->name('createFavouriteCar')->middleware('verified');
});



require __DIR__.'/auth.php';
