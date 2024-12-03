<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConvertionController;
use App\Models\User;
use App\Http\Controllers\EjercicioController;

Route::get('/ejercicio/{tipo}/{nivel}', [EjercicioController::class, 'show']);


// Rutas públicas (registro y login)
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
//estas rutas deberian estar protegidas por el middleware de autenticacion
Route::get('/user', [AuthController::class, 'getUser']);

Route::middleware('auth:sanctum')->group(function () {
   // Route::get('/user', [AuthController::class, 'getUser']); // Obtener usuario autenticado
    Route::post('/auth/logout', [AuthController::class, 'logoutUser']); // Logout
});
// Ruta para convertir un archivo de audio a midi
Route::post('/audio/convert', [ConvertionController::class, 'convertAudioToMidi']);
// Ruta para guardar un archivo de audio y de partitura
Route::post('/audio/favorite', [ConvertionController::class, 'saveToFavorites']);

Route::get('/favorites/{userId}', [ConvertionController::class, 'getFavorites']);
// crear una ruta que redirija si no hay una ruta que coincida
Route::fallback(function(){return response()->json([
    'message' => 'Page Not Found.',
    'error' => '404'
]);
});