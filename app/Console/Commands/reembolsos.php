<?php

namespace App\Console\Commands;

use App\Models\vistaContratadosDisponibles;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\saldo_spot;
use App\Models\earn_contratados;
use Illuminate\Support\Facades\Log;

class reembolsos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reembolsos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cuando ha pasado la cantidad de días que el usuario tiene contratado un producto, se le devuelve la cantidad que depositó';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Log::info('Comenzando la tarea reembolsos.');
        // $earnContratados = earn_contratados::with('earn_disponible')->get();
        // return view('earn_contratados.index', compact('earnContratados'));

        // foreach ($filas as $fila) {
        //     echo $fila->nombre;
        // }

        $registros = vistaContratadosDisponibles::all();;

        foreach ($registros as $registro) {
            // Acceder a los campos del registro

            Log::info('Entrando en el bucle foreach de reembolsos');
            
            $user_id = $registro->user_id;
            $currency = $registro->currency;
            // $APR = $registro->APR;
            $cantidad = $registro->cantidad;
            $id_producto = $registro->id_producto_earn;


            $fin = Carbon::createFromFormat('Y-m-d', $registro->fecha_fin, 'UTC');
            $fechaActual = Carbon::now('UTC');

            Log::info('diferencia de tiempo entre fechas: ' . (-1) * $fin->diffInDays($fechaActual, false));
            $diferenciaFechas = $fin->diffInDays($fechaActual, false) * (-1);
            if ( $diferenciaFechas < 0) {
                Log::info('Se reembolsa al usuario la cantidad que suscribió');

                // La fecha de fin es posterior o igual a la fecha actual
                
                $saldo = saldo_spot::firstOrCreate(
                    ['user_id' => $user_id, 'currency' => $currency],
                    ['balance' => 0.0, 'saldo_bloqueado' => 0.0]
                );

                //al usuario le reembolsamos el saldo
                Log::info('Cantidad a reembolsar: ' . $cantidad);
                $saldo->balance += $cantidad;
                $saldo->save();

                //id del producto contratado
                Log::info('id del producto contratado: ' . $id_producto);


                //eliminamos el producto contratado que tiene el usuario
                $contratado = Earn_contratados::where('id_producto_earn', $id_producto)->first();
                Log::info('earn contratado: ' . $contratado);
                $contratado->delete();

            }
            else if($diferenciaFechas >= 0){
                Log::info('Aún no ha llegado la fecha de reembolso');
            }
            else{
                Log::info('error');
            }   
        }
    }
}