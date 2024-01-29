<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transacciones_fallidas extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'moneda1',
        'moneda2',
        'cantidad_pagar',
        'tipo',
        'motivo',
    ];
}
