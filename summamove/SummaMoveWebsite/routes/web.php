<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\PerformanceController;

Route::get('/', function() { return redirect()->route('dashboard'); });
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('exercises', ExerciseController::class)->except(['show']);
    Route::resource('performances', PerformanceController::class)->only(['index']);
});