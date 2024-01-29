<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('historial_earn', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto'); // Campo para el ID de earn_disponible
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->decimal('cantidad', 22, 8)->nullable();//cantidad que ha suscrito el usuario
            //aquí se guardará si se está prestando dinero o si se está reembolsando
            $table->string('accion');
            $table->timestamps();

            $table->foreign('id_producto')->references('id')->on('earn_disponible'); // Relación con earn_disponible
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_earn');
    }
};
?>