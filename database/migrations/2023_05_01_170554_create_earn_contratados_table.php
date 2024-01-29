<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('earn_contratados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->unsignedBigInteger('id_producto_earn');
            $table->decimal('cantidad', 22, 8); // Se define el campo cantidad como decimal con 22 dígitos en total y 8 decimales
            $table->date('fecha_fin');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_producto_earn')->references('id')->on('earn_disponible');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('earn_contratados');
    }
};