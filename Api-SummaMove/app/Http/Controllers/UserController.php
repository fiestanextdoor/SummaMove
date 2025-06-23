<?php

namespace App\Http\Controllers;

use App\Models\Gebruiker;  // of welk model je gebruikt voor de gebruikerslijst
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Haal alle gebruikers op uit de 'gebruikers' tabel (via het model Gebruiker)
        $gebruikers = Gebruiker::all();

        // Return een view (bijvoorbeeld resources/views/gebruikers/index.blade.php)
        return view('gebruikers.index', compact('gebruikers'));

        // Of als je een API JSON response wil:
        // return response()->json($gebruikers);
    }
}
