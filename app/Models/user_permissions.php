<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_permissions extends Model
{
    use HasFactory;

    protected $table = 'user_permissions';
    protected $primaryKey = 'id_rol';
    public $timestamps = true;

}