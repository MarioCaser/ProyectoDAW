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
        // Schema::create('earn_view', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        $query = <<<EOT
        CREATE VIEW earn_view AS
        SELECT ec.*, ed.APR, ed.currency
        FROM earn_contratados ec
        JOIN earn_disponible ed ON ec.id_producto_earn = ed.id;
        EOT;

        Schema::getConnection()->statement($query);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earn_view');
    }
};
