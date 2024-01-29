<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldo_spot extends Model
{
    use HasFactory;
    protected $table = 'saldo_spot';

    protected $fillable = [
        'user_id',
        'currency',
        'balance',
        'saldo_bloqueado'
    ];

    protected $casts = [
        'balance' => 'decimal:8',
        'saldo_bloqueado' => 'decimal:8',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}