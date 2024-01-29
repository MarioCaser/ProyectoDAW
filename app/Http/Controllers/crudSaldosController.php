<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vistaSaldoUsers;
use App\Models\saldo_spot;
use App\Models\User;
use App\Models\coins;

class crudSaldosController extends Controller
{
    public function index(Request $request)
    {
        $results = vistaSaldoUsers::all();

        return view('crud_saldos_users',["datos"=>$results]);
    }

    public function eliminar(Request $request){
        if (!auth()->check() || auth()->user()->id_rol !== 2) {
            return redirect('/');
        }


        //return view('crud_saldos_users',["datos"=>$results]);
        
        $id_usuario = $request->input('id_usuario');
        $moneda = $request->input('moneda');

        $saldoEliminado = saldo_spot::where('user_id', $id_usuario)
              ->where('currency', $moneda)
              ->delete();

        $results = vistaSaldoUsers::all();
        
        if ($saldoEliminado) {
            return redirect()->route('crud_saldos')->with(['datos' => $results, 'resultado' => 'Eliminado correctamente']);
        } else {
            return redirect()->route('crud_saldos')->with(['datos' => $results, 'resultado' => 'No se ha podido eliminar la fila']);
        }

    }

    
    public function modificar(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $moneda = $request->input('moneda');

        $saldo = saldo_spot::where('user_id', $id_usuario)
            ->where('currency', $moneda)
            ->first();

        return view('modificar_saldo', compact('saldo'));
    }

    public function actualizar(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $moneda = $request->input('moneda');

        $saldo = saldo_spot::where('user_id', $id_usuario)
            ->where('currency', $moneda)
            ->first();

        $saldo->balance = $request->input('balance');
        $saldo->saldo_bloqueado = $request->input('saldo_bloqueado');
        $modificado = $saldo->save();

        $results = vistaSaldoUsers::all();

        if($modificado)
            return redirect()->route('crud_saldos')->with(['datos' => $results, 'resultado' => 'Modificado correctamente']);
        else
            return redirect()->route('crud_saldos')->with(['datos' => $results, 'resultado' => 'No se ha podido modificar']);
    }

    public function crearSaldo(){
        if (!auth()->check() || auth()->user()->id_rol !== 2) {
            return redirect('/');
        }

        $users = User::all();
        $coins = coins::all();

        return view('crear_saldo', ['users' => $users,"coins"=>$coins]);
    }

    public function guardarSaldo(Request $request)
    {
        if (!auth()->check() || auth()->user()->id_rol !== 2) {
            return redirect('/');
        }

        $user_id = $request->input('user_id');
        $currency = $request->input('currency');
        $balance = $request->input('balance');
        $saldo_bloqueado = $request->input('bloqueado');

        $saldo = new saldo_spot;
        $saldo->user_id = $user_id;
        $saldo->currency = $currency;
        $saldo->balance = $balance;
        $saldo->saldo_bloqueado = $saldo_bloqueado;
        $guardado = $saldo->save();

        if($guardado)
            return redirect()->route('crud_saldos')->with(['resultado' => 'Saldo añadido correctamente']);
        else
            return redirect()->route('crud_saldos')->with(['resultado' => 'No se ha añadido el saldo']);
    }
}