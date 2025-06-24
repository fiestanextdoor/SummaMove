<?php


namespace App\Http\Controllers;

use App\Models\Gebruiker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GebruikerController extends Controller
{
    public function index()
    {
        $gebruikers = Gebruiker::all();
        return view('gebruikers.index', compact('gebruikers'));
    }

    public function create()
    {
        return view('gebruikers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:gebruikers',
            'password' => 'required|min:6',
        ]);

        $data['password'] = Hash::make($data['password']);
        Gebruiker::create($data);

        return redirect()->route('gebruikers.index')->with('success', 'Gebruiker toegevoegd.');
    }

    public function edit(Gebruiker $gebruiker)
    {
        return view('gebruikers.edit', compact('gebruiker'));
    }

    public function update(Request $request, Gebruiker $gebruiker)
    {
        $data = $request->validate([
            'username' => 'required|unique:gebruikers,username,' . $gebruiker->id,
            'password' => 'nullable|min:6',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $gebruiker->update($data);

        return redirect()->route('gebruikers.index')->with('success', 'Gebruiker bijgewerkt.');
    }

    public function destroy(Gebruiker $gebruiker)
    {
        $gebruiker->delete();

        return redirect()->route('gebruikers.index')->with('success', 'Gebruiker verwijderd.');
    }
}

