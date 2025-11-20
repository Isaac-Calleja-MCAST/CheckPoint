<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    // Show all games
    public function index() {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    // Show form to create a new game
    public function create() {
        return view('games.create');
    }

    // Show details of a specific game
    public function show($id) {
        $game = Game::find($id);
        return view('games.show', compact('game'));
    }
}
