<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BookingController;


Route::get('/', function () {
    return view('welcome');
});

 

Route::post('/book/{trip}', [BookingController::class, 'store'])->name('bookings.store')->middleware('auth');


Route::get('/trips', [App\Http\Controllers\TripPublicController::class, 'index'])->name('trips.index');

Route::delete('/trips/{trip}', [TripController::class, 'destroy'])->name('trips.destroy');


Route::post('/trips', [App\Http\Controllers\DashboardController::class, 'store'])->name('trips.store');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/trips/{trip}/edit', [DashboardController::class, 'edit'])->name('trips.edit');
Route::put('/trips/{trip}', [DashboardController::class, 'update'])->name('trips.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
