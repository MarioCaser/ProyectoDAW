<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
        Schema::create('earn_disponible', function (Blueprint $table) {
            $table->id();
            $table->string('currency', 8);
            $table->decimal('APR', 8, 4);
            $table->string('duracion');
            $table->boolean('disponible')->default(true);
            $table->decimal('cantidad_disponible', 20, 8);
            $table->decimal('maximo_usuario', 20, 8);
            $table->decimal('minimo_usuario', 20, 8);
            // $table->decimal('cantidad_bloqueada', 20, 8);
            $table->timestamps();
            
            
            $table->foreign('currency')->references('symbol')->on('coins');
        });
    }
    public function down(): void
    {
    }
};