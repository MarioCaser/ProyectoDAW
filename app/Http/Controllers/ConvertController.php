<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\saldo_spot;
use App\Models\coins;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Models\OrdenAbierta;
use App\Models\historial_ordenes;
use App\Models\historial_operaciones;
use Illuminate\Support\Facades\Redirect;

class ConvertController extends Controller{
    public function index(Request $request, $from, $to){
        $from = $request->input('from', $from);
        $to = $request->input('to', $to);

        $valid_currencies = coins::pluck('symbol');

        $preciosMonedas = $this->obtenerPreciosMonedas($valid_currencies);

        $saldos_con_precios = null;
        $hayUsuario = false;

        if (auth()->check()) {
            $usuario = auth()->user();
            $saldos = $usuario->saldos->pluck('balance', 'currency');

            $saldos_con_precios = $saldos->map(function ($saldo, $moneda) use ($preciosMonedas) {
                $precio = $preciosMonedas[$moneda];
                return [
                    'balance' => $saldo,
                    'currency' => $moneda,
                    //'price' => $precio,
                    'total' => $saldo * $precio
                ];
            });
            $hayUsuario = true;
        }

        // Validar monedas aquí también para que en caso de que el usuario escriba directamente la url, se pasen parametros validos
        if (!$valid_currencies->contains(strtolower($from)) || !$valid_currencies->contains(strtolower($to))) {
            $from = "BTC";
            $to = "USDT";

            return redirect()->route('convert.index', ['from' => $from, 'to' => $to, 'saldos' => $saldos_con_precios, 'hayUsuario' => $hayUsuario]);
        }

        //enviar también el array con las monedas disponibles

        $coins = coins::all();

        $criptoArray = [];

        foreach ($coins as $index => $coin) {
            $criptoArray[] = [
                $index,
                $coin->name,
                strtoupper($coin->symbol),
                "/images/criptologos/" . strtoupper($coin->symbol) . ".png",
                0
            ];
        }
        
        $data = [
            'from' => strtoupper($from),
            'to' => strtoupper($to),
            'saldos'=>$saldos_con_precios,
            'hayUsuario'=>$hayUsuario,
            "criptoArray"=>$criptoArray
        ];
        return view('convert', $data);
    }

    
    public function realizarConversion(Request $request){

        if (!auth()->check()) {
            return redirect("registro");
        }


        // Obtener los datos del formulario
        $monedaRecibir = strtolower($request->input('monedaRecibirHidden'));
        $monedaPagar = strtolower($request->input('monedaPagarHidden'));
        $cantidadPagar = $request->input('cantidadPagarHidden');

        //$tipoCambio = $request->input('tipoCambioHidden');

        $precio1 = $this->getPrice($monedaRecibir);
        $precio2 = $this->getPrice($monedaPagar);

        //obtengo el tipo de cambio en el servidor para que no pueda darse el caso de que algún usuario modifique el cliente
        // y nos envíe datos falsos
        $tipoCambio = $precio1 / $precio2;

        //datos para devolver en caso de que se realice todo correctamente
       
        $usuario = auth()->user();
        $saldos = $usuario->saldos->pluck('balance', 'currency');

        $valid_currencies = coins::pluck('symbol');
        $preciosMonedas = $this->obtenerPreciosMonedas($valid_currencies);

        $saldos_con_precios = $saldos->map(function ($saldo, $moneda) use ($preciosMonedas) {
            $precio = $preciosMonedas[$moneda];
            return [
                'balance' => $saldo,
                'currency' => $moneda,
                'total' => $saldo * $precio
            ];
        });

        $hayUsuario = true;

        $coins = coins::all();

        $criptoArray = [];

        foreach ($coins as $index => $coin) {
            $criptoArray[] = [
                $index,
                $coin->name,
                strtoupper($coin->symbol),
                "/images/criptologos/" . strtoupper($coin->symbol) . ".png",
                0
            ];
        }

        $data = [
            'from' => strtoupper($request->input('monedaPagarHidden')),
            'to' => strtoupper($request->input('monedaRecibirHidden')),
            'saldos'=>$saldos_con_precios,
            'hayUsuario'=>$hayUsuario,
            "criptoArray"=>$criptoArray,
            'resultado' => "Los datos introducidos son incorrectos"
        ];

        // fin en caso de que se realice correctamente

        

        // si ha habido algún problema al pasar las variables a números
        if (!is_numeric($cantidadPagar) || !is_numeric($tipoCambio)) {
            return view('convert',$data);
        }



        if (auth()->check() && !empty($monedaPagar)) {
            $user_id = Auth::id();
            $saldo = saldo_spot::where('user_id', $user_id)
                   ->where('currency', $monedaPagar)
                   ->first();

            $saldo->save();

            $balance = $saldo->balance;
            
            $disponible = $balance - $saldo->cantidad_bloqueada;

            //saldo en la moneda en la que se recibe el dinero
            $saldo2 = saldo_spot::where('user_id', $user_id)->where('currency', $monedaRecibir)->first();

            // para comprobar que el usuario tiene suficiente saldo como para pagar y que no hay datos erróneos
            if ($cantidadPagar > 0 && $tipoCambio > 0 && $balance >= $cantidadPagar && $balance >= 0 && $disponible >= 0 && $cantidadPagar > 0){
                
                if(!$saldo2){
                    $saldo2 = new saldo_spot;
                    $saldo2->user_id = $user_id;
                    $saldo2->currency = $monedaRecibir;
                    $saldo2->balance = 0;
                    $saldo2->saldo_bloqueado = 0;
                    $saldo2->save();
                }
                
                DB::beginTransaction();

                try {

                    $orden = new OrdenAbierta();
                    $orden->id_usuario = Auth::id();
                    $orden->monedaPagar = $monedaPagar;
                    $orden->cantidadPagar = $cantidadPagar;
                    $orden->monedaRecibir = $monedaRecibir;
                    $orden->precio = $tipoCambio;
                    $orden->tipoOrden = "mercado";
                    $orden->monedaComisión = "BTC";

                    $orden->save();
                    
                    DB::commit();
                    
                    return view('convert', $data);

                } catch (\Exception $e) {
                    DB::rollback();
                    
                    $saldo->save();
                    return view('convert', $data);
                }
            }
            else{
                $data = [
                    'from' => strtoupper($request->input('monedaPagarHidden')),
                    'to' => strtoupper($request->input('monedaRecibirHidden')),
                    'saldos'=>$saldos_con_precios,
                    'hayUsuario'=>$hayUsuario,
                    "criptoArray"=>$criptoArray,
                    'resultado' => "La compra no se ha realizado correctamente debido a datos erróneos"
                ];
                return view('convert', $data);
            }
        }
        
        // si no hay usuario se redirige al apartado de registrarse
        return redirect('/registro');
    }



    public function ponerOrden(Request $request){

        if (!auth()->check()) {
            return redirect("registro");
        }
        
        try {
            $cantidadPagarLimite = $request->input('cantidadPagarLimite');
            $tipoCambioLimite = $request->input('tipoCambioLimite');
            $monedaPagarLimite = strtolower($request->input('monedaPagarLimite'));
            $monedaRecibirLimite = strtolower($request->input('monedaRecibirLimite'));

            $saldo = saldo_spot::where('user_id', Auth::id())
                ->where('currency', $monedaPagarLimite)
                ->first();

            if ($saldo) {
                if (($saldo->balance - $saldo->saldo_bloqueado) >= $cantidadPagarLimite) {

                    DB::beginTransaction(); // Iniciar la transacción

                    try {
                        $saldo->saldo_bloqueado += $cantidadPagarLimite;
                        $saldo->save();

                        $orden = new OrdenAbierta();
                        $orden->id_usuario = Auth::id();
                        $orden->monedaPagar = $monedaPagarLimite;
                        $orden->cantidadPagar = $cantidadPagarLimite;
                        $orden->monedaRecibir = $monedaRecibirLimite;
                        $orden->precio = $tipoCambioLimite;
                        $orden->tipoOrden = "limite";
                        $orden->monedaComisión = "BTC";

                        $orden->save();

                        DB::commit(); // Confirmar la transacción si todo ha ido bien

                        $resultado = "Orden puesta correctamente";
                    } catch (\Exception $e) {
                        DB::rollback(); // Deshacer la transacción en caso de error
                        $resultado = "Error al poner la orden";
                    }

                } else {
                    $resultado = "No se ha podido poner la orden debido a que el saldo disponible no es suficiente";
                }
            } else {
                $resultado = "No se ha podido poner la orden debido a saldo insuficiente";
            }
            
        } catch (\Exception $e) {
            $resultado = "No se ha podido poner la orden";
        }
    
    
        $usuario = auth()->user();
        $saldos = $usuario->saldos->pluck('balance', 'currency');

        $valid_currencies = coins::pluck('symbol');
        $preciosMonedas = $this->obtenerPreciosMonedas($valid_currencies);

        $saldos_con_precios = $saldos->map(function ($saldo, $moneda) use ($preciosMonedas) {
            $precio = $preciosMonedas[$moneda];
            return [
                'balance' => $saldo,
                'currency' => $moneda,
                'total' => $saldo * $precio
            ];
        });

        $hayUsuario = true;

        $coins = coins::all();

        $criptoArray = [];

        foreach ($coins as $index => $coin) {
            $criptoArray[] = [
                $index,
                $coin->name,
                strtoupper($coin->symbol),
                "/images/criptologos/" . strtoupper($coin->symbol) . ".png",
                0
            ];
        }

        $data = [
            'from' => strtoupper($request->input('monedaPagarLimite')),
            'to' => strtoupper($request->input('monedaPagarLimite')),
            'saldos'=>$saldos_con_precios,
            'hayUsuario'=>$hayUsuario,
            "criptoArray"=>$criptoArray,
            'resultado' => $resultado
        ];
        return view('convert', $data);

    }

    public function cancelar_orden(Request $request){
        try {
            $orderID = $request->input('order_id');
    
            $ordenAbierta = OrdenAbierta::findOrFail($orderID);

            $nuevaOrdenHistorial = new historial_ordenes();

            $userID = $ordenAbierta->id_usuario;
            $currency = $ordenAbierta->monedaPagar;
            $cantidadRestar = $ordenAbierta->cantidadPagar;

            $nuevaOrdenHistorial->id_orden = $ordenAbierta->id;
            $nuevaOrdenHistorial->id_usuario = $ordenAbierta->id_usuario;
            $nuevaOrdenHistorial->monedaPagar = $ordenAbierta->monedaPagar;
            $nuevaOrdenHistorial->cantidadPagar = $ordenAbierta->cantidadPagar;
            $nuevaOrdenHistorial->monedaRecibir = $ordenAbierta->monedaRecibir;
            $nuevaOrdenHistorial->cantidadRecibir = 0;
            $nuevaOrdenHistorial->precio = 0;
            $nuevaOrdenHistorial->monedaComisión = $ordenAbierta->monedaPagar;
            $nuevaOrdenHistorial->cantidadComisión = 0;
            $nuevaOrdenHistorial->tipoOrden = "limite";
            $nuevaOrdenHistorial->resultado = "cancelada";

            $ordenAbierta->delete();
            $nuevaOrdenHistorial->save();


            try {
                // Obtén el modelo de saldo_spot correspondiente al usuario y la moneda específica
                $saldoSpot = saldo_spot::where('user_id', $userID)
                ->where('currency', $currency)
                ->first();

                if ($saldoSpot) {
                    // Resta la cantidad de saldo bloqueado deseada
                    $saldoSpot->saldo_bloqueado -= $cantidadRestar;
                    $saldoSpot->save();

                    // Saldo bloqueado actualizado correctamente
                }
            }catch (\Exception $exception) {
                // Ocurrió un error al actualizar el saldo bloqueado
                $error = "No se ha podido desbloquear el saldo";
            }

            
            $mensaje = "Se ha cancelado correctamente";
            return Redirect::route('historial_ordenes')->with('mensaje', $mensaje);
            

            // Orden eliminada correctamente
        }  catch (\Exception $exception) {
            // Ocurrió un error desconocido
            $mensaje = "Error al cancelar la orden: ";
            return Redirect::route('historial_ordenes')->with('mensaje', $mensaje);
        }
    }

    // para obtener el precio de una sola moneda al hacer la compra
    public function getPrice(string $moneda){
        $precio = null;
        if(strtolower($moneda) == "usdt"){
            $precio = 1;
        }
        if(strtolower($moneda) == "busd"){
            $precio = 1;
        }
        else{
            $moneda = strtoupper($moneda);
            $client = new Client(['base_uri' => 'https://api.binance.com/api/v3/']);
            $response = $client->request('GET', 'ticker/price', [
                'query' => ['symbol' => $moneda . 'USDT']
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            $precio = $data["price"];
        }
        return $precio;
    }



    // para obtener el precio de todas las monedas al mostrar el valor de los saldos (en euros)
    public function obtenerPreciosMonedas($valid_currencies){

        $client = new Client();

        $response = $client->request('GET', 'https://api.binance.com/api/v3/ticker/price');

        $prices = json_decode($response->getBody(), true);

        $pricesUSDT = [];
        // obtengo los precios en USDT
        // (en la mayoría de monedas no puedo comprobar el precio en euros, por lo que lo obtengo en USDT y luego lo paso a euros)
        foreach ($valid_currencies as $currency) {
            if(strtolower($currency) == "usdt")
                $pricesUSDT[$currency] = 1;
            else
                foreach ($prices as $price) {
                    if (strtolower($price['symbol']) === strtolower($currency) . 'usdt') {
                        $pricesUSDT[$currency] = $price['price'];
                        break;
                    }
                }
        }

        $precioEuroUSDT = $pricesUSDT["eur"];

        // Paso los precios en dólares a euros
        foreach ($pricesUSDT as $currency => $price) {
            if ($currency != "eur") {
                $pricesUSDT[$currency] = $price / $precioEuroUSDT;
            }
            else{
                $pricesUSDT[$currency] = 1;
            }
        }
        
        // Devuelvo los precios en euros
        return $pricesUSDT;
    }

    public function ordenes(Request $request, $datosGet = null){
        
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        else if(auth()->check()) {

            $usuarioId = auth()->user()->id;
            $ordenes = OrdenAbierta::where('id_usuario', $usuarioId)->paginate(10);

            return view('ordenes', ["ordenes" => $ordenes]);
        }
        else{
            return redirect()->route('login');
        }
    }

    public function historial_ordenes(Request $request, $datosGet = null){
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        $usuarioId = auth()->user()->id;
        $ordenes = historial_ordenes::where('id_usuario', $usuarioId)->paginate(10);
    
        return view('historial_ordenes', ["ordenes" => $ordenes]);
    }
    public function historial_operaciones(Request $request, $datosGet = null){
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        $usuarioId = auth()->user()->id;
        $ordenes = historial_ordenes::where('id_usuario', $usuarioId)->paginate(10);
    
        return view('historial_operaciones', ["ordenes" => $ordenes]);
    }

}