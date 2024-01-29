<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
use App\Models\mensaje;


class chatController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        else{
            $userId = Auth::id();

            //obtener los 20 últimos mensajes de la persona
            $mensajes = mensaje::where('id_usuario', $userId)
                // ->orWhere('id_recibe', $userId)
                ->latest()
                ->take(20)
                ->get()
                ->reverse();

            return view('chat',["mensajes"=>$mensajes,"userId"=>$userId]);
        }
    }

    public function store(Request $request){
        if (!auth()->check()) {
            return redirect('/login');
        }
        else {
            try{
                // id del usuario de soporte
                $soporte = 2;
                $mensaje = $request->input('mensaje');
                $userId = Auth::id();

                $nuevoMensaje = new Mensaje();
                $nuevoMensaje->id_envia = $userId;
                $nuevoMensaje->id_recibe = $soporte;
                $nuevoMensaje->id_usuario = $userId;
                $nuevoMensaje->mensaje = $mensaje;
                $nuevoMensaje->save();

                //obtener los 20 últimos mensajes de la persona
                $mensajes = mensaje::where('id_usuario', $userId)
                // ->orWhere('id_recibe', $userId)
                ->latest()
                ->take(20)
                ->get()
                ->reverse();
                
                return view('chat',["mensajes"=>$mensajes,"userId"=>$userId]);
            }
            catch (Exception $e) {
                $userId = Auth::id();

                //obtener los 20 últimos mensajes de la persona
                $mensajes = mensaje::where('id_usuario', $userId)
                // ->orWhere('id_recibe', $userId)
                ->latest()
                ->take(20)
                ->get()
                ->reverse();

                return view('chat',["mensajes"=>$mensajes,"userId"=>$userId]);
            }
        }
    }

    public function chatAdmin(Request $request){

        if (!auth()->check()) {
            return redirect('/login');
        }
        //cambiar esto para que en lugar de comparar el id del admin, se compare con el rol de admin
        if(Auth::id() != 2){
            return redirect('/login');
        }
        else {
            try{
                // id del usuario de soporte
                $usuario = intval($request->input('id_usuario'));
                // $mensaje = $request->input('mensaje');
                $userId = Auth::id();

                // $nuevoMensaje = new Mensaje();
                // $nuevoMensaje->id_envia = $userId;
                // $nuevoMensaje->id_recibe = $usuario;
                // $nuevoMensaje->mensaje = $mensaje;
                // $nuevoMensaje->save();

                // return view('prueba_crud_chat',["usuario"=>$usuario,"userId"=>$userId]);


                $mensajes = mensaje::where(function ($query) use ($usuario, $userId) {
                    $query->whereIn('id_envia', [$usuario, $userId])
                        ->whereIn('id_recibe', [$usuario, $userId]);
                })
                ->latest()
                ->take(20)
                ->get()
                ->reverse();

                //obtener los 20 últimos mensajes del admin con ese usuario
                // $mensajes = Mensaje::where('id_envia', $userId)
                // ->orWhere('id_envia', $usuario)
                // ->where('id_recibe', $userId)
                // ->orWhere('id_recibe', $usuario)
                // ->latest()
                // ->take(20)
                // ->get()
                // ->reverse();
                
                
                return view('chatAdmin',["mensajes"=>$mensajes,"userId"=>$usuario]);
            }
            catch (Exception $e) {
                return view('chat',["mensajes"=>$mensajes,"userId"=>$usuario]);
            }
        }
    }

    public function storeAdmin(Request $request){
        if (!auth()->check()) {
            return redirect('/login');
        }
        //cambiar esto para que en lugar de comparar el id del admin, se compare con el rol de admin
        if(Auth::id() != 2){
            return redirect('/login');
        }
        else {
            try{
                // id del usuario de soporte
                $soporte = 2;
                $mensaje = $request->input('mensaje');

                $usuario = intval($request->input('id_usuario'));

                $nuevoMensaje = new Mensaje();
                $nuevoMensaje->id_envia = $soporte;
                $nuevoMensaje->id_recibe = $usuario;
                $nuevoMensaje->id_usuario = $usuario;
                $nuevoMensaje->mensaje = $mensaje;
                $nuevoMensaje->leido = false;
                $nuevoMensaje->save();

                //obtener los 20 últimos mensajes de la persona
                $mensajes = mensaje::where('id_usuario', $usuario)
                // ->orWhere('id_recibe', $userId)
                ->latest()
                ->take(20)
                ->get()
                ->reverse();
                
                return view('chatAdmin',["mensajes"=>$mensajes,"userId"=>$usuario]);
            }
            catch (Exception $e) {
                $userId = Auth::id();

                //obtener los 20 últimos mensajes de la persona
                $mensajes = mensaje::where('id_usuario', $userId)
                // ->orWhere('id_recibe', $userId)
                ->latest()
                ->take(20)
                ->get()
                ->reverse();

                return view('chatAdmin',["mensajes"=>$mensajes,"userId"=>$userId]);
            }
        }
    }
}