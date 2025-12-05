<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;

class GoalController extends Controller
{
    // Show all goals
    public function index(Request $request)
    {
        // All allowed sort fields
        $sortable = [
            'game_title',
            'game_platform',
            'goal_text',
            'completed',
            'created_at',
            'updated_at',
        ];

        // Which field to sort by?
        $sort = $request->get('sort', 'updated_at');
        if (!in_array($sort, $sortable)) {
            $sort = 'updated_at';
        }

        // Which direction?
        $direction = $request->get('direction', 'desc');
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        // Base query
        $goals = Goal::with('game');

        // Handle joins for game fields
        if ($sort === 'game_title') {
            $goals = $goals->join('games', 'games.id', '=', 'goals.game_id')
                ->orderBy('games.title', $direction)
                ->select('goals.*');
        } elseif ($sort === 'game_platform') {
            $goals = $goals->join('games', 'games.id', '=', 'goals.game_id')
                ->orderBy('games.platform', $direction)
                ->select('goals.*');
        } else {
            $goals = $goals->orderBy("goals.$sort", $direction);
        }

        $goals = $goals->get();

        return view('goals.index', compact('goals', 'sortable', 'sort', 'direction'));
    }
    


    // Show form to create a new goal
    public function create()
    {
        return view('goals.create');
    }

    // Show a specific goal
    public function show($id)
    {
        $goal = Goal::find($id);
        return view('goals.show', compact('goal'));
    }
}
