<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class earn_disponible extends Model
{
    use HasFactory;

    protected $table = 'earn_disponible';

    protected $fillable = [
        'currency',
        'APR',
        'duracion',
        'disponible',
        'cantidad_disponible',
        'maximo_usuario',
        'minimo_usuario',
        'cantidad_bloqueada'
    ];

    protected $casts = [
        'APR' => 'decimal:8',
        'disponible' => 'boolean',
        'cantidad_disponible' => 'decimal:20',
        'maximo_usuario' => 'decimal:20',
        'minimo_usuario' => 'decimal:20',
        // 'cantidad_bloqueada' => 'decimal:20'
    ];

    public function coin()
    {
        return $this->belongsTo(Coin::class, 'currency', 'symbol');
    }
}