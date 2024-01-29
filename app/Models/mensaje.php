<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mensaje extends Model
{
    protected $table = 'mensajes';

    protected $fillable = [
        'id_envia',
        'id_recibe',
        'id_usuario',
        'leido' => 'boolean',
        'mensaje',
    ];

    public function envia()
    {
        return $this->belongsTo(User::class, 'id_envia');
    }

    public function recibe()
    {
        return $this->belongsTo(User::class, 'id_recibe');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function save(array $options = [])
    {
        $rules = [
            'mensaje' => ['required', 'max:1255'], // Ejemplo de regla de validación para la columna 'mensaje'
            // Agrega otras reglas de validación según tus necesidades
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($this->attributes, $rules);

        if ($validator->fails()) {
            // Manejar los errores de validación aquí
            // Puedes lanzar una excepción, mostrar mensajes de error, etc.
        }

        parent::save($options);
    }
    
}