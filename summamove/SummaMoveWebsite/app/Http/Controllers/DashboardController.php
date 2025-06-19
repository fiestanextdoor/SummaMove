<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Performance;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard', [
            'user_count' => User::count(),
            'exercise_count' => Exercise::count(),
            'performance_count' => Performance::count(),
        ]);
    }
}
