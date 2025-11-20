<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;

class GoalController extends Controller
{
    // Show all goals
    public function index() {
        $goals = Goal::all();
        return view('goals.index', compact('goals'));
    }

    // Show form to create a new goal
    public function create() {
        return view('goals.create');
    }

    // Show a specific goal
    public function show($id) {
        $goal = Goal::find($id);
        return view('goals.show', compact('goal'));
    }
}
