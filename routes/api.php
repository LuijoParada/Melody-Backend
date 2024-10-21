<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Models\User;

// Rutas públicas (registro y login)
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
// crear una ruta que redirija si no hay una ruta que coincida
Route::fallback(function(){return response()->json([
        'message' => 'Page Not Found.',
        'error' => '404'
    ]);
});

// Rutas protegidas (requieren autenticación)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/auth/logout', [AuthController::class, 'logoutUser']);  // Ruta para logout protegida
});

// Ruta para convertir un archivo de audio a midi
Route::post('/audio/convert', [AudioController::class, 'convertAudioToMidi']);

// Ruta para guardar un archivo de partitura
Route::post('/audio/save', [AudioController::class, 'saveSheetMusic']);
