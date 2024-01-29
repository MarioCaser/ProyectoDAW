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

@if(isset($confirmacion))
    <script>
        window.onload = function() {
            alert("{{ $confirmacion }}");
        }
    </script>
@endif

<div style="display: flex;flex-wrap:nowrap;justify-content:center;">
    <div style="padding: 0% 2.5% 0% 2.5%;flex:3;text-align:left;">
      <form class="max-w-sm mx-auto my-10" method="POST" action="{{ route('contacto') }}">
        @csrf
        <h2 class="text-2xl" style="margin-bottom: 0.5vw;">CONTACTO</h2>
        {{-- <label style="text-align:left;">¿Aún no tienes una cuenta? </label>
        <a href="{{route('registro')}}" class="text-amber-500" style="text-decoration: none;text-align:left;">Regístrate</a> --}}
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">
                Correo electrónico
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="correo electrónico" name="email" value="{{ $email }}" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">
                Mensaje
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32" id="mensaje" name="mensaje" required></textarea>
        </div>
        <div class="flex items-center justify-between">
            <input class="bg-amber-500 hover:bg-amber-500 text-white  py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Enviar mensaje">
        </div>
      </form>
    </div>
</div>


{{-- <div class="mb-8 ml-8">
    <p class="text-lg font-semibold mb-2">Otras vías de contacto:</p>
    <div class="flex"><img src="images/whatsapp.png" alt="whatsapp" width="26px" class="mr-3">
        <a href="https://wa.me/666666666">666 666 666</a>
    </div>
    <div class="flex">
        <img src="images/gmail.png" alt="whatsapp" width="26px" class="mr-3"><a href="mailto:correo@ejemplo.com">correo@ejemplo.com</a>
    </div>
</div> --}}

<div class="bg-gray-200 text-gray-800 w-full">
    <div class="flex mb-8 ml-8">
        <p class="text-lg font-semibold m-2">Otras vías de contacto:</p>
        <div class="flex items-center">
            <img src="images/whatsapp.png" alt="whatsapp" width="26px" class="mr-3">
            <a href="https://wa.me/666666666" class="text-gray-800">666 666 666</a>
        </div>
        <div class="flex items-center ml-4">
            <img src="images/gmail.png" alt="gmail" width="26px" class="mr-3">
            <a href="mailto:correo@ejemplo.com" class="text-gray-800">correo@ejemplo.com</a>
        </div>
    </div>
</div>


  
<script>
    document.getElementById("contactoEnlace1").style.color = "#f59e0b";
  
  
    var enlace = document.getElementById("contactoEnlace1");
  
  enlace.addEventListener("mouseover", function() {
    this.style.color = "#f59e0b";
  });
  
  enlace.addEventListener("mouseout", function() {
    this.style.color = "#f59e0b";
  });
  </script>


<script>
    document.getElementById("mensaje").innerHTML = '{{$mensaje}}'.toString();
</script>
@endsection