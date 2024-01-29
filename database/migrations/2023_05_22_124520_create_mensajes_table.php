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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_envia'); // ID del usuario que envía el mensaje
            $table->unsignedBigInteger('id_recibe'); // ID del usuario de soporte al que se envía el mensaje
            $table->unsignedBigInteger('id_usuario'); // ID del usuario que envía el mensaje
            $table->text('mensaje');
            $table->boolean('leido')->default(false); // Nueva columna "leido"
            $table->timestamps();
            
            // Definir relaciones con otras tablas si es necesario
            $table->foreign('id_envia')->references('id')->on('users');
            $table->foreign('id_recibe')->references('id')->on('users');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
