<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;

class GuideController extends Controller
{
    // Show all guides
    public function index() {
        $guides = Guide::all();
        return view('guides.index', compact('guides'));
    }

    // Show form to create a new guide
    public function create() {
        return view('guides.create');
    }

    // Show a specific guide
    public function show($id) {
        $guide = Guide::find($id);
        return view('guides.show', compact('guide'));
    }
}
