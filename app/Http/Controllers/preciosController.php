<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacto;



class preciosController extends Controller
{
    public function index(Request $request)
    {
        return view('precios');
    }

    public function store(Request $request){
        
    }
}