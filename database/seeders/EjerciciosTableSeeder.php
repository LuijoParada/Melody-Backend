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
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Do Re Do La',
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
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Re Re Fa Si',
                'opciones' => json_encode([
                    ['imagen' => '/N1E2.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N1E2.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N1E2.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N1E2.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N1E2.2.png',
                'nivel' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Do Do Fa Mi La Mi',
                'opciones' => json_encode([
                    ['imagen' => '/N1E3.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N1E3.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N1E3.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N1E3.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N1E3.2.png',
                'nivel' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Fa Mi Re Do Mi Re Do',
                'opciones' => json_encode([
                    ['imagen' => '/N1E4.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N1E4.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N1E4.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N1E4.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N1E4.2.png',
                'nivel' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Sol Sol La Sol Re Re Do Fa',
                'opciones' => json_encode([
                    ['imagen' => '/N1E5.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N1E5.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N1E5.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N1E5.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N1E5.3.png',
                'nivel' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // EJERCICIOS NIVEL 2

            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Do Re Mi Fa Sol La Si Do',
                'opciones' => json_encode([
                    ['imagen' => '/N2E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N2E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N2E1.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N2E1.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N2E1.2.png',
                'nivel' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Re Mi Fa Sol La Si Do Re',
                'opciones' => json_encode([
                    ['imagen' => '/N2E2.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N2E2.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N2E2.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N2E2.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N2E2.2.png',
                'nivel' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Mi Fa Sol La Si Do Re Mi',
                'opciones' => json_encode([
                    ['imagen' => '/N2E3.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N2E3.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N2E3.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N2E3.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N2E3.2.png',
                'nivel' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Fa Sol La Si Do Re Mi Fa',
                'opciones' => json_encode([
                    ['imagen' => '/N2E4.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N2E4.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N2E4.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N2E4.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N2E4.2.png',
                'nivel' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la partitura correcta para la siguiente sucesión de notas: Sol La Si Do Re Mi Fa Sol',
                'opciones' => json_encode([
                    ['imagen' => '/N2E5.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N2E5.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N2E5.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N2E5.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N2E5.2.png',
                'nivel' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],

            //EJERCICIOS NIVEL 3

            [
                'pregunta' => 'Elige la armadura correspondiente a la tonalidad de Mi menor',
                'opciones' => json_encode([
                    ['imagen' => '/N3E1Re.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N3E1Mi.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N3E1Fa.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N3E1Sol.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N3E1Sol.png',
                'nivel' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la armadura correspondiente a la tonalidad de Si menor',
                'opciones' => json_encode([
                    ['imagen' => '/N3E1Re.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N3E1FaSostenido.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N3E1Mi.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N3E1Sol.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N3E1Re.png',
                'nivel' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la armadura correspondiente a la tonalidad de Do menor',
                'opciones' => json_encode([
                    ['imagen' => '/N3E1Mib.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N3E1Re.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N3E1Sol.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N3E1Lab.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N3E1Mib.png',
                'nivel' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la armadura correspondiente a la tonalidad de Fa mayor',
                'opciones' => json_encode([
                    ['imagen' => '/N3E1Mib.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N3E1Sol.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N3E1Fa.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N3E1Reb.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N3E1Fa.png',
                'nivel' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la armadura correspondiente a la tonalidad de Sol mayor',
                'opciones' => json_encode([
                    ['imagen' => '/N3E1Re.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N3E1Mib.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N3E1Sol.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N3E1Si.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N3E1Sol.png',
                'nivel' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la armadura correspondiente a la tonalidad de Do# menor',
                'opciones' => json_encode([
                    ['imagen' => '/N3E1Lab.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N3E1Sib.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N3E1Reb.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N3E1Mi.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N3E1Mi.png',
                'nivel' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Elige la armadura correspondiente a la tonalidad de Sib mayor',
                'opciones' => json_encode([
                    ['imagen' => '/N3E1Solb.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N3E1Reb.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N3E1Sib.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N3E1Fa.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N3E1Sib.png',
                'nivel' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ejercicios de acordes nivel 4 tonales

            [
                'pregunta' => '¿Cuál imagen contiene el acorde Do mayor (C)?',
                'opciones' => json_encode([
                    ['imagen' => '/N4E1C.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N4E1G.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N4E1A.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N4E1E.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N4E1C.png',
                'nivel' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => '¿Cuál imagen contiene el acorde Re menor (Dm)?',
                'opciones' => json_encode([
                    ['imagen' => '/N4E1Em.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N4E1Dm.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N4E1F.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N4E1A.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N4E1Dm.png',
                'nivel' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => '¿Cuál imagen contiene el acorde Si menor (Bm)?',
                'opciones' => json_encode([
                    ['imagen' => '/N4E1F.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N4E1D.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N4E1Bm.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N4E1Am.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N4E1Bm.png',
                'nivel' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => '¿Cuál imagen contiene el acorde La mayor (A)?',
                'opciones' => json_encode([
                    ['imagen' => '/N4E1A.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N4E1E.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N4E1Cm.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N4E1Bm.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N4E1A.png',
                'nivel' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => '¿Cuál imagen contiene el acorde Sol mayor (G)?',
                'opciones' => json_encode([
                    ['imagen' => '/N4E1Dm.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N4E1Bm.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N4E1F.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N4E1G.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N4E1G.png',
                'nivel' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => '¿Cuál imagen contiene el acorde Fa menor (Fm)?',
                'opciones' => json_encode([
                    ['imagen' => '/N4E1Em.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N4E1D.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N4E1Fm.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N4E1Gm.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N4E1Fm.png',
                'nivel' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => '¿Cuál imagen contiene el acorde Do menor (Cm)?',
                'opciones' => json_encode([
                    ['imagen' => '/N4E1Em.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N4E1Cm.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N4E1A.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N4E1F.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N4E1Cm.png',
                'nivel' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],



            // Ejercicios Rítmicos (Nivel 6) NIVEL 1 EN EL PROGRAMA
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N6E1audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N6E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N6E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N6E1.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N6E1.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N6E1.1.png',
                'nivel' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N6E2audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N6E2.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N6E2.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N6E2.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N6E2.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N6E2.1.png',
                'nivel' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N6E3audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N6E3.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N6E3.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N6E3.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N6E3.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N6E3.1.png',
                'nivel' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N6E4audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N6E4.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N6E4.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N6E4.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N6E4.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N6E4.2.png',
                'nivel' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Ejercicios Rítmicos (Nivel 7) NIVEL 2 EN EL PROGRAMA

            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N7E1audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N7E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N7E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N7E1.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N7E1.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N7E1.2.png',
                'nivel' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N7E2audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N7E2.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N7E2.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N7E2.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N7E2.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N7E2.3.png',
                'nivel' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N7E3audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N7E3.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N7E3.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N7E3.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N7E3.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N7E3.4.png',
                'nivel' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N7E4audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N7E4.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N7E4.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N7E4.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N7E4.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N7E4.3.png',
                'nivel' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Ejercicios Rítmicos (Nivel 8) NIVEL 3 EN EL PROGRAMA

            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N8E1audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N8E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N8E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N8E1.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N8E1.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N8E1.2.png',
                'nivel' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N8E2audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N8E2.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N8E2.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N8E2.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N8E2.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N8E2.3.png',
                'nivel' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N8E3audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N8E3.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N8E3.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N8E3.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N8E3.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N8E3.4.png',
                'nivel' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N8E4audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio>',
                'opciones' => json_encode([
                    ['imagen' => '/N8E4.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N8E4.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N8E4.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N8E4.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N8E4.2.png',
                'nivel' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],


            // Ejercicios progresiones acordess (Nivel 11)
            [
                'pregunta' => 'Selecciona la progresión de acordes Do La menor Mi menor Fa (C Am Em F)',
                'opciones' => json_encode([
                    ['imagen' => '/N11E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N11E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N11E1.3.png', 'texto' => 'Opción 3']
                ]),
                'respuesta_correcta' => '/N11E1.1.png',
                'nivel' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la progresión de acordes Mi menor Sol Mi menor Si menor (Em G Em Bm)',
                'opciones' => json_encode([
                    ['imagen' => '/N11E2.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N11E2.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N11E2.3.png', 'texto' => 'Opción 3']
                ]),
                'respuesta_correcta' => '/N11E2.2.png',
                'nivel' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la progresión de acordes La menor Re menor Do La menor (Am Dm C Am)',
                'opciones' => json_encode([
                    ['imagen' => '/N11E3.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N11E3.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N11E3.3.png', 'texto' => 'Opción 3']
                ]),
                'respuesta_correcta' => '/N11E3.1.png',
                'nivel' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la progresión de acordes La menor Fa Mi menor Do (Am F Em C)',
                'opciones' => json_encode([
                    ['imagen' => '/N11E4.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N11E4.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N11E4.3.png', 'texto' => 'Opción 3']
                ]),
                'respuesta_correcta' => '/N11E4.1.png',
                'nivel' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la progresión de acordes Mi menor La menor Fa sostenido menor La menor (Em Am F#m Am)',
                'opciones' => json_encode([
                    ['imagen' => '/N11E5.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N11E5.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N11E5.3.png', 'texto' => 'Opción 3']
                ]),
                'respuesta_correcta' => '/N11E5.2.png',
                'nivel' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Melodias nivel 12
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N12E1audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio></div>',
                'opciones' => json_encode([
                    ['imagen' => '/N12E1.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N12E1.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N12E1.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N12E1.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N12E1.3.png',
                'nivel' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N12E2audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio></div>',
                'opciones' => json_encode([
                    ['imagen' => '/N12E2.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N12E2.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N12E2.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N12E2.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N12E2.1.png',
                'nivel' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pregunta' => 'Selecciona la partitura que corresponde con el siguiente audio:<br><br><div style="text-align: center; margin-left: 240px; margin-top: -10px; margin-bottom: 20px;"><audio controls><source src="/N12E3audio.mp3" type="audio/mpeg">Tu navegador no soporta el elemento de audio.</audio></div>',
                'opciones' => json_encode([
                    ['imagen' => '/N12E3.1.png', 'texto' => 'Opción 1'],
                    ['imagen' => '/N12E3.2.png', 'texto' => 'Opción 2'],
                    ['imagen' => '/N12E3.3.png', 'texto' => 'Opción 3'],
                    ['imagen' => '/N12E3.4.png', 'texto' => 'Opción 4']
                ]),
                'respuesta_correcta' => '/N12E3.1.png',
                'nivel' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
