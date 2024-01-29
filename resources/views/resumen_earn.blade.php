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

        .contenedor{
            width: 100%;
            display: flex;
        }
        .menuIzquierda{
            width: 300px;
            border:1px solid black;
        }
        .menuDerecha{
            border:1px solid black;
            width: 100%;
        }
        .opciones:hover{
            cursor: pointer;
            background-color: lightgrey;
        }
        .resumenDinero{
            width:70%;
            display:flex;
            justify-content:space-between;
            padding-left:10%;
            margin-bottom: 20px;
            margin-top: 15px;
        }
        .totalBloqueado {
            display: block;
            @media(max-width: 400px){
                display: none;
            }
        }

        @media (max-width: 900px) {
            .bloqueado {
                display: none;
            }
        }

        @media (max-width: 800px) {
            .resumenDinero[style] {
                width: 85%;
                padding-right: 10%;
            }
        }

        @media (max-width: 600px) {
            .resumenDinero[style] {
                width: 100%;
                padding-right: 10%;
                padding-left: 10%;
            }
            .comprar{
                display: none;
            }
        }
        @media (max-width: 400px) {
            .resumenDinero[style] {
                width: 100%;
                padding-right: 0%;
                padding-left: 10%;
            }
        }
    </style>
@endsection

@section('content')
    <br>
    <div style="display:flex;width:100%;justify-content:space-between;align-items:center;">
        <div class="page-indicator">
            <p style="margin-left:27px;">Estás en: <a href="/resumen" class="text-amber-600 hover:text-amber-800">Resumen</a> > productos contratados</p>
        </div>
        <div class="opcionesBotones flex gap-4 pr-6 pt-3 hidden sm:block">
            <button class="py-2 px-4 bg-amber-500 text-black rounded-lg hover:bg-amber-400" onclick="window.location.href='/depositar'">Depositar</button>
            <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg" onclick="window.location.href='/resumen/retirar'">Retirar</button>
            {{-- <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg">Enviar a otros usuarios</button> --}}
            <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg" onclick="window.location.href='/convert'">Convertir</button>
        </div>
    </div>
    <h3 class="text-2xl" style="padding-left:10%;padding-bottom: 10px;padding-top:15px;">Earn</h3>
    <div class="resumenDinero flex" style="">
    </div>


    {{-- <div class="flex justify-center space-x-4">
        <button id="btnAllProducts" class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-700 focus:outline-none">Ver todos los productos</button>
        <button id="btnContractedProducts" class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-700 focus:outline-none">Ver productos contratados</button>
    </div> --}}


    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                {{-- <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th> --}}
                <th class="hidden lg:table-cell px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha suscripción</th>
                <th class="hidden lg:table-cell px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Fin</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moneda</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">APR</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duración</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                {{-- <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Disponible</th> --}}
                {{-- <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Cantidad Disponible</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Máximo Usuario</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Mínimo Usuario</th> --}}
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($earnContratados as $earnContratado)
            <tr>
                {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $earnContratado->id }}</td> --}}
                <td class="hidden lg:table-cell px-6 py-4 whitespace-nowrap">{{ $earnContratado->created_at }}</td>
                <td class="hidden lg:table-cell px-6 py-4 whitespace-nowrap">{{ $earnContratado->fecha_fin }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ strtoupper($earnContratado->currency) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $earnContratado->APR }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $earnContratado->duracion }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $earnContratado->cantidad }}</td>
                {{-- <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">{{ $earnContratado->disponible }}</td> --}}
                {{-- <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">{{ $earnContratado->cantidad_disponible }}</td>
                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">{{ $earnContratado->maximo_usuario }}</td>
                <td class="px-6 py-4 whitespace-nowrap hidden lg:table-cell">{{ $earnContratado->minimo_usuario }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    
    
    
    


    <script>


    </script>
@endsection