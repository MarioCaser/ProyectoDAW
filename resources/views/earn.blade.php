@extends('layouts.app')


@section('estilos')
    <script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="{{ asset('css/earn.css') }}">
@endsection


@push('scripts')
	<script>
    let agrupadas = @json($agrupadas);
    let hayUsuario = "{{ $hayUsuario }}";
    let saldos = @json($saldos);
    console.log(saldos);
    console.log(agrupadas);
</script>
@endpush
@section('content')

    <div class="containerNegro">
        <div class="textoInfo">
            <h1 style="text-align: left;" class="text-3xl">ORCA Earn</h1>
            <p style="text-align: left;">No te conformes con mantener tus posiciones. Aumenta tus reservas de criptomonedas de forma inteligente.</p>
        </div>
        <div class="image">
            <img src="images/fondoEarn.webp" alt="Descripción de la imagen">
        </div>
    </div>

    <div class="debajo">
        <div class="header">
            <div class="header-left">
                <h2 class="text-lg">Todos los productos</h2>
            </div>
            <div class="header-right">
                <br>
                <div style="display: flex; justify-content: flex-end;margin-right:10px;">
                    <img src="/images/historial.png" alt="historial" width="30px" height="auto" style="padding-right: 10px; cursor: pointer;" onclick="redirigirPagina()">
                    <label style="cursor: pointer;color:#747c8c;" onclick="redirigirPagina()">Historial</label>
                </div>
                <br>
                <script>
                    function redirigirPagina() {
                        // Redirigir a la página deseada
                        window.location.href = "/resumen/earn";
                    }
                </script>

                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                </div>
            </div>
        </div>
    </div>
    <div class="debajo">
        <div class="titulos">
            <label class="label1">Monedas</label>
            <label class="label2">APR</label>
            <label class="label3">Duración (días)</label>
        </div>
    </div>
    <div id="lista">
    </div>
    <div id="capa"></div>
    <!-- Ventana emergente -->
    <div id="ventana">
            <button id="cerrar-ventana">x</button>
            <div class="panelCompleto" id="panelCompleto">
                <div class="panelIzquierda">
                    <div class="cabecera">
                        <label class="suscribirse">Earn</label>
                    </div>
                    <div style="padding-left: 24px;padding-right: 24px;width:100%;">
                        <div class="duracion" style="display: flex; justify-content: space-between;align-items: center;background-color: #f9f9f9;background-clip: padding-box;width:100%;padding-left: 24px;padding-right: 24px;">
                            <div style="display: flex;flex-direction: row;text-align:center;">
                                <div style="height: 35px;width:35px;margin:auto;">
                                    <img alt="logo" id="logoMonedaEarn" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1.png" width="100%" height="100%">
                                </div>
                                <div style="margin-left: 8px;text-align: left;">
                                    <label id="abreviaturaMonedaEarn">bitcoin</label>
                                    <h3 id="monedaEarn">BTC</h3>
                                </div>
                                
                            </div>
                            <div style="display: flex; flex-direction: column; justify-content: center;text-align:center;">
                                <label>APR aproximado</label>
                                <h3 id="apraprox" class="text-amber-500 font-semibold" >69%</h3>
                            </div>
                            <div style="display: flex; flex-direction: column; justify-content: flex-end;text-align:center;">
                                <label>Duración</label>
                                <h3 id="duracionDias">7 días</h3>
                            </div>
                        </div>
                    </div>
                    <div class="importe">
                        <div style="width:100%;display:flex;  justify-content: space-between;"><label>Importe de la suscripción</label><label id="mensajeSaldoInsuficiente" style="color:red"></label></div>
                        <input class="border border-gray-300 rounded-md px-4 py-2 transition-colors duration-300 focus:border-black focus:border-2 focus:outline-none" type="text" placeholder="Cantidad a suscribir" id="cantidad">
                        <div class="debajoIndex">
                            <label id="saldoDisponible">--</label>
                            <label></label>
                            <a href="">compra</a>
                        </div>
                    </div>
                    <div id="suficiente" class="suficiente">
                        <label>No tienes suficientes criptomonedas?</label>
                        <a href="">Compra aquí</a>
                    </div>
                    <div class="limites">
                        <label style="margin-bottom: 5px;">
                            Límites de importe
                        </label>
                        <div style="display:flex;flex-direction: row;justify-content: space-between;align-items: center; margin-bottom: 5px;">
                            <label>Mínimo: </label>
                            <label style="margin-left: auto;" id="minimo">--</label>
                        </div>
                        <div style="display:flex;flex-direction: row;justify-content: space-between;align-items: center;margin-bottom: 5px;">
                            <label>Cuota máxima por usuario: </label>
                            <label style="margin-left: auto;" id="maximo_usuario">--</label>
                        </div>
                    </div>
                    {{-- <div class="automatico">
                        <input type="checkbox" name="auscripcionAutomatica" id="auto">
                        <div style="display: flex; flex-direction:column;">
                            <label>Suscripción automática</label>
                            <label class="textoAutomatico">Habilita la suscripción automática para volver a suscribir un producto que haya caducado con las condiciones anteriores, de forma automática y de inmediato.</label>
                        </div>
                    </div> --}}
                </div>
                <div class="panelDerecha">
                    <div class="resumen">
                        <h3 class="text-xl">Resumen</h3>
                    </div>
                    <div class="fechas">
                        <div class="fecha">
                            <label style="color: #828a9a">Fecha de suscripción</label>
                            <label class="textoFecha" id="fechaSuscripcion">02:00 19-03-2023</label>
                        </div>
                        <div class="fecha">
                            <label style="color: #828a9a" class="text-neutral-500">Fecha valor</label>
                            <label class="textoFecha" id="fechaValor">02:00 19-03-2023</label>
                        </div>
                        <div class="fecha">
                            <label style="color: #828a9a" class="text-neutral-500">Fecha de final del interés</label>
                            <label class="textoFecha" id="fechaFin">02:00 19-03-2023</label>
                        </div>
                        <div class="fecha">
                            <label style="color: #828a9a" class="text-neutral-500" id="fechaReembolsoTexto">Fecha reembolso</label>
                            <label class="textoFecha" id="fechaReembolso">02:00 19-03-2023</label>
                        </div>
                    </div>
                    <div class="linea">
                        <hr>
                    </div>
                    <div style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;" class="estimado">
                        <label>Interés estimado: </label>
                        <label style="margin-left: auto;" class="text-amber-500 font-semibold text-lg" id="resultado">--</label>
                    </div>
                    <form action="/earn" method="post">
                        @csrf
                        <input type="hidden" name="id_cantidad_oculta" value="nulo" id="cantidadOculta">
                        <input type="hidden" name="id_producto_oculto" value="nulo" id="oculto">
                        <div class="botonConfirmar">
                            <input type="submit" value="Confirmar" class="bg-amber-500 hover:bg-amber-400 text-white font-bold py-2 px-4 rounded" style="width: 80%;" id="botonConfirmar">
                        </div>
                    </form>
                </div>
            </div>
    </div>
    {{-- mensaje de error --}}
    
    <div id="myModal" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;z-index:10000;">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg shadow-lg p-8 mx-2">
                <h2 class="text-lg font-bold mb-4" style="color:black;"></h2>
                {{-- <p class="text-gray-700 mb-4">El producto no está disponible en este momento.</p> --}}
                @if(isset($error))
                    <p id="errorMessage" style="color:black;">{{ $error }}</p>
                @endif
                <button id="closeModal" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Aceptar
                </button>
            </div>
        </div>
      </div>






<div class="calculadora">
    <div class="contenidoCalculadora text-black mt-4" style="width:100vw;">
        <h2 class="text-2xl font-semibold">Calculadora de rentabilidad</h2>
        <div class="my-4">
            <label for="apr" class="mr-2">APR (%):</label>
            <input type="number" id="apr" class="border border-gray-300 px-2 py-1 rounded" value="10">
        </div>
        <div class="my-4">
            <label for="days" class="mr-2">Periodo de reinversión (días):</label>
            <input type="number" id="days" class="border border-gray-300 px-2 py-1 rounded" value="30">
        </div>
        <div class="my-4">
            <label for="initial-investment" class="mr-2">Inversión inicial (€):</label>
            <input type="number" id="initial-investment" class="border border-gray-300 px-2 py-1 rounded" value="1000">
        </div>
        <div class="my-4">
            <h3 class="text-xl font-semibold">Rentabilidad:</h3>
            <p id="result" class="mt-2">Obtendrías 1104.72 €</p>
        </div>
        <div class="my-4">
            <button id="calculate" class="calc-button bg-transparent text-gray-500 hover:bg-amber-100 hover:text-amber-500 px-4 py-2 rounded">120 dias</button>
            <button id="calculate-year" class="calc-button bg-amber-100 text-amber-500 hover:bg-amber-100 hover:text-amber-500 px-4 py-2 rounded">1 año</button>
            <button id="calculate-two-years" class="calc-button bg-transparent text-gray-500 hover:bg-amber-100 hover:text-amber-500 px-4 py-2 rounded">2 años</button>
            <button id="calculate-three-years" class="calc-button bg-transparent text-gray-500 hover:bg-amber-100 hover:text-amber-500 px-4 py-2 rounded">3 años</button>
            <button id="calculate-five-years" class="calc-button bg-transparent text-gray-500 hover:bg-amber-100 hover:text-amber-500 px-4 py-2 rounded">5 años</button>
        </div>
    </div>
</div>

<script>
    document.getElementById("earnEnlace1").style.color = "#f59e0b";
  
  
    var enlace = document.getElementById("earnEnlace1");
  
  enlace.addEventListener("mouseover", function() {
    this.style.color = "#f59e0b";
  });
  
  enlace.addEventListener("mouseout", function() {
    this.style.color = "#f59e0b";
  });
  </script>


    
    
    <script src="{{ asset('js/earn.js') }}"></script>
@endsection