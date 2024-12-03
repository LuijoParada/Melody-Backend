<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partituras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('users'); // Relación con usuarios
            $table->string('nombre_pdf')->nullable(); // Nombre del archivo PDF
            $table->string('ruta_pdf')->nullable(); // Ruta del archivo PDF
            $table->string('nombre_audio')->nullable(); // Nombre del archivo de audio
            $table->string('ruta_audio')->nullable(); // Ruta del archivo de audio
            $table->timestamp('fecha_generacion')->useCurrent(); // Fecha de generación
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
