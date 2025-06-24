<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserInlogController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('gebruikers')->where('username', $username)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Gebruiker niet gevonden']);
        }

        if (Hash::check($password, $user->password)) {
            return response()->json(['success' => true, 'message' => 'Login gelukt']);
        } else {
            return response()->json(['success' => false, 'message' => 'Wachtwoord incorrect']);
        }
    }
}
