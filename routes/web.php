<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TherapistRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Therapist
Route::get('/join-therapist', [TherapistRegisterController::class, 'create'])->name('therapist.register');
Route::post('/join-therapist', [TherapistRegisterController::class, 'store'])->name('therapist.register.store');
Route::get('/therapist/submitted', function () {
    return view('therapist.join-therapist.submitted');
})->name('therapist.submitted');

Route::get('/therapists', [\App\Http\Controllers\TherapistsController::class, 'index'])
    ->name('therapists.index');

Route::get('/therapists/{slug}', [\App\Http\Controllers\TherapistsController::class, 'show'])
    ->name('therapists.show');

Route::middleware('auth')->group(function () {
    Route::get('/booking/{therapist}', [\App\Http\Controllers\BookingController::class, 'confirm'])
        ->name('booking.confirm')
        ->middleware('auth');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
