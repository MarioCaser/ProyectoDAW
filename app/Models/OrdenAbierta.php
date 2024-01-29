<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenAbierta extends Model
{
    use HasFactory;

    protected $table = 'ordenes_abiertas';

    protected $fillable = [
        'id_usuario',
        'monedaPagar',
        'cantidadPagar',
        'monedaRecibir',
        'precio',
        'monedaComisión',
        'tipoOrden',
    ];

    protected $casts = [
        'id_usuario' => 'integer',
        'cantidadPagar' => 'decimal:8', // Restringe a 8 decimales
        'precio' => 'decimal:8', // Restringe a 2 decimales
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
    // public function monedaComision()
    // {
    //     return $this->belongsTo(Coin::class, 'monedaComisión', 'symbol');
    // }

    public function monedaRecibir()
    {
        return $this->belongsTo(Coin::class, 'monedaRecibir', 'symbol');
    }

    public function monedaPagar()
    {
        return $this->belongsTo(Coin::class, 'monedaPagar', 'symbol');
    }


    // Restricciones adicionales
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Validar restricciones adicionales antes de crear el modelo
            if ($model->cantidadPagar <= 0) {
                throw new \Exception('La cantidad a pagar debe ser mayor que cero.');
            }
        });

        // static::updating(function ($model) {
        //     // Validar restricciones adicionales antes de actualizar el modelo
        //     // Para no permitir la actualización de ciertos campos
        //     throw new \Exception('No se permite la actualización de este modelo.');
        // });

        // static::deleting(function ($model) {
        //     // Validar restricciones adicionales antes de eliminar el modelo
        //     throw new \Exception('No se permite eliminar este modelo.');
        // });
    }
}