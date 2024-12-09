<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable(); // Añadido: campo para el rol
            $table->string('numberOfFavorites')->nullable(); // Añadido: campo para el número de favoritos
            $table->string('profile_photo_path')->nullable(); // Añadido: campo para la foto de perfil
            $table->string('status')->nullable(); 
            $table->string('country')->nullable(); // Añadido: campo para el país
            $table->string('about')->nullable(); // Añadido: campo para la biografía
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints(); // Deshabilitar claves foráneas
        Schema::dropIfExists('sessions'); // Primero elimina las tablas dependientes
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users'); // Luego elimina la tabla 'users'
        Schema::enableForeignKeyConstraints(); // Habilitar claves foráneas nuevamente
    }
};
