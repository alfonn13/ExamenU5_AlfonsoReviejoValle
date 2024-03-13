<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('personajes')->insert([

            ['nombre' => 'Legolas', 'clase' => 'Arquero', 'habilidad' => 'Tiro certero', 'imagen' => 'legolas.jpg', 'raza_id' => 1, 'user_id' => 1],
            ['nombre' => 'Gimli', 'clase' => 'Guerrero', 'habilidad' => 'Fuerza bruta', 'imagen' => 'gimli.jpg', 'raza_id' => 2, 'user_id' => 2],
            ['nombre' => 'Aragorn', 'clase' => 'Guerrero', 'habilidad' => 'Herencia real', 'imagen' => 'aragorn.jpg', 'raza_id' => 3, 'user_id' => 3],
            ['nombre' => 'Thrall', 'clase' => 'Chaman', 'habilidad' => 'Elemental', 'imagen' => 'thrall.jpg', 'raza_id' => 4, 'user_id' => 3],
        ]);
    }
}
