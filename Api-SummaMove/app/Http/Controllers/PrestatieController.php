<?php

namespace App\Http\Controllers;

use App\Models\Prestatie;
use App\Models\User;
use App\Models\Oefening;
use Illuminate\Http\Request;

class PrestatieController extends Controller
{
    public function index()
    {
        $prestaties = Prestatie::with(['gebruiker', 'oefening'])->get();

        return view('prestaties.index', compact('prestaties'));
    }

    public function create()
    {
        $gebruikers = User::all();
        $oefeningen = Oefening::all();
        return view('prestaties.create', compact('gebruikers', 'oefeningen'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:gebruikers,id',
            'oefening_id' => 'required|exists:oefeningen,id',
            'score' => 'required|integer',
        ]);

        $prestatie = Prestatie::create($validated);

        return redirect()->back()->with('success', 'Prestatie toegevoegd!');
    }

    public function edit(Prestatie $prestatie)
    {
        $gebruikers = User::all();
        $oefeningen = Oefening::all();
        return view('prestaties.edit', compact('prestatie', 'gebruikers', 'oefeningen'));
    }

    public function update(Request $request, Prestatie $prestatie)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'oefening_id' => 'required|exists:oefeningen,id',
            'score' => 'required|integer|min:0',
        ]);

        $prestatie->update($data);

        return redirect()->route('prestaties.index')->with('success', 'Prestatie bijgewerkt.');
    }

    public function destroy(Prestatie $prestatie)
    {
        $prestatie->delete();
        return redirect()->route('prestaties.index')->with('success', 'Prestatie verwijderd.');
    }
}
