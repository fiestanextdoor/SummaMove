<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\OefeningController;
use App\Http\Controllers\PrestatieController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('gebruikers', GebruikerController::class);

    Route::resource('oefeningen', OefeningController::class)->parameters([
        'oefeningen' => 'oefening',
    ]);

    Route::resource('prestaties', PrestatieController::class)->parameters([
    'prestaties' => 'prestatie',
    ]);
});
