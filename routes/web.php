<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/car/search', [CarController::class,'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('car', CarController::class);
    Route::post('api/fetch-models', [CarController::class, 'fetchModel']);
    Route::post('api/fetch-cities', [CarController::class, 'fetchCity']);
    Route::get('/car/{id}/edit/car_images', [CarController::class,'editCarImages'])->name('car_images');
    Route::put('/car/{id}/edit/car_images/update', [CarController::class, 'updateCarImages'])->name('updateCarImages');
    Route::post('/car/{id}/create/car_images', [CarController::class,'carImageCreate'])->name('carImageCreate');
});

require __DIR__.'/auth.php';
