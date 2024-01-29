<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'email' => "",
            'password' => ""
        ];

        return view('registro',$data);
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_rol = 1;

        $data = [
            'email' => $user->email,
            'password' => $user->password
        ];
        
        // if($user->save())
        //     return view('login',$data);
        // else
        //     return view('registro', $data);

        if ($user->save()) {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
    
            if (Auth::attempt($credentials)) {
                // Autenticación exitosa
                return redirect()->intended('/');
            }
            else
                return view('login', ["email"=>$request->email]);
        } else {
            return redirect()->route('registro')->with($data);
        }
        
    }
}