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
        Schema::create('ordenes_abiertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');

            $table->string('monedaPagar', 10); // Se establece un máximo de 10 caracteres
            $table->decimal('cantidadPagar', 22, 8);

            $table->string('monedaRecibir', 10);
            //aquí no se añade la cantidad a recibir porque el precio puede variar ligeramente y la cantidad no ser exactamente la misma que la determinada en la orden

            $table->decimal('precio', 22, 8); //el precio al que el usuario solicita hacer la operación, puede terminar siendo diferente en el historial de ordenes

            $table->string('monedaComisión', 10);

            // tampoco se fija la cantidad de comision porque si el usuario determina para pagar la comisión una moneda, ésta puede variar de precio y la cantidad que se le cobraría puede variar

            $table->string('tipoOrden', 50); //orden límite, a mercado, o las que se vayan añadiendo luego

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('monedaRecibir')->references('symbol')->on('coins');
            $table->foreign('monedaComisión')->references('symbol')->on('coins');
            $table->foreign('monedaPagar')->references('symbol')->on('coins');

            //Aquí se añade la fecha en la que se creó y la fecha en la que se llevó a cabo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_abiertas');
    }
};
