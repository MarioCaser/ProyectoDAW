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
        Schema::create('historial_ordenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_orden')->unique();
            $table->unsignedBigInteger('id_usuario');

            // se vuelve a poner la misma información que en la tabla "órdenes abiertas" porque de
            // esa tabla se irán borrando los datos debido al alto número de consultas que se van a hacer a esa tabla
            $table->string('monedaPagar', 10); // Se establece un máximo de 10 caracteres
            $table->decimal('cantidadPagar', 22, 8);

            $table->string('monedaRecibir', 10);
            $table->decimal('cantidadRecibir', 22, 8);

            $table->decimal('precio', 14, 8); //no es imprescindible porque depende de otras dos columnas, pero está bien para cuando mire la tabla o para cuando haga consultas

            $table->string('monedaComisión', 10);
            $table->decimal('cantidadComisión', 22, 8);

            $table->string('tipoOrden', 50);
            $table->string('resultado', 20);
            
            // $table->foreign('id_orden')->references('id')->on('ordenes_abiertas');
            $table->foreign('id_usuario')->references('id')->on('users');

            //aquí se añade la fecha en la que se creó y la fecha en la que se llevó a cabo
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
