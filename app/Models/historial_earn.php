<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial_earn extends Model
{
    use HasFactory;

    protected $table = 'historial_earn';

    protected $fillable = [
        'id_producto',
        'user_id',
        'cantidad',
        'accion'
    ];

    public function earnDisponible()
    {
        return $this->belongsTo(EarnDisponible::class, 'id_producto');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}