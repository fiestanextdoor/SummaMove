<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:gebruikers',
            'password' => 'required|min:6',
        ]);

        $hashedPassword = Hash::make($request->password);

        DB::table('gebruikers')->insert([
            'username' => $request->username,
            'password' => $hashedPassword,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Registratie gelukt']);
    }

    public function login(Request $request)
    {
        $user = DB::table('gebruikers')->where('username', $request->username)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Gebruiker niet gevonden'], 404);
        }

        if (Hash::check($request->password, $user->password)) {
            return response()->json(['success' => true, 'message' => 'Login gelukt', 'user' => $user]);
        } else {
            return response()->json(['success' => false, 'message' => 'Wachtwoord incorrect'], 401);
        }
    }
}
