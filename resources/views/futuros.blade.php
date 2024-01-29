@extends('layouts.app')
@section('estilos')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{
            background-color: white;
        }
        main{
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
        .barraSuperior{
            height: 50px;
            background-color: #181c1c;
            margin-top: 4px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
        }
        .nombre{
            display: flex;
            align-items: center;
        }
        .nombre img {
            height: 40px;
            margin-top: 5px;
            margin-left: 15px;
            margin-right: 15px;
        }
        .nombre label ,#precio{
            font-weight: bold;
        }
        .linea-vertical {
            border-left: 1px solid grey;
            height: 35px;
            margin: 0 8px;
        }
        .datos {
            display: flex;
            align-items: flex-start;
        }
        .datos div {
            margin-right: 16px;
            margin-left: 16px;
            display: flex;
            flex-direction: column;
        }
        .littleGris{
            color: #71757a;
            font-size: 12px;
        }
        .variacion{
            color: green;
            font-size: 13px;
            font-weight: bold;
        }
        .littleWhite{
            color: #FAFAFA;
            font-size: 13px;
            font-weight: bold;
        }
        .datosOperacion{
            display: flex;
            flex-direction: column;
            width: 350px;
            background-color: #101014;
            min-width: 350px;
        }
        .tipoOperacion{
            display: flex;
            flex-direction: row;
            background-color: #141414;
            /* width: 315px; */
            padding: 15px;
            font-size: 15px;
        }
        .selectTipo{
            background-color: #373d47;
            margin: 0px;
            padding: 5px;
            border-radius: 3px;
        }
        .operaciones{
            margin: 0px;
            padding: 0;
            width: 100%;
        }
        
        @media (max-width: 1080px) {
            .datosOperacion {
                width: 350px;
            }
        }
        .labelsApalancamiento{
            display: flex;
            align-items: center;
            background-color: #373d47;;
            width: 100%;
            margin-left: 10px;
            padding-left: 8px;
            border-radius: 3px;
            justify-content: center;
        }
        .operaciones div label{
            width: 100%;
        }
        .tiposOrden{
            display: flex;
            flex-direction: row;
            color: #adb193;
            padding: 15px;
        }
        .tiposOrden label{
            cursor: pointer;
        }
        .tiposOrden div:not(:first-child) {
            margin-left: 15px;
        }
        .tipoOperacion{
            border-bottom: 1px solid lightgray;
        }
        .precios{
            padding-left: 15px;
            padding-right: 15px;
        }
        .precioLabel{
            font-size: 12px;

        }
        .inputPrecio{
            background-color: #202124;
            padding: 4px 15px;
            border-radius: 4px;
            font-size: 14px;
        }
        #precioInput{
            width: 70%;
        }
        .slider {
            -webkit-appearance: none;
            width: 100%;
            background-color: #e5e7eb;
            outline: none;
            opacity: 0.7;
            transition: opacity 0.2s;
            height: 4px;
        }
        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            border: 5px solid #888888;
            background-color: transparent;
            cursor: pointer;
            transform: translateY(0px) rotate(45deg);
            transform-origin: center center;
        }

        .slider::-moz-range-thumb {
            width: 16px;
            height: 16px;
            border: 5px solid #888888;
            background-color: transparent;
            cursor: pointer;
            transform: translateY(-50%) rotate(45deg);
            transform-origin: center center;
        }

    </style>
@endsection

@section('content')
    <div class="barraSuperior">
        <div class="nombre">
            <img src="images/criptologos/BTC.png" alt="logo">
            <label>BTC/USDT</label>
            <div></div>
        </div>
        <div class="linea-vertical"></div>
        <label id="precio">28,000.69</label>
        <div class="datos">
            <div>
                <label class="littleGris">Cambio en 24h</label>
                <label class="variacion">+5.2%</label>
            </div>
        </div>
        <div class="datos">
            <div>
                <label class="littleGris">24h máximo</label>
                <label class="littleWhite">29,269.10</label>
            </div>
        </div>
        <div class="datos">
            <div>
                <label class="littleGris">24h mínimo</label>
                <label class="littleWhite">28,169.37</label>
            </div>
        </div>
        <div class="datos">
            <div>
                <label class="littleGris">Financiación/Contador</label>
                <label class="littleWhite">-0.001%/03:37:15</label>
            </div>
        </div>
        <div class="datos">
            <div>
                <label class="littleGris">Volumen 24h</label>
                <label class="littleWhite">15 BTC</label>
            </div>
        </div>
    </div>

    <div class="datosOperacion">
        <div class="tipoOperacion">
            <div class="operaciones flex">
                <select class="selectTipo" id="selectTipo">
                    <option>Cruzado</option>
                    <option>Aislado</option>
                </select>
                <div class="labelsApalancamiento">
                    <label>10x</label>
                </div>
            </div>
            <div class="icono" style="display:flex;align-items:center;margin-left: 18px;">
                <label>Z</label>
                {{-- aquí pondré algún icono que haga algo --}}
            </div>
        </div>
        <div class="tiposOrden">
            <div>
                <label>Límite</label>
            </div>
            <div>
                <label>Mercado</label>
            </div>
            <div>
                <label>Condicional</label>
            </div>
        </div>
        <div class="precios">
            <div>
                <label class="precioLabel">Precio</label>
                <div class="inputPrecio flex justify-between items-center">
                    <input type="text" name="precio" id="precioInput" class="bg-transparent border-2 border-white h-9 focus:outline-none">
                    <div>
                        <label>Último</label>
                        <label>|</label>
                        <span> Ic</span>
                    </div>
                </div>                
            </div>
            <div style="margin-top: 10px;">
                <label class="precioLabel">Cantidad</label>
                <div class="inputPrecio flex justify-between items-center">
                    <input type="text" name="precio" id="precioInput" class="bg-transparent border-2 border-white h-9 focus:outline-none">
                    <div>
                        <label>Último</label>
                        <label>|</label>
                        <span> Ic</span>
                    </div>
                </div>                
            </div>
            <div>
                <div class="flex items-center justify-between mt-5">
                    <input type="range" min="1" max="100" step="1" class="w-4/5 slider" id="mySlider" value="1">
                    <span id="sliderValue" class="ml-auto"></span>
                </div>
                  
                
            </div>
            <div class="flex justify-center mt-5 mb-2">
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-4 w-2/5">
                    Buy/Long
                </button>
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded w-2/5">
                    Sell/Short
                </button>
            </div>              
        </div>
    </div>



    <script>
        const slider = document.getElementById('mySlider');
        const sliderValue = document.getElementById('sliderValue');

        // Actualizar el valor inicial
        // sliderValue.textContent = slider.value + "%";

        // Actualizar el valor durante las interacciones
        slider.addEventListener('input', function() {
            sliderValue.textContent = slider.value + "%";
        });

    </script>
@endsection



{{-- https://www.binance.com/es/support/faq/c%C3%B3mo-usar-la-calculadora-de-binance-futures-360036498511 --}}