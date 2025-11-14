<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    // MASS CREATE
    protected $fillable = ['game_id', 'user_id', 'goal_text', 'completed'];
}
