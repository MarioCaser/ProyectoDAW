<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coins extends Model
{
    use HasFactory;

    protected $primaryKey = 'symbol';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'symbol',
        'logo',
        'type',
        'disponible',
        'descripcion',
    ];
}
