<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\TherapistController;
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
    })->name('assessment.result');

});

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/customers', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])
            ->name('customers.index');

        Route::put('/customers/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'update'])
            ->name('customers.update');

        Route::get('/therapists', [TherapistController::class, 'index'])
            ->name('therapists.index');

        Route::get('/therapists/{therapist}', [TherapistController::class, 'show'])
            ->name('therapists.show');

        Route::put('/therapists/{id}', [TherapistController::class, 'update'])
            ->name('therapists.update');

        Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
        Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admins.update');

        Route::get('/assessment-details', [\App\Http\Controllers\Admin\AssessmentDetailController::class, 'index'])
            ->name('assessment-details.index');

        Route::post('/assessments/{assessment}/update-review',
            [\App\Http\Controllers\Admin\AssessmentDetailController::class, 'updateReview'])
            ->name('assessments.updateReview');

        Route::get('/assign-therapist', [\App\Http\Controllers\Admin\AssignTherapistController::class, 'index'])->name('assign.therapist.index');

        Route::post('/assign-therapist/store', [\App\Http\Controllers\Admin\AssignTherapistController::class, 'store'])
            ->name('assign.therapist.store');

        Route::delete('/assign-therapist/{id}', [\App\Http\Controllers\Admin\AssignTherapistController::class, 'destroy'])
            ->name('assign.therapist.delete');

        Route::get('/therapist/{id}/availability',
            [\App\Http\Controllers\Admin\AssignTherapistController::class,'availability']
        )->name('therapist.availability');

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
