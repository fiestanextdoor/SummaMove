<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OefeningController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/gebruikers', [DashboardController::class, 'gebruikers'])->name('dashboard.gebruikers');
    Route::get('/dashboard/prestaties', [DashboardController::class, 'prestaties'])->name('dashboard.prestaties');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('oefeningen', OefeningController::class)->except(['show']);
    });

    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');

});
