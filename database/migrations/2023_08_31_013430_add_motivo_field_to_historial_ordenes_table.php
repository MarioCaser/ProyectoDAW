<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('historial_ordenes', function (Blueprint $table) {
            $table->string('motivo')->nullable()->default('');
        });
    }

    public function down()
    {
        Schema::table('historial_ordenes', function (Blueprint $table) {
            $table->dropColumn('motivo');
        });
    }
};
