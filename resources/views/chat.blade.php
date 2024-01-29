@extends('layouts.app')

@section('estilos')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: white;
            color: black;
        }
        main {
            color: black;
        }
        .contenido {
            color: white;
        }
        .bg-custom-color {
            background-color: #f7a600;
        }
        .mb-6 {
            margin-top: 1vw;
        }
        .enviar-mensaje {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f2f2f2;
            padding: 1rem;
        }
        .contenedorCompleto{
            height: calc(100vh - 96px);
        }
        .conversacion{
            height: 95%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .mensajes{
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: auto;
            max-height: 100%;
        }
    </style>
@endsection

@section('content')

@if(isset($mensajes))
    <script>
        let mensajes = {!! json_encode($mensajes) !!};
        console.log(mensajes);

        let userId = "{{ $userId }}";
        console.log(userId);
    </script>
@endif


    <div class="contenedorCompleto flex">
        <div class="w-1/4 bg-gray-200 hidden md:block">
            <!-- Panel de usuarios o lista de conversaciones -->
            <div class="p-4">
                <div class="mb-8 ml-1">
                    <p class="text-lg font-semibold mb-2">Otras vías de contacto:</p>
                    <div class="flex items-center">
                        <img src="images/whatsapp.png" alt="whatsapp" width="26px" class="mr-3">
                        <a href="https://wa.me/666666666">666 666 666</a>
                    </div>
                    <div class="flex items-center">
                        <img src="images/gmail.png" alt="whatsapp" width="26px" class="mr-3">
                        <a href="mailto:correo@ejemplo.com">correo@ejemplo.com</a>
                    </div>
                </div>
                
                
                <h2>Ubicación</h2>
                <div id="map" style="width: 100%; height: 200px;"></div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">

                <script>
                    var map = L.map('map').setView([48.8566, 2.3522], 15);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    L.marker([48.8566, 2.3522]).addTo(map);
                </script>

            </div>
        </div>
        <div class="flex-1 bg-white">
            <div class="bg-gray-100 h-5vh p-4">
                <div class="flex items-center">
                    <img src="images/soporte.png" alt="soporte" class="w-6 h-6 mr-2">
                    <label class="text-lg font-semibold">Soporte</label>
                </div>
            </div>            
            <!-- Área del chat -->
            <div class="conversacion px-4 h-95vh">
                <!-- Aquí puedes colocar el contenido del área del chat -->
                <div class="mensajes mb-6" style="margin-top:0;">
                    <!-- Mensajes del chat -->
                    <div>
                        <!-- Mensaje 1 -->
                        {{-- <div class="mb-2">
                            <span class="bg-custom-color px-2 py-1 rounded-lg">soporte:</span>
                            <span class="ml-2">Hola, ¿cómo estás?</span>
                        </div> --}}
                        {{-- mensaje del usuario --}}
                        {{-- <div class="mb-2 flex justify-end">
                            <div class="bg-gray-200 rounded-lg p-2">
                                <span>Este es un mensaje de prueba.</span>
                            </div>
                        </div> --}}
                        <!-- ... -->
                        @if ($mensajes->count() > 0)
                            @foreach ($mensajes as $mensaje)
                                @if( $mensaje->id_envia == $userId )
                                    <div class="mb-2 flex justify-end">
                                        <div class="bg-gray-200 rounded-lg p-2">
                                            <span>{{ $mensaje->mensaje }}</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="mb-2">
                                        <span class="bg-custom-color px-2 py-1 rounded-lg">soporte:</span>
                                        <span class="ml-2">{{$mensaje->mensaje}}</span>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- Formulario para enviar mensajes -->
                <div style="padding-bottom: 40px;">
                    <form action="/chat" method="POST" class="flex flex-row">
                        @csrf
                        <input type="text" name="mensaje" class="border border-gray-300 rounded-lg px-4 py-2 w-full mr-2" placeholder="Escribe tu mensaje aquí..." required>
                        <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("chatEnlace1").style.color = "#f59e0b";
      
      
        var enlace = document.getElementById("chatEnlace1");
      
      enlace.addEventListener("mouseover", function() {
        this.style.color = "#f59e0b";
      });
      
      enlace.addEventListener("mouseout", function() {
        this.style.color = "#f59e0b";
      });
      </script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var mensajesDiv = document.querySelector('.mensajes');
            mensajesDiv.scrollTop = mensajesDiv.scrollHeight;
        });
    </script>
@endsection