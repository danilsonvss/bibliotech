<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $generos = [
            ['nome' => 'Ficção'],
            ['nome' => 'Romance'],
            ['nome' => 'Fantasia'],
            ['nome' => 'Aventura'],
            ['nome' => 'Mistério'],
            ['nome' => 'Suspense'],
            ['nome' => 'Terror'],
            ['nome' => 'Ficção científica'],
            ['nome' => 'Drama'],
            ['nome' => 'Policial'],
            ['nome' => 'Thriller psicológico'],
            ['nome' => 'Distopia'],
            ['nome' => 'Épico'],
            ['nome' => 'Histórico'],
            ['nome' => 'Biografia'],
            ['nome' => 'Autobiografia'],
            ['nome' => 'Comédia'],
            ['nome' => 'Infantil'],
            ['nome' => 'Jovem adulto'],
            ['nome' => 'Realismo mágico'],
            ['nome' => 'Crônica'],
            ['nome' => 'Poesia'],
            ['nome' => 'Ensaio'],
            ['nome' => 'Mitologia'],
            ['nome' => 'Filosófico'],
            ['nome' => 'Espiritualidade']
        ];

        Genero::insert($generos);
    }
}
