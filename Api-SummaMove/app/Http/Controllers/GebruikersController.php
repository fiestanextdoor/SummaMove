<?php

namespace App\Http\Controllers;

use App\Models\Gebruiker;

class GebruikerController extends Controller
{
    public function index()
    {
        $gebruikers = Gebruiker::all();

        return view('gebruikers.index', compact('gebruikers'));
    }
}
