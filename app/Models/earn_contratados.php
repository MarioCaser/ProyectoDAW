<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class earn_contratados extends Model
{
    use HasFactory;

    protected $table = 'earn_contratados';

    protected $fillable = [
        'user_id',
        'id_producto_earn',
        'fecha_fin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function earnDisponible()
    {
        return $this->belongsTo(EarnDisponible::class, 'id_producto_earn');
    }
}
