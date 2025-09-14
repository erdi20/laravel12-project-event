<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UtamaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UtamaController::class, 'index'])->name('home');
Route::get('/dashboard', [UtamaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // ---
    Route::get('/detail-event/{slug}', [EventController::class, 'show']);
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    // Route::get('/search-event', [EventController::class, 'index'])->name('events.search');
    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::get('/my-registrations', [RegistrationController::class, 'history'])->name('registrations.history');
});

require __DIR__ . '/auth.php';
