<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partituras', function (Blueprint $table) {
            $table->id('id_partitura');
            $table->foreignId('id_usuario')->constrained('users'); // Relación con users
            $table->string('nombre_partitura');
            $table->string('ruta_archivo');
            $table->timestamp('fecha_generacion')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partituras');
    }
};

