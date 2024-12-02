<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progreso', function (Blueprint $table) {
            $table->id('id_progreso');
            $table->foreignId('id_usuario')->constrained('users'); // Relación con users
            $table->foreignId('id_ejercicio')->constrained('ejercicios'); // Relación con ejercicios
            $table->boolean('completado');
            $table->timestamp('fecha_completado')->nullable();
            $table->string('resultado');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progreso');
    }
};
