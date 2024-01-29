<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vistaContratadosDisponibles extends Model
{
    use HasFactory;

    protected $table = 'earn_view';

    // public function obtenerDatos(){
    //     return DB::table($this->table)->get();
    // }
}