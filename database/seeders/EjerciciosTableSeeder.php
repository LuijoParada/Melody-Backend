<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjerciciosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ejercicios')->insert([
            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Do Re Mi Fa Sol La Si Do',
                'opciones' => json_encode([
                    ['imagen' => '/N1E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N1E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N1E1.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N1E1.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N1E1.2.png',
                'nivel' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Puedes añadir más ejercicios aquí
        ]);
    }
}
