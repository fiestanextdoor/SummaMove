<?php
namespace App\Http\Controllers;
use App\Models\Performance;

class PerformanceController extends Controller {

    public function index() {
        $performances = Performance::with('user', 'exercise')->orderBy('start_time', 'desc')->get();
        return view('performances.index', compact('performances'));
    }
}
