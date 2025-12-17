<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TherapistLoginController;
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

Route::get('/therapist/login', [TherapistLoginController::class, 'showLoginForm'])
    ->name('therapist.login');

Route::post('/therapist/login', [TherapistLoginController::class, 'login'])
    ->name('therapist.login.submit');

Route::middleware(['auth', 'therapist'])->group(function () {
    Route::get('/therapist/dashboard', fn () => view('therapist.therapist-dashboard.index'))
        ->name('therapist.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/booking/{therapist}', [\App\Http\Controllers\BookingController::class, 'confirm'])
        ->name('booking.confirm')
        ->middleware('auth');
});

Route::get('/assessments', function () {
    return view('assessment.index');
})->name('assessments.index');

Route::middleware(['auth'])->group(function () {
    Route::get('assessment', [AssessmentController::class, 'create'])->name('assessment.create');
    Route::post('assessment', [AssessmentController::class, 'store'])->name('assessment.store');

    Route::get('/assessment/result', function () {
        return view('assessment.result');
    })->name('assessment.result')->middleware('auth');

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
