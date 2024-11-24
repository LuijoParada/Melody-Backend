<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;

class EjercicioController extends Controller
{
    public function show($nivel, $ejercicio)
    {
        $ejercicio = Ejercicio::where('nivel', $nivel)->find($ejercicio);
        if ($ejercicio) {
            return response()->json($ejercicio);
        } else {
            return response()->json(['error' => 'Ejercicio no encontrado'], 404);
        }
    }
}
