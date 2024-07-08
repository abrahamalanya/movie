<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'synopsis',
        'url',
        'release_date',
        'poster'
    ];

    public function genres() {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function actors() {
        return $this->belongsToMany(Actor::class);
    }

    public function favorites() {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
