<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjerciciosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ejercicios')->insert([
            // Ejercicios Tonales (Nivel 1)
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
            [
                'pregunta' => '¿Qué nota sigue a Sol en la escala diatónica?',
                'opciones' => json_encode([
                    ['texto' => 'La'],
                    ['texto' => 'Fa'],
                    ['texto' => 'Si'],
                    ['texto' => 'Mi']
                ]),
                'respuesta_correcta' => 'La',
                'nivel' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Ejercicios Rítmicos (Nivel 6)
            [
                'pregunta' => 'Selecciona el patrón rítmico correcto para una corchea y dos semicorcheas',
                'opciones' => json_encode([
                    ['imagen' => '/N6E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N6E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N6E1.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N6E1.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N6E1.3.png',
                'nivel' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => '¿Cuál es el valor de un tresillo de corcheas?',
                'opciones' => json_encode([
                    ['texto' => 'Un tiempo'],
                    ['texto' => 'Dos tiempos'],
                    ['texto' => 'Medio tiempo'],
                    ['texto' => 'Tres tiempos']
                ]),
                'respuesta_correcta' => 'Un tiempo',
                'nivel' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Ejercicios Melódicos (Nivel 11)
            [
                'pregunta' => 'Elige la melodía correcta para la secuencia: Do Mi Sol',
                'opciones' => json_encode([
                    ['imagen' => '/N11E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N11E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N11E1.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N11E1.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N11E1.3.png',
                'nivel' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => '¿Cuál es la nota que sigue a Fa en esta secuencia melódica: Do Re Mi Fa?',
                'opciones' => json_encode([
                    ['texto' => 'Sol'],
                    ['texto' => 'La'],
                    ['texto' => 'Si'],
                    ['texto' => 'Mi']
                ]),
                'respuesta_correcta' => 'Sol',
                'nivel' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
