<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener los parámetros de búsqueda
        $title = request()->query('search_title');
        $release = request()->query('search_release');
        $type = request()->query('search_type');

        // Consulta base de Movie
        $query = Movie::query();

        // Filtrar por título
        if ($title) {
            $query->where('title', 'like', "%{$title}%");
        }

        // Filtrar por fecha de publicacion
        if ($release) {
            $query->whereYear('release_date', $release);
        }

        // Filtrar por tipo
        if ($type) {
            $query->where('type', $type);
        }

        // Obtener los resultados con paginación
        $movies = $query->orderByDesc('id')->paginate(20);

        return view('backoffice.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('backoffice.movie.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        // Guarda la imagen en la carpeta 'movies'
        if (request()->hasFile('poster')) {
            $path = request()->file('poster')->store('movies', 'public');
        }

        // Fecha de publicación
        $year = request('release_date');
        $release_date = "{$year}-01-01";

        // Recibir genres en string
        $genres = explode(',', request('genre'));

        // Generar genres_json
        $genreJson = [];
        foreach ($genres as $key) {
            $genre = Genre::find($key);
            if ($genre) {
                $genreJson[] = [
                    'id' => $genre->id,
                    'name' => $genre->name
                ];
            }
        }

        $movie = Movie::create([
            'title' => request('title'),
            'synopsis' => request('synopsis'),
            'url' => request('url'),
            'trailer' => request('trailer'),
            'release_date' => $release_date,
            'poster' => $path,
            'type' => request('type'),
            'genres_json' => json_encode($genreJson),
        ]);

        // Relación muchos a muchos
        $movie->genres()->attach($genres);

        return redirect()->route('movie.index')->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genresMovie = [];
        foreach ($movie->genres as $value) {
            $genresMovie[] = $value->id;
        }
        $genres = Genre::all();
        return view('backoffice.movie.edit', compact(
            'movie',
            'genres',
            'genresMovie',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        // Guarda la imagen en la carpeta 'movies'
        if (request()->hasFile('poster')) {
            // Eliminar el póster anterior
            if ($movie->poster) {
                Storage::disk('public')->delete($movie->poster);
            }
            // Subir el nuevo póster
            $path = request()->file('poster')->store('movies', 'public');
            $movie->poster = $path;
        }

        // Fecha de publicación
        $year = request('release_date');
        $release_date = "{$year}-01-01";

        // Recibir genres en string
        $genres = explode(',', request('genre'));

        // Generar genres_json
        $genreJson = [];
        foreach ($genres as $key) {
            $genre = Genre::find($key);
            if ($genre) {
                $genreJson[] = [
                    'id' => $genre->id,
                    'name' => $genre->name
                ];
            }
        }

        $movie->update([
            'title' => request('title'),
            'synopsis' => request('synopsis'),
            'url' => request('url'),
            'trailer' => request('trailer'),
            'release_date' => $release_date,
            'genres_json' => json_encode($genreJson),
        ]);

        // Relación muchos a muchos
        $movie->genres()->sync($genres);

        return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->poster) {
            Storage::disk('public')->delete($movie->poster);
        }
        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Movie deleted successfully.');
    }
}
