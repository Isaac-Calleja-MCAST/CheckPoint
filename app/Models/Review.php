<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // ENABLE MASS ASSIGNMENT
    protected $fillable = ['game_id', 'user_id', 'rating', 'review_text'];
    
}
