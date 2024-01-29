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
    DB::statement('CREATE VIEW saldo_spot_users_view AS
        SELECT
            users.id,
            users.email,
            users.id_rol,
            saldo_spot.currency,
            saldo_spot.balance,
            saldo_spot.saldo_bloqueado
        FROM users
        JOIN saldo_spot ON users.id = saldo_spot.user_id');
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS saldo_spot_users_view');
    }    
};
