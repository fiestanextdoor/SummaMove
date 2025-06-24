<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OefeningController;
use App\Http\Controllers\PrestatieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserInlogController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserLoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


// Root redirect naar dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard route, alleen toegankelijk als ingelogd
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Oefeningen routes (auth verplicht)
Route::middleware('auth')->prefix('oefeningen')->name('oefeningen.')->group(function () {
    Route::get('/', [OefeningController::class, 'index'])->name('index');
    Route::get('/create', [OefeningController::class, 'create'])->name('create');
    Route::post('/', [OefeningController::class, 'store'])->name('store');
    Route::get('/{oefening}/edit', [OefeningController::class, 'edit'])->name('edit');
    Route::put('/{oefening}', [OefeningController::class, 'update'])->name('update');
    Route::delete('/{oefening}', [OefeningController::class, 'destroy'])->name('destroy');
});

// Prestaties routes (auth verplicht)
Route::middleware('auth')->prefix('prestaties')->name('prestaties.')->group(function () {
    Route::get('/', [PrestatieController::class, 'index'])->name('index');
    Route::get('/create', [PrestatieController::class, 'create'])->name('create');
    Route::post('/', [PrestatieController::class, 'store'])->name('store');
    Route::get('/{prestatie}/edit', [PrestatieController::class, 'edit'])->name('edit');
    Route::put('/{prestatie}', [PrestatieController::class, 'update'])->name('update');
    Route::delete('/{prestatie}', [PrestatieController::class, 'destroy'])->name('destroy');
});


Route::post('/api/login', [UserInlogController::class, 'login']);
Route::post('/api/register', [UserRegisterController::class, 'register']);

// Gebruikerslijst routes (auth verplicht)
Route::middleware('auth')->prefix('gebruikers')->name('gebruikers.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
});

// Registratie routes (alleen voor gasten)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

Route::post('/login', [UserLoginController::class, 'login']);


// Auth routes (login, logout, wachtwoord reset, etc.)
Auth::routes();
