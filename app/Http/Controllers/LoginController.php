<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'email' => "",
        ];

        return view('login',$data);
    }

    public function store(Request $request){
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

        // return back()->withErrors([
        //     'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        // ]);
    }
    public function logout(Request $request){
        $previousUrl = url()->previous();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to($previousUrl);
    }
}