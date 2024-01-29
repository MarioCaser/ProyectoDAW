<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historial_operaciones extends Model
{
    protected $table = 'historial_operaciones';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_orden',
        'id_usuario',
        'monedaPagar',
        'cantidadPagar',
        'monedaRecibir',
        'cantidadRecibir',
        'monedaComisión',
        'cantidadComisión',
        'precio',
        'rol',
    ];

    // Relación con la tabla "historial_ordenes"
    public function orden()
    {
        return $this->belongsTo(HistorialOrden::class, 'id_orden');
    }

    // Relación con la tabla "users"
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}