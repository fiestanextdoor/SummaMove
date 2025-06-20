<?php

namespace App\Http\Controllers;

use App\Models\Oefening;
use Illuminate\Http\Request;

class OefeningController extends Controller
{
    // Toon lijst oefeningen (voor ingelogde gebruiker)
    public function index()
    {
        $oefeningen = Oefening::all();
        return view('oefeningen.index', compact('oefeningen'));
    }

    // Detail van 1 oefening
    public function show($id)
    {
        $oefening = Oefening::findOrFail($id);
        return view('oefeningen.show', compact('oefening'));
    }
}

