<?php

namespace App\Http\Controllers;

use App\Models\Oefening;
use Illuminate\Http\Request;

class OefeningController extends Controller
{
    public function index()
    {
        $oefeningen = Oefening::all();
        return view('oefeningen.index', compact('oefeningen'));
    }

    public function create()
    {
        return view('oefeningen.create');
    }

    public function store(Request $request)
    {
        // Valideer en maak nieuwe oefening aan
        $request->validate([
            'naam' => 'required|string|max:255',
            // voeg meer validatie toe indien nodig
        ]);

        Oefening::create($request->all());

        return redirect()->route('oefeningen.index')->with('success', 'Oefening toegevoegd!');
    }

    public function show(Oefening $oefening)
    {
        return view('oefeningen.show', compact('oefening'));
    }

    public function edit(Oefening $oefening)
    {
        return view('oefeningen.edit', compact('oefening'));
    }

    public function update(Request $request, Oefening $oefening)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
        ]);

        $oefening->update($request->all());

        return redirect()->route('oefeningen.index')->with('success', 'Oefening bijgewerkt!');
    }

    public function destroy(Oefening $oefening)
    {
        $oefening->delete();
        return redirect()->route('oefeningen.index')->with('success', 'Oefening verwijderd!');
    }
}
