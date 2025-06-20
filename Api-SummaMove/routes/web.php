<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/gebruikers', [DashboardController::class, 'gebruikers'])->name('dashboard.gebruikers');
    Route::get('/dashboard/oefeningen', [DashboardController::class, 'oefeningen'])->name('dashboard.oefeningen');
    Route::get('/dashboard/prestaties', [DashboardController::class, 'prestaties'])->name('dashboard.prestaties');
});

// ✅ Voeg deze toe voor logout
Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');
