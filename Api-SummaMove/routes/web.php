<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OefeningController;
use App\Http\Controllers\PrestatieController;
use App\Http\Controllers\GebruikersController; // Aangepast naar GebruikersController
use Illuminate\Support\Facades\Auth;

// Root redirect naar dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Oefeningen routes (met naam prefix 'oefeningen.')
Route::middleware('auth')->prefix('oefeningen')->name('oefeningen.')->group(function () {
    Route::get('/', [OefeningController::class, 'index'])->name('index');
    Route::get('/create', [OefeningController::class, 'create'])->name('create');
    Route::post('/', [OefeningController::class, 'store'])->name('store');
    Route::get('/{oefening}/edit', [OefeningController::class, 'edit'])->name('edit');
    Route::put('/{oefening}', [OefeningController::class, 'update'])->name('update');
    Route::delete('/{oefening}', [OefeningController::class, 'destroy'])->name('destroy');
});

// Prestaties routes (naam prefix 'prestaties.')
Route::middleware('auth')->prefix('prestaties')->name('prestaties.')->group(function () {
    Route::get('/', [PrestatieController::class, 'index'])->name('index');
    Route::get('/create', [PrestatieController::class, 'create'])->name('create');
    Route::post('/', [PrestatieController::class, 'store'])->name('store');
    Route::get('/{prestatie}/edit', [PrestatieController::class, 'edit'])->name('edit');
    Route::put('/{prestatie}', [PrestatieController::class, 'update'])->name('update');
    Route::delete('/{prestatie}', [PrestatieController::class, 'destroy'])->name('destroy');
});

// Gebruikerslijst via GebruikersController
Route::middleware('auth')->prefix('gebruikers')->name('gebruikers.')->group(function () {
    Route::get('/', [GebruikersController::class, 'index'])->name('index');
    // Indien nodig kun je hier andere gebruikers routes toevoegen
    // bv. create, store, edit, update, destroy
});

// Auth routes
Auth::routes();
