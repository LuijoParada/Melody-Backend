<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicios'; // Especifica el nombre de la tabla

    protected $fillable = [
        'pregunta',
        'opciones',
        'respuesta_correcta',
        'nivel',
    ];

    public $timestamps = true; // Para gestionar created_at y updated_at
}
