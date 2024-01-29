<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacto;



class contactoController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'email' => "",
            'mensaje' => ''
        ];

        return view('contacto',$data);
    }

    public function store(Request $request){

        $mensajeR = $request->input('mensaje');
        $email = $request->input('email');


        //correo para mí
        $destinatario = 'mariocasermeiro@gmail.com';
        $asunto = 'Nuevo mensaje';
        $mensaje = 'Correo de la persona que ha enviado el mensaje: ' . $request->input('email') . ", contenido del mensaje: " . $request->input('mensaje');

        //para avisar a la persona que envía el correo de que se ha enviado correctamente
        $destinatario2 = $request->input('email');
        $asunto2 = 'Mensaje enviado correctamente';
        $mensaje2 = 'Tu mensaje se ha enviado correctamente, en breves te contestaremos.';

        $enviadoCorrectamente = true;

        $error = null;

        try {
            Mail::raw($mensaje, function ($message) use ($destinatario, $asunto) {
                $message->to($destinatario)
                        ->subject($asunto);
            });

            //para avisar a la persona que envía el correo de que se ha enviado correctamente
            Mail::raw("Tu mensaje se ha enviado correctamente, en breves te contestaremos", function ($message) use ($destinatario2, $asunto2) {
                $message->to($destinatario2)
                        ->subject("Mensaje de confirmación")
                        ->from('melabotony@gmail.com', 'ORCA');
            });

            //Mail::to($destinatario)->send(new contacto());
        } catch (\Exception $e) {
            $enviadoCorrectamente = false;
            $error = $e->getMessage();
        }

        

        if($enviadoCorrectamente){
            $mensajeR = '';
            $email = '';
        }

        return view('contacto',
            ["confirmacion" => $enviadoCorrectamente ? "Enviado correctamente" : "Error, has introducido un email incorrecto",
            //datos para avisar si no se envia correctamente
            "mensaje"=>$mensajeR,
            "email"=>$email]
        );
    }
}