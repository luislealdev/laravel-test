<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Primero, vamos a asegurarnos de que tengamos algunos actores y películas
        // Si ya tienes datos, este seeder los relacionará
        
        // Obtener los primeros actores y películas disponibles
        $actors = \App\Models\Actor::take(5)->get();
        $films = \App\Models\Film::take(5)->get();
        
        if ($actors->count() > 0 && $films->count() > 0) {
            // Crear algunas relaciones de ejemplo
            foreach ($actors as $actor) {
                // Cada actor aparece en 2-3 películas aleatorias
                $randomFilms = $films->random(rand(1, min(3, $films->count())));
                
                foreach ($randomFilms as $film) {
                    // Evitar duplicados
                    \DB::table('film_actor')->insertOrIgnore([
                        'actor_id' => $actor->actor_id,
                        'film_id' => $film->film_id,
                        'last_update' => now()
                    ]);
                }
            }
        }
    }
}
