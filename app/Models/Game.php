<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    // RELATIONSHIPS
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function guides()
    {
        return $this->hasMany(Guide::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    // ENABLE MASS ASSIGNMENT
    protected $fillable = ['title', 'platform', 'playtime', 'coverimage_path', 'user_id', 'started_on', 'completed_on','release_year'];

}
