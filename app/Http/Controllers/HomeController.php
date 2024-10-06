<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $query = Movie::orderByDesc('id');
        $moviesTop = null;

        // 1movie 2series
        $type = request('type');
        if ($type === 'film') {
            $query->where('type', 1);
            $moviesTop = Movie::where('type', 1)->inRandomOrder()->limit(10)->get();
        } elseif ($type === 'serie') {
            $query->where('type', 2);
            $moviesTop = Movie::where('type', 2)->inRandomOrder()->limit(10)->get();
        } else {
            $moviesTop = Movie::inRandomOrder()->limit(10)->get();
        }
        $movies = $query->paginate(15);

        return view('home', compact('movies', 'moviesTop'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = Movie::where('title', 'like', '%'.$query.'%')
            ->orWhere('synopsis', 'like', '%'.$query.'%')
            ->orderByDesc('id')->paginate(15);
        return view('home', compact('movies'));
    }

    public function film(Movie $movie)
    {
        return view('film', compact('movie'));
    }

    // Eliminar una vez actualizado la base de datos
    public function updatemovie()
    {
        $moviesOld = DB::table('cine_pelicula')->get();
        foreach ($moviesOld as $value) {
            // Fecha de publicación
            $release_date = "{$value->fechapublicacion}-01-01";
            
            // Generar genres_json
            $genresOld = DB::table('cine_peliculacategoria')->where('idcine_pelicula', $value->id)->get();
            $genreJson = [];
            $genreIds = [];
            foreach ($genresOld as $item) {
                $genre = Genre::find($item->idcine_categoria);
                if ($genre) {
                    $genreJson[] = [
                        'id' => $genre->id,
                        'name' => $genre->name
                    ];
                    $genreIds[] = $genre->id;
                }
            }

            $movie = Movie::create([
                'title' => $value->nombre,
                'synopsis' => $value->descripcion,
                'url' => $value->urlvideo,
                'trailer' => $value->urlvideotrailer,
                'release_date' => $release_date,
                'type' => $value->idcine_tipo,
                'genres_json' => json_encode($genreJson),
            ]);

            // Relación muchos a muchos
            $movie->genres()->attach($genreIds);
        }
        DB::table('cine_pelicula')->truncate();
        DB::table('cine_peliculacategoria')->truncate();
        dd('update perfect');
    }
}
