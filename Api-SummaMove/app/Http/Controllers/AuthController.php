<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gebruiker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:gebruikers',
            'password' => 'required|min:6',
        ]);

        $gebruiker = Gebruiker::create([
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
        ]);

        $token = auth()->login($gebruiker);

        return response()->json([
            'message' => 'Registratie gelukt',
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Ongeldige gegevens'], 401);
        }

        return response()->json([
            'message' => 'Login gelukt',
            'token' => $token
        ]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Uitgelogd']);
    }
}
