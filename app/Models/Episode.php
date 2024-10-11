<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'season_number',
        'episode_number',
        'title',
        'description',
        'url',
        'movie_id',
    ];
}
