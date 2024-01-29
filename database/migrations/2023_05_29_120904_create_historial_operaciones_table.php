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
        Schema::create('historial_operaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_orden')->unique();
            $table->unsignedBigInteger('id_usuario');

            // se vuelve a poner la misma información que en la tabla "órdenes abiertas" porque de
            // esa tabla se irán borrando los datos debido al alto número de consultas que se van a hacer a esa tabla
            $table->string('monedaPagar', 10); // Se establece un máximo de 10 caracteres
            $table->decimal('cantidadPagar', 22, 8);

            $table->string('monedaRecibir', 10);
            $table->decimal('cantidadRecibir', 22, 8);

            $table->string('monedaComisión', 10);
            $table->decimal('cantidadComisión', 22, 8);

            $table->decimal('precio', 22, 8);

            $table->string('tipo', 50); // Se establece un máximo de 10 caracteres
            
            $table->foreign('id_orden')->references('id_orden')->on('historial_ordenes');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_operaciones');
    }
};
