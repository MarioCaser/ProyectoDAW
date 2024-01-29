<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\earn_disponible;
use Illuminate\Support\Facades\Auth;
use App\Models\saldo_spot;
use App\Models\earn_contratados;
use App\Models\historial_earn;
use App\Models\HistorialEarn;
use App\Models\EarnDisponible;

class EarnController extends Controller
{
    public function index(Request $request){

        $hayUsuario = false;
        $saldos = null;

        if (auth()->check()) {
            $hayUsuario = true;
            $usuario = auth()->user();
            $saldos = $usuario->saldos->pluck('balance', 'currency');
        }
        $monedas = earn_disponible::distinct('currency')->pluck('currency');

        $agrupadas = [];
        foreach($monedas as $moneda){
            $agrupadas[count($agrupadas)] = earn_disponible::where('currency', $moneda)->get();
        }
        
        return view('earn',['agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);
    }

    public function suscribir(Request $request){

        $hayUsuario = false;
        $saldos = null;
        //si ningún usuario ha iniciado sesión, se le manda al apartado de iniciar sesión
        if (!auth()->check()) {
            return redirect('/login');
        }
        else {
            $hayUsuario = true;
            $usuario = auth()->user();
            $saldos = $usuario->saldos->pluck('balance', 'currency');
            $user_id = Auth::id();
        }
        $monedas = earn_disponible::distinct('currency')->pluck('currency');
        $agrupadas = [];
        foreach($monedas as $moneda){
            $agrupadas[count($agrupadas)] = earn_disponible::where('currency', $moneda)->get();
        }

        $cantidad = null;
        $producto = null;

        if ($request->has('id_cantidad_oculta')) {
            $cantidad = $request->input('id_cantidad_oculta');
        } else {
            return view('earn',['error'=>"No se ha recibido la cantidad a suscribir",'agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);
        }

        if ($request->has('id_producto_oculto')) {
            $producto = $request->input('id_producto_oculto');
        } else {
            return view('earn',['error'=>"No se ha recibido el producto al que te quieres suscribir",'agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);
        }
        
        
        // Busca la fila con el ID correspondiente en la tabla 'earn_disponible'
        $earnDisponible = earn_disponible::find($producto);

        // Verifica si se encontró la fila correspondiente al ID
        if (!$earnDisponible) {
            // Si no se encontró, devuelve una respuesta de error o realiza alguna otra acción
            //return response()->json(['message' => 'La fila correspondiente al ID no fue encontrada'], 404);
            return view('earn',['error'=>"el producto no está disponible",'agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);
        }

        //cantidad que el usuario quiere suscribir
        $cantidadNumero = $cantidad;


        //si en la variable cantidad no han enviado un número correcto
        if (!is_numeric($cantidadNumero) || $cantidadNumero <= 0) {
            // Si no es un número o es menor o igual a 0, realiza alguna acción
            return view('earn', ['error' => "No has introducido un número válido",'agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);
        }


        //ahora vamos a encontrar el valor máximo que el usuario puede suscribir
        $maximoUsuario = $earnDisponible->maximo_usuario;
        $maximoNumero = $maximoUsuario;
        $cantidad_disponible = $earnDisponible->cantidad_disponible;

        // $bloqueado = $earnDisponible->cantidad_bloqueada;
        // $bloqueadoNum = $bloqueado;

        // $cantidad_disponible -= $bloqueadoNum;

        $maximo = $maximoNumero;
        if($cantidad_disponible < $maximoNumero)
            $maximo = $cantidad_disponible;
        
        
        // $maximo = $maximo - $bloqueado;

        // return view('pruebasEarn',["cantidad"=>$cantidad,"maximo"=>$maximo]);

        // comprobamos que la cantidad que el usuario quiere suscribir es inferior al máximo y que ambos números son correctos
        if($cantidadNumero > $maximo || $maximo <= 0)
            return view('earn',['error'=>"La cantidad que intentas suscribir es superior al límite máximo",'agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);

        // return view('pruebasEarn',["cantidad"=>$cantidad,"maximo"=>$maximo]);

        
        //comprobamos que la cantidad no es inferior al mínimo
        $minimo = $earnDisponible->minimo_usuario;
        if($cantidadNumero < $minimo)
            return view('earn',['error'=>"La cantidad que intentas suscribir es inferior al límite mínimo",'agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);
        
        //bloquear la cantidad que se quiere suscribir del producto disponible y del saldo del usuario
        // $bloqueado = $bloqueado + $cantidadNumero;
        // $earnDisponible->cantidad_bloqueada = $bloqueado;
        // $earnDisponible->save();

        // $saldo->saldo_bloqueado = $saldo->saldo_bloqueado + $cantidadNumero;
        // $saldo->save();
        

        $moneda = $earnDisponible->currency;
        $saldo = saldo_spot::where('user_id', $user_id)->where('currency', $moneda)->first();

        // $bloqueado = $saldo->saldo_bloqueado;
        $balance = $saldo->balance;
        // $disponible_usuario = $balance - $bloqueado;
        $disponible_usuario = $balance;

        // comprobamos que el usuario tiene suficiente saldo como para pagar la cantidad que quiere suscribir
        // if($balance > 0 && $bloqueado >= 0 && $balance > $bloqueado && $disponible_usuario >= $cantidadNumero){
        if($balance > 0  && $disponible_usuario >= $cantidadNumero){
            
            $balance = $balance - $cantidadNumero;
            $saldo->balance = $balance;

            $earnDisponible->cantidad_disponible = $earnDisponible->cantidad_disponible - $cantidadNumero;

            //calcular la fecha de finalización
            
            //fecha utc
            // Obtener la hora actual en UTC
            $hora_actual = gmdate('H:i');

            // Obtener la fecha actual en UTC
            $fecha_actual = gmdate('Y-m-d');

            // Definir la cantidad de días a agregar
            $cantidad_dias = ($hora_actual === '00:00') ? $earnDisponible->duracion : ($earnDisponible->duracion + 1);

            // Agregar la cantidad de días a la fecha actual
            $nueva_fecha = date('Y-m-d H:i', strtotime($fecha_actual . ' + ' . $cantidad_dias . ' days'));

            // Imprimir la nueva fecha
            // echo 'La nueva fecha es: ' . $nueva_fecha;

            $earnContratado = new earn_contratados();
            $earnContratado->user_id = $user_id;
            $earnContratado->id_producto_earn = $producto;
            $earnContratado->fecha_fin = $nueva_fecha;
            $earnContratado->cantidad = $cantidadNumero;
            $earnContratado->save();

            $saldo->save();
            $earnDisponible->save();


            $nuevaFila = new historial_earn;
            $nuevaFila->id_producto = $producto;
            $nuevaFila->user_id = $user_id; // ID del usuario relacionado
            $nuevaFila->cantidad = $cantidadNumero;
            $nuevaFila->accion = 'prestar';
            $nuevaFila->save();


            // return view('pruebasEarn',[
            //     "maximo"=>$maximo,
            //     "agrupadas" => $agrupadas,
            //     "saldo"=>$balance,
            //     "cantidad"=>$cantidadNumero,
            //     "bloqueado"=>$saldo->saldo_bloqueado,
            //     "resultado"=>"suscripción completada",
            //     "disponible"=>$disponible_usuario]);

            return view('earn', ['error' => "Suscripción realizada correctamente",'agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);
        }
        else
        return view('earn', ['error' => "Suscripción no realizada",'agrupadas'=>$agrupadas,'hayUsuario' => $hayUsuario,"saldos"=>$saldos]);

        
    }

    public function historial_productos_contratados(Request $request){

        $hayUsuario = false;
        $saldos = null;

        if (auth()->check()) {
            $hayUsuario = true;
            $usuario = auth()->user();
            $saldos = $usuario->saldos->pluck('balance', 'currency');
        }
        


        $combinacion = historial_earn::join('earn_disponible', 'historial_earn.id_producto', '=', 'earn_disponible.id')
        ->select('historial_earn.*', 'earn_disponible.currency', 'earn_disponible.APR', 'earn_disponible.duracion')
        ->where('historial_earn.user_id', auth()->user())
        ->get();
        
        return view('earn',['datos'=>$combinacion]);
    }
}