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
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
        ]);

        Oefening::create($validated);

        return redirect()->route('oefeningen.index')->with('success', 'Oefening aangemaakt');
    }

    public function edit(Oefening $oefening)
    {
        return view('oefeningen.edit', compact('oefening'));
    }

    public function update(Request $request, Oefening $oefening)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
        ]);

        $oefening->update($validated);

        return redirect()->route('oefeningen.index')->with('success', 'Oefening bijgewerkt');
    }

    public function destroy(Oefening $oefening)
    {
        $oefening->delete();

        return redirect()->route('oefeningen.index')->with('success', 'Oefening verwijderd!');
    }
}
