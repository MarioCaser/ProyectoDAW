<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class historial_ordenes extends Model
    {
        protected $table = 'historial_ordenes';
        protected $primaryKey = 'id';
        public $timestamps = true;

        protected $fillable = [
            'id_orden',
            'id_usuario',
            'monedaPagar',
            'cantidadPagar',
            'monedaRecibir',
            'cantidadRecibir',
            'precio',
            'monedaComisión',
            'cantidadComisión',
            'tipoOrden',
            'resultado'
        ];

        // Relación con la tabla "users"
        public function usuario()
        {
            return $this->belongsTo(User::class, 'id_usuario');
        }
    }
?>