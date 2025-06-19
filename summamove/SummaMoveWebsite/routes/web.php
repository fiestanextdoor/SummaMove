<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;


// Redirect root naar dashboard
Route::get('/test', function () {
    return 'Test';
});

// Dashboard route (Controller gebruiken)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// CRUD routes voor gebruikers, oefeningen en prestaties, beveiligd met auth middleware
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('exercises', ExerciseController::class)->except(['show']);
    Route::resource('performances', PerformanceController::class)->only(['index']);
});

// Auth routes (login, logout, registratie etc)
Auth::routes();

// Redirect root naar dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
