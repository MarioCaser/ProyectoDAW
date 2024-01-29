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
        Schema::create('transacciones_fallidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id'); // ID de la transacción original
            $table->string('moneda1');
            $table->string('moneda2');
            $table->decimal('cantidad_pagar', 18, 8);
            $table->enum('tipo', ['compra', 'venta']); // Compra o Venta
            $table->string('motivo')->nullable()->default('');; // Motivo de la transacción fallida
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones_fallidas');
    }
};
