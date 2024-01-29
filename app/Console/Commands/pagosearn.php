<?php

namespace App\Console\Commands;

use App\Models\vistaContratadosDisponibles;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\saldo_spot;
use App\Models\Earn_contratados;
use Illuminate\Support\Facades\Log;

class pagosearn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pagosearn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Log::info('Comenzando la tarea pagosearn.');
        // $earnContratados = earn_contratados::with('earn_disponible')->get();
        // return view('earn_contratados.index', compact('earnContratados'));

        // foreach ($filas as $fila) {
        //     echo $fila->nombre;
        // }

        $registros = vistaContratadosDisponibles::all();;

        foreach ($registros as $registro) {
            // Acceder a los campos del registro

            Log::info('Entrando en el bucle foreach');
            
            $user_id = $registro->user_id;
            $currency = $registro->currency;
            $APR = $registro->APR;
            $cantidad = $registro->cantidad;
            $id_producto = $registro->id_producto_earn;


            $fin = Carbon::createFromFormat('Y-m-d', $registro->fecha_fin, 'UTC');
            $fechaActual = Carbon::now('UTC');

            Log::info('diferencia de tiempo entre fechas: ' . (-1) * $fin->diffInDays($fechaActual, false));
            $diferenciaFechas = $fin->diffInDays($fechaActual, false) * (-1);
            if ( $diferenciaFechas >= 0) {
                Log::info('Entrando en el if del foreach');
                // La fecha de fin es posterior o igual a la fecha actual
                $cantidadPagar = $cantidad * $APR / (365 * 100);
                
                $saldo = saldo_spot::firstOrCreate(
                    ['user_id' => $user_id, 'currency' => $currency],
                    ['balance' => 0.0, 'saldo_bloqueado' => 0.0]
                );
                Log::info('Cantidad a pagar: ' . $cantidad);
                $saldo->balance += $cantidadPagar;
                $saldo->save();
            }
            else if($diferenciaFechas < 0){

                Log::info('Entrando en el else if del foreach');

                // //si la fecha es anterior a hoy se elimina el producto contratado
                // $earn_contratado = Earn_contratados::where('id_producto_earn', $id_producto)->first();


                // if ($earn_contratado) {
                //     $earn_contratado->delete();
                //     Log::info("Fila eliminada correctamente.");
                // } else {
                //     Log::info("No se encontró la fila con el id indicado.");
                // }
            }
            else{
                Log::info('error');
            }   
        }
    }
}