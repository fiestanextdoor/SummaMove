<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// ✅ Dashboard route toevoegen
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Andere routes (zoals users, exercises, etc.)
Route::resource('users', UserController::class);
Route::resource('exercises', ExerciseController::class);
Route::resource('performances', PerformanceController::class);
