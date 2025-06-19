<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/dashboard'));
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/gebruikers', [App\Http\Controllers\GebruikerController::class, 'index']);
Route::get('/oefeningen', [App\Http\Controllers\OefeningController::class, 'index']);
Route::get('/prestaties', [App\Http\Controllers\PrestatieController::class, 'index']);

