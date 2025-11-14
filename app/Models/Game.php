<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // ENABLE MASS ASSIGNMENT
    protected $fillable = ['title','platform','playtime','coverimage_path', 'user_id', 'started_on', 'completed_on'];
    
}
