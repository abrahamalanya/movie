<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Acción',
            'Animación',
            'Artes Marciales',
            'Aventura',
            'Biografía',
            'Bollywood',
            'Ciencia ficción',
            'Clásico',
            'Comedia',
            'Comedia dramática',
            'Comedia musical',
            'Concierto',
            'Crimen',
            'Cine Independiente',
            'Documental Musical',
            'Deporte',
            'Desconocido',
            'Dibujos animados',
            'Documental',
            'Drama',
            'Épico',
            'Erótico',
            'Espionaje',
            'Experimental',
            'Familia',
            'Fantasía',
            'Guerra',
            'Histórico',
            'Judicial',
            'Médico',
            'Musical',
            'Romántico',
            'Show',
            'Suspenso',
            'Terror',
            'Western',
            'Intriga',
            'Misterio',
            'Generalista',
            'Radial',
            'Noticia',
            'Arte',
            'Cultura',
            'Educativa',
            'hípica',
            'Novela',
        ];

        foreach ($genres as $value) {
            Genre::create(['name' => $value]);
        }
    }
}
