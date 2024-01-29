@extends('layouts.app')
@section('estilos')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body{
          background-color: white;
          color: black;
      }
      main{
          color: black;
      }
      .contenido {
          color: white;
      }
      .bg-custom-color {
        background-color: #f7a600;
      }
      .mb-6{
        margin-top: 1vw;
      }

    </style>
@endsection

@section('content')
<div style="display: flex;flex-wrap:nowrap;justify-content:center;">
    <div style="padding: 5% 2.5% 5% 2.5%;flex:3;text-align:left;">
      <form class="max-w-sm mx-auto my-10" method="POST" action="{{ route('registro') }}">
        @csrf
        {{ method_field('POST') }}
        <h2 class="text-2xl" style="margin-bottom: 0.5vw;">Crear cuenta</h2>
        <label style="text-align:left;">¿Ya tiene una cuenta? </label>
        <a href="/login" class="text-amber-500" style="text-decoration: none;text-align:left;">Inicia sesión</a>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Correo electrónico
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="correo electrónico" name="email" value="{{ request()->input('email') != '' ? request()->input('email') : old('email') }}">
          </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="password">
                Contraseña
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="*********" name="password">
        </div>
        <div class="flex items-center justify-between">
            <input class="bg-amber-500 hover:bg-amber-500 text-white  py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrarse" style="cursor:pointer;">
        </div>
      </form>
    
        @error('email')
            <p style="color:red;">{{ $message }}</p>
        @enderror
        
        @error('password')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <div style="padding: 5% 2.5% 5% 2.5%;flex:2;">
        {{-- <center><h3>Registrate ahora para</h3>
        <p>conseguir una caja misteriosa con<br>
        un valor de hasta <label style="color: amber;" class="text-amber-500 font-size: 100%;">500$</label>
        </p> --}}

        <center><h3 class="text-xl pt-6 pr-6">Registrate ahora</h3>
          <p>para comprar criptomonedas <br>con bajas comisiones</p>

        <img src="{{ asset('images/imagenRegistro.png') }}" alt="imagen" width="60%">
        </center>
    </div>
</div>

{{-- <div>
  @if(isset($email))
    <h1>Bienvenido, {{ $email }}!</h1>
  @endif
  @if(isset($password))
    <h1>password: , {{ $password }}!</h1>
  @endif
  @if(isset($aux))
    <h1>password: , {{ $aux }}!</h1>
  @endif
</div> --}}

<script>
  document.getElementById("registroEnlace1").style.color = "#f59e0b";


  var enlace = document.getElementById("registroEnlace1");

enlace.addEventListener("mouseover", function() {
  this.style.color = "#f59e0b";
});

enlace.addEventListener("mouseout", function() {
  this.style.color = "#f59e0b";
});
</script>


@endsection