<?php
namespace App\Http\Controllers;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller {

    public function index() {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    public function create() {
        return view('exercises.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'description_nl'=>'required|string',
            'description_en'=>'required|string',
        ]);
        Exercise::create($data);
        return redirect()->route('exercises.index')->with('success', 'Exercise created');
    }

    public function edit(Exercise $exercise) {
        return view('exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise) {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'description_nl'=>'required|string',
            'description_en'=>'required|string',
        ]);
        $exercise->update($data);
        return redirect()->route('exercises.index')->with('success', 'Exercise updated');
    }

    public function destroy(Exercise $exercise) {
        $exercise->delete();
        return redirect()->route('exercises.index')->with('success', 'Exercise deleted');
    }
}
