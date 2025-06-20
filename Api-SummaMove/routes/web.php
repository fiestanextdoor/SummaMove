<?php

use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/gebruikers', [DashboardController::class, 'gebruikers'])->name('dashboard.gebruikers');
    Route::get('/dashboard/oefeningen', [DashboardController::class, 'oefeningen'])->name('dashboard.oefeningen');
    Route::get('/dashboard/prestaties', [DashboardController::class, 'prestaties'])->name('dashboard.prestaties');
});

