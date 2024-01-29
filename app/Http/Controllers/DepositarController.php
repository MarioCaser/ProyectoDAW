<?php

namespace App\Http\Controllers;

use App\Models\precios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\saldo_spot;
use App\Models\coins;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class DepositarController extends Controller
{
    public function index(Request $request)
    {
        
        //para añadir las criptos a la base de datos
        //añado las cien criptomonedas más grandes del mundo

        // $cryptos = Http::get('https://api.coingecko.com/api/v3/coins/markets', [
        //     'vs_currency' => 'usd',
        //     'order' => 'market_cap_desc',
        //     'per_page' => '100',
        //     'page' => '1',
        //     'sparkline' => 'false'
        // ]);

        // $cryptosArray = $cryptos->json();

        // foreach ($cryptosArray as $crypto) {
        //     $coin = new coins;
        //     $coin->name = $crypto['name'];
        //     $coin->symbol = $crypto['symbol'];
        //     $coin->logo = 'images/criptologos/' . $coin->symbol . '.png';
        //     $coin->type = 'crypto';
        //     $coin->disponible = false;
        //     $coin->descripcion = '';
        //     $coin->save();
        // }
        //     DB::disconnect();



        // $cryptocurrency = new precios;
        // $cryptocurrency->currency = 'ETH';
        // $cryptocurrency->price = 2000;
        // $cryptocurrency->save();


        // $cryptocurrency = new precios;
        // $cryptocurrency->currency = 'USDT';
        // $cryptocurrency->price = 1;
        // $cryptocurrency->save();


        
        $coins = DB::table('coins')->select('symbol', 'name')->get();
        return view('depositar', compact('coins'));
    }
    public function deposito(Request $request){
        // Verificar si el usuario ha iniciado sesión
        if (Auth::check()) {
            // Obtener el ID del usuario que ha iniciado sesión
            $userId = Auth::id();
    
            // Obtener la moneda seleccionada y la cantidad ingresada por el usuario
            $currency = strtolower($request->input('coin'));
            $balance = $request->input('amount');
    
            // Buscar el saldo existente del usuario para la moneda seleccionada
            $saldo = saldo_spot::where('user_id', $userId)
                ->where('currency', $currency)
                ->first();
    
            // Si el usuario ya tiene saldo para esta moneda, actualizar el saldo existente
            if ($saldo) {
                $saldo->balance += $balance;
                $saldo->save();
            } else {
                // Si el usuario no tiene saldo para esta moneda, crear una nueva fila en la tabla 'saldo_spot'
                saldo_spot::create([
                    'user_id' => $userId,
                    'currency' => $currency,
                    'balance' => $balance,
                    'saldo_bloqueado' => 0,
                ]);
            }
    
            // Redirigir al usuario a la página anterior con un mensaje de éxito
            return redirect()->back()->with('success', 'El depósito se ha realizado correctamente.');
        } else {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            return redirect()->route('login');
        }
    }

    public function indexRetiro(Request $request)
    {

        // Verificar si el usuario tiene la sesión iniciada
        if (Auth::check()) {
            // Obtener el usuario autenticado
            $user = Auth::user();

            // Obtener los datos del usuario utilizando los modelos y la consulta que mencioné anteriormente
            $saldoSpots = saldo_spot::where('user_id', $user->id)
                ->join('coins', 'saldo_spot.currency', '=', 'coins.symbol')
                ->select('saldo_spot.currency', 'saldo_spot.balance', 'coins.name')
                ->get();

            return view('retirar', ["saldoSpot"=>$saldoSpots]);            
        } else {
            // El usuario no tiene la sesión iniciada, redirigir a la página de inicio de sesión
            return Redirect::to('/login');
        }
    }

    public function retiro(Request $request)
    {
        // Obtener los datos enviados en el formulario
        $coin = $request->input('coin');
        $amount = $request->input('amount');

        // Obtener el saldo del usuario para la moneda seleccionada
        $saldo = saldo_spot::where('currency', $coin)
                        ->where('user_id', Auth::user()->id)
                        ->first();

        // Verificar si el usuario tiene suficiente saldo
        if ($saldo && $saldo->balance >= $amount) {
            $disponible = $saldo->balance - $saldo->saldo_bloqueado;
            if($disponible >= $amount){
                // Realizar el retiro
                $saldo->balance -= $amount;
                $saldo->save();
    
                // Realizar acciones adicionales si es necesario
    
                return redirect()->back()->with('success', 'Retiro exitoso');
            }
            else{
                return redirect()->back()->with('error', 'No tienes suficiente saldo en esta moneda');
            }
        } else {
            return redirect()->back()->with('error', 'No tienes suficiente saldo en esta moneda');
        }
    }

}