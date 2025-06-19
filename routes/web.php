<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::name('profile.')->group(function () {
            Route::get('profile', [ProfileController::class, 'edit'])->name('edit');
            Route::post('update-profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
            Route::post('update-credential', [ProfileController::class, 'updateCredentials'])->name('updateCredentials');
            Route::delete('profile', [ProfileController::class, 'destroy'])->name('destroy');
        });
    });
});

require __DIR__ . '/auth.php';
