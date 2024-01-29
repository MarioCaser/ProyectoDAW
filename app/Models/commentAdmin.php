<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentAdmin extends Model
{
    use HasFactory;

    protected $table = 'comments'; // Nombre de la tabla

    protected $fillable = [
        'user_id',
        'content',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
