<?php

namespace App\Http\Controllers;

use App\Models\Prestatie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestatieController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Prestatie::where('user_id', $user->id);

        // Optioneel: sorteren
        if ($request->has('sort')) {
            if ($request->sort == 'datum') {
                $query->orderBy('datum', 'desc');
            } elseif ($request->sort == 'oefening') {
                $query->orderBy('oefening_id');
            }
        }

        $prestaties = $query->get();

        return view('prestaties.index', compact('prestaties'));
    }
}

