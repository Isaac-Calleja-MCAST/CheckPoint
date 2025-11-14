<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    // ENABLE MASS CREATE

    protected $fillable = ['game_id', 'user_id','bookmark_text'];
}

