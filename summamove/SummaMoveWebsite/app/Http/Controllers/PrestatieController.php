<?php

namespace App\Http\Controllers;

use App\Models\Prestatie;
use App\Models\Gebruiker;
use App\Models\Oefening;
use Illuminate\Http\Request;

class PrestatieController extends Controller
{
    public function index()
    {
        return view('prestaties.index', [
            'prestaties' => Prestatie::with(['gebruiker', 'oefening'])->get()
        ]);
    }

    public function create()
    {
        return view('prestaties.create', [
            'gebruikers' => Gebruiker::all(),
            'oefeningen' => Oefening::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'gebruiker_id' => 'required|exists:gebruikers,id',
            'oefening_id' => 'required|exists:oefeningen,id',
            'aantal' => 'required|integer',
            'datum' => 'required|date',
            'starttijd' => 'required',
            'eindtijd' => 'required'
        ]);

        Prestatie::create($data);

        return redirect()->route('prestaties.index')->with('success', 'Prestatie toegevoegd.');
    }

    public function edit(Prestatie $prestatie)
    {
        return view('prestaties.edit', [
            'prestatie' => $prestatie,
            'gebruikers' => Gebruiker::all(),
            'oefeningen' => Oefening::all()
        ]);
    }

    public function update(Request $request, Prestatie $prestatie)
    {
        $data = $request->validate([
            'gebruiker_id' => 'required|exists:gebruikers,id',
            'oefening_id' => 'required|exists:oefeningen,id',
            'aantal' => 'required|integer',
            'datum' => 'required|date',
            'starttijd' => 'required',
            'eindtijd' => 'required'
        ]);

        $prestatie->update($data);

        return redirect()->route('prestaties.index')->with('success', 'Prestatie bijgewerkt.');
    }

    public function destroy(Prestatie $prestatie)
    {
        $prestatie->delete();

        return back()->with('success', 'Prestatie verwijderd.');
    }
}
