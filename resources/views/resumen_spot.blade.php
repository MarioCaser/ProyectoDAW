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
            <p style="margin-left:27px;">Estás en: <a href="/resumen" class="text-amber-600 hover:text-amber-800">Resumen</a> > Saldos</p>
        </div>
        <div class="opcionesBotones flex gap-4 pr-6 pt-3 hidden sm:block">
            <button class="py-2 px-4 bg-amber-500 text-black rounded-lg hover:bg-amber-400" onclick="window.location.href='/depositar'">Depositar</button>
            <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg" onclick="window.location.href='/resumen/retirar'">Retirar</button>
            {{-- <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg">Enviar a otros usuarios</button> --}}
            <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg" onclick="window.location.href='/convert'">Convertir</button>
        </div>
    </div>
    <h3 class="text-2xl" style="padding-left:10%;padding-bottom: 10px;padding-top:15px;">Saldos</h3>

    <div class="resumenDinero flex" style="">
        <div class="totalDinero" style="display:flex;flex-direction:column;">
            <h4>Total disponible</h4>
            <div class="flex">
                <h3 id="totalDisponible">--</h3>
                <label> EUR</label>
            </div>
        </div>
        <div class="totalBloqueado">
            <h4>Total bloqueado</h4>
            <div class="flex">
                <h3 id="totalBloqueado">--</h3>
                <label> EUR</label>
            </div>
        </div>
    </div>


    <div class="relative mb-4 ml-10">
        <input type="text" id="buscar" placeholder="Buscar" class="pl-10 pr-4 py-2 border border-gray-300 rounded">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 17 9.5 6.5 6.5 0 1 0 9.5 17c1.86 0 3.54-.79 4.73-2.06l.27.28v.79l5 4.99L21.49 20l-4.99-5zm-6 0A4.5 4.5 0 1 1 14 9.5 4.5 4.5 0 0 1 9.5 14z" />
            </svg>
        </div>
    </div>
     


    <table class="min-w-full">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Moneda</th>
                <th class="px-4 py-2">Balance</th>
                <th class="bloqueado px-4 py-2">Bloqueado</th>
                <th class="px-4 py-2">Equivalente (€)</th>
                <th class="comprar px-4 py-2">Comprar</th>
            </tr>
        </thead>
        <tbody id="tablaFilas">
            @foreach ($valorSaldos as $objeto)
                <tr class="hover:bg-gray-100">
                    <td class="border-t border-gray-200 px-4 py-2 text-center">{{ $objeto['currency'] }}</td>
                    <td class="border-t border-gray-200 px-4 py-2 text-center">{{ $objeto['balance'] }}</td>
                    <td class="bloqueado border-t border-gray-200 px-4 py-2 text-center">{{ $objeto['saldo_bloqueado'] }}</td>
                    <td class="border-t border-gray-200 px-4 py-2 text-center">{{ number_format($objeto['valor'],2) }}</td>
                    <td class="comprar border-t border-gray-200 px-4 py-2 text-center">
                        <a href="/convert/{{ strtoupper($objeto['currency']) == 'EUR' ? 'EUR/BUSD' : strtoupper($objeto['currency']) . '/EUR' }}" class="text-amber-500">
                            Operar
                        </a>
                    </td>
                </tr>
            @endforeach
            @foreach ($simbolos as $simbolo)
                @php
                    $objetoVacio = [
                        'currency' => $simbolo,
                        'balance' => '0.00000000',
                        'saldo_bloqueado' => '0.00000000',
                        'valor' => 0,
                    ];
                @endphp
                <tr class="hover:bg-gray-100">
                    <td class="border-t border-gray-200 px-4 py-2 text-center">{{ $objetoVacio['currency'] }}</td>
                    <td class="border-t border-gray-200 px-4 py-2 text-center">{{ $objetoVacio['balance'] }}</td>
                    <td class="bloqueado border-t border-gray-200 px-4 py-2 text-center">{{ $objetoVacio['saldo_bloqueado'] }}</td>
                    <td class="border-t border-gray-200 px-4 py-2 text-center">{{ number_format($objetoVacio['valor'],2) }}</td>
                    <td class="comprar border-t border-gray-200 px-4 py-2 text-center">
                        <a href="/convert/{{ strtoupper($objetoVacio['currency']) == 'EUR' ? 'EUR/BUSD' : strtoupper($objetoVacio['currency']) . '/EUR' }}" class="text-amber-500">
                            Operar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script>

        var valorSaldos = @json($valorSaldos); // Obtener los saldos desde la vista en formato JSON
        console.log(valorSaldos);
        let totalDinero = 0;
        totalBloqueado = 0;

        valorSaldos.forEach(function(saldo, index) {
            totalDinero += saldo["valor"];
            if(saldo["balance"] > 0)
                totalBloqueado += (saldo["saldo_bloqueado"] / saldo["balance"]) * saldo["valor"];
        });
        
        // Obtener el número formateado con separadores de miles y punto decimal
        const formattedNumber = totalDinero.toLocaleString('en-US', { maximumFractionDigits: 2, useGrouping: true });

        // Reemplazar la coma de los miles por un punto y mostrar el resultado
        document.getElementById("totalDisponible").innerHTML = formattedNumber;

        // Obtener el número formateado con separadores de miles y punto decimal
        const formattedNumber2 = Number(totalBloqueado).toLocaleString('en-US', { maximumFractionDigits: 2, useGrouping: true });

        // Reemplazar la coma de los miles por un punto y mostrar el resultado
        document.getElementById("totalBloqueado").innerHTML = formattedNumber2;

    </script>

<script>
    const buscarInput = document.getElementById('buscar');
    const tablaFilas = document.getElementById('tablaFilas');

    buscarInput.addEventListener('input', () => {
        const textoBuscado = buscarInput.value.toLowerCase();

        Array.from(tablaFilas.getElementsByTagName('tr')).forEach((fila) => {
            const celdas = Array.from(fila.getElementsByTagName('td'));
            const contenidoFila = celdas.slice(0, -1).map((celda) => celda.innerText.toLowerCase());
            fila.style.display = contenidoFila.some((contenido) => contenido.includes(textoBuscado))
                ? 'table-row'
                : 'none';
        });
    });
</script>



@endsection