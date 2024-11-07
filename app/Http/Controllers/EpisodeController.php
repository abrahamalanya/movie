<?php

namespace App\Http\Controllers;

use App\Http\Requests\EpisodeRequest;
use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movie = Movie::find(request('movie_id'));
        return view('backoffice.episode.create', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EpisodeRequest $request)
    {
        Episode::create([
            'season_number' => request('season_number'),
            'episode_number' => request('episode_number'),
            'title' => request('title'),
            'description' => request('description'),
            'url' => request('url'),
            'movie_id' => request('movie_id'),
        ]);

        return redirect()->route('movie.index')->with('success', 'Episode created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $movie_id)
    {
        $movie = Movie::find($movie_id);
        $episodesBySeason = Episode::where('movie_id', $movie->id)
            ->orderBy('season_number')
            ->orderBy('episode_number')
            ->get()
            ->groupBy('season_number');
        return view('backoffice.episode.show', compact(
            'movie',
            'episodesBySeason'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Episode $episode)
    {
        return view('backoffice.episode.edit', compact(
            'episode',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EpisodeRequest $request, Episode $episode)
    {
        $episode->update([
            'season_number' => request('season_number'),
            'episode_number' => request('episode_number'),
            'title' => request('title'),
            'description' => request('description'),
            'url' => request('url'),
        ]);

        return redirect()->route('episode.show', $episode->movie_id)->with('success', 'Episode updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episode $episode)
    {
        $movie_id = $episode->movie_id;
        $episode->delete();
        return redirect()->route('episode.show', $movie_id)->with('success', 'Episode deleted successfully.');
    }
}
