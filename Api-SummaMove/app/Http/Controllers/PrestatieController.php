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
        $prestaties = Prestatie::all();
        return view('prestaties.index', compact('prestaties'));
    }

    public function create()
{
    $gebruikers = \App\Models\Gebruiker::all();
    $oefeningen = \App\Models\Oefening::all();

    return view('prestaties.create', compact('gebruikers', 'oefeningen'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'username' => 'required|exists:gebruikers,username',
        'oefening_id' => 'required|exists:oefeningen,id',
        'datum' => 'required|date',
        'starttijd' => 'required|date_format:H:i',
        'eindtijd' => 'required|date_format:H:i|after:starttijd',
        'aantal' => 'required|integer|min:1',
    ]);

    $gebruiker = \App\Models\Gebruiker::where('username', $validated['username'])->first();

    \App\Models\Prestatie::create([
        'gebruiker_id' => $gebruiker->id,
        'oefening_id' => $validated['oefening_id'],
        'datum' => $validated['datum'],
        'starttijd' => $validated['starttijd'],
        'eindtijd' => $validated['eindtijd'],
        'aantal' => $validated['aantal'],
    ]);

    return redirect()->route('prestaties.index')->with('success', 'Prestatie succesvol toegevoegd.');
}



    public function edit($id)
    {
        $prestatie = Prestatie::findOrFail($id);
        $gebruikers = Gebruiker::all();
        $oefeningen = Oefening::all();

        return view('prestaties.edit', compact('prestatie', 'gebruikers', 'oefeningen'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id' => 'required|exists:gebruikers,id',
            'oefening_id' => 'required|exists:oefeningen,id',
            'aantal' => 'required|integer|min:0',
        ]);

        $prestatie = Prestatie::findOrFail($id);
        $prestatie->update($validated);

        return redirect()->route('prestaties.index')->with('success', 'Prestatie succesvol aangepast.');
    }

    public function destroy($id)
    {
        $prestatie = Prestatie::findOrFail($id);
        $prestatie->delete();

        return redirect()->route('prestaties.index')->with('success', 'Prestatie succesvol verwijderd.');
    }
}
