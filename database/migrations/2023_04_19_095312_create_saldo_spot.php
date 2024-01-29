<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('saldo_spot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('currency', 8);
            $table->decimal('balance', 18, 8);
            $table->decimal('saldo_bloqueado', 18, 8);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('currency')->references('symbol')->on('coins');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        // descomentar para poder eliminar la tabla
        //Schema::dropIfExists('saldo_spot');
    }
};
