<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\saldo_spot;
use App\Models\coins;
use GuzzleHttp\Client;
use App\Models\earn_disponible;
use App\Models\earn_contratados;


class resumenController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            // No hay una sesión iniciada, redirigir al login
            return redirect()->route('login');
        }

        // Hay una sesión iniciada, obtener el ID del usuario
        $userId = Auth::id();

        $saldos = saldo_spot::where('user_id', $userId)->get();

        // le añado un campo valor a $saldos para guardar ahí el valor en euros
        $saldos = $saldos->map(function ($saldo) {
            $saldo->valor = 0;
            return $saldo;
        });

        $valid_currencies = coins::pluck('symbol');

        $valorSaldos = $this->obtenerValorMonedas($saldos)->toArray();

        $simbolos = Coins::pluck('symbol')->toArray(); // Obtener solo los símbolos de todas las monedas 

        //ordenar de mayor valor en euros a menor valor en euros
        usort($valorSaldos, function($a, $b) {
            return $b['valor'] - $a['valor'];
        });


        // para eliminar los simbolos que ya esten en los saldos y no se muestren repetidos
        // Obtener las monedas del array de objetos
        $arrayMonedas = array_column($valorSaldos, "currency");

        // Filtrar el array de nombres de criptomonedas
        $simbolos = array_diff($simbolos, $arrayMonedas);

        return view('resumen',["valorSaldos"=>$valorSaldos,"simbolos"=>$simbolos]);
    }

    public function store(Request $request){
        
    }
    public function saldoSpot(Request $request){
        if (!Auth::check()) {
            // No hay una sesión iniciada, redirigir al login
            return redirect()->route('login');
        }

        // Hay una sesión iniciada, obtener el ID del usuario
        $userId = Auth::id();

        $saldos = saldo_spot::where('user_id', $userId)->get();

        // le añado un campo valor a $saldos para guardar ahí el valor en euros
        $saldos = $saldos->map(function ($saldo) {
            $saldo->valor = 0;
            return $saldo;
        });

        $valid_currencies = coins::pluck('symbol');

        $valorSaldos = $this->obtenerValorMonedas($saldos)->toArray();

        $simbolos = Coins::pluck('symbol')->toArray(); // Obtener solo los símbolos de todas las monedas 

        //ordenar de mayor valor en euros a menor valor en euros
        usort($valorSaldos, function($a, $b) {
            return $b['valor'] - $a['valor'];
        });


        // para eliminar los simbolos que ya esten en los saldos y no se muestren repetidos
        // Obtener las monedas del array de objetos
        $arrayMonedas = array_column($valorSaldos, "currency");

        // Filtrar el array de nombres de criptomonedas
        $simbolos = array_diff($simbolos, $arrayMonedas);

        return view('resumen_spot',["valorSaldos"=>$valorSaldos,"simbolos"=>$simbolos]);
    }

    public function resumen_earn(Request $request){
        if (!Auth::check()) {
            // No hay una sesión iniciada, redirigir al login
            return redirect()->route('login');
        }

        // Hay una sesión iniciada, obtener el ID del usuario
        $userId = Auth::id();

        
        $earnContratados = earn_contratados::join('earn_disponible', 'earn_contratados.id_producto_earn', '=', 'earn_disponible.id')
        ->select('earn_contratados.*', 'earn_disponible.currency', 'earn_disponible.APR', 'earn_disponible.duracion', 'earn_disponible.disponible', 'earn_disponible.cantidad_disponible', 'earn_disponible.maximo_usuario', 'earn_disponible.minimo_usuario') //, 'earn_disponible.cantidad_bloqueada'
        ->where('earn_contratados.user_id', $userId)
        ->get();
        

        return view('resumen_earn', compact('earnContratados'));



        // return view('resumen_spot',["valorSaldos"=>$valorSaldos,"simbolos"=>$simbolos]);
    }

    public function obtenerValorMonedas($saldosMonedas){
        $client = new Client();

        $response = $client->request('GET', 'https://api.binance.com/api/v3/ticker/price');

        $prices = json_decode($response->getBody(), true);

        $pricesUSDT = [];
        
        // obtengo los precios en USDT
        // (en la mayoría de monedas no puedo comprobar el precio en euros, por lo que lo obtengo en USDT y luego lo paso a euros)
        foreach ($saldosMonedas as $saldo) {
            if(strtolower($saldo["currency"]) == "usdt")
                $saldo["valor"] = 1;
            else
                foreach ($prices as $price) {
                    if (strtolower($price['symbol']) === strtolower($saldo["currency"]) . 'usdt') {
                        $saldo["valor"] = $price['price'];
                        break;
                    }
                }
        }

        // Obtener el precio del euro con respecto al USDT
        $precioEuroUSDT = 1;

        foreach ($prices as $price) {
            if (strtolower($price['symbol']) === 'eurusdt') {
                $precioEuroUSDT = $price['price'];
                break;
            }
        }

        // Paso los precios en dólares a euros
        foreach ($saldosMonedas as $saldo) {
            if ($saldo["currency"] != "eur") {
                $saldo["valor"] = ($saldo["valor"]  * $saldo["balance"] ) / $precioEuroUSDT;
            }
            else{
                $saldo["valor"] = 1 * $saldo["balance"];
            }
        }
        
        // Devuelvo los precios en euros
        return $saldosMonedas;
    }
}