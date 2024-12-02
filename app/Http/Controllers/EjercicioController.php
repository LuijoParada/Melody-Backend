<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;

class EjercicioController extends Controller
{
    public function show($tipo, $nivel)
    {
        // Ajustar el nivel según el tipo de ejercicio
        if ($tipo === 'ritmico') {
            $nivelReal = $nivel + 5;
        } elseif ($tipo === 'melodico') {
            $nivelReal = $nivel + 10;
        } else {
            $nivelReal = $nivel;
        }

        // Encontrar los ejercicios del nivel ajustado
        $ejercicios = Ejercicio::where('nivel', $nivelReal)->get();
        if ($ejercicios->isEmpty()) {
            return response()->json(['error' => 'Ejercicios no encontrados'], 404);
        } else {
            return response()->json($ejercicios);
        }
    }
}
