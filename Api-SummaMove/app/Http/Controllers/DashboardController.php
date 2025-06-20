<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oefening;
use App\Models\Prestatie;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function gebruikers()
    {
        $gebruikers = User::all();
        return view('dashboard.gebruikers', compact('gebruikers'));
    }

    public function oefeningen()
    {
        $oefeningen = Oefening::all();
        return view('dashboard.oefeningen', compact('oefeningen'));
    }

    public function prestaties()
    {
        $prestaties = Prestatie::with(['gebruiker', 'oefening'])->get();
        return view('dashboard.prestaties', compact('prestaties'));
    }
}

