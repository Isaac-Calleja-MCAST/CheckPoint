<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;

class GuideController extends Controller
{
    // Show all guides
    public function index(Request $request)
    {   // All allowed sort fields
        $sortable = [
            'game_title',
            'title',
            'created_at',
            'updated_at',
        ];
        // Which field to sort by?
        $sort = $request->get('sort', 'game_title');
        if (!in_array($sort, $sortable)) {
            $sort = 'game_title';
        }
        // Which direction?
        $direction = $request->get('direction', 'asc');
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc';
        }
        // Base query
        $guides = Guide::with('game');

        // Handle joins for game fields
        if ($sort === 'game_title') {
            $guides = $guides->join('games', 'games.id', '=', 'guides.game_id')
                ->orderBy('games.title', $direction)
                ->select('guides.*');
        } else {
            $guides = $guides->orderBy("guides.$sort", $direction);
        }
        // Execute query
        $guides = $guides->get();
        // Return view
        return view('guides.index', compact('guides', 'sortable', 'sort', 'direction'));
    }



    // Show form to create a new guide
    public function create()
    {
        return view('guides.create');
    }

    // Show a specific guide
    public function show($id)
    {
        $guide = Guide::find($id);
        return view('guides.show', compact('guide'));
    }
}
