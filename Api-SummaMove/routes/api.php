<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserInlogController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/api/login', [UserInlogController::class, 'login']);
Route::post('/api/register', [AuthController::class, 'register']);