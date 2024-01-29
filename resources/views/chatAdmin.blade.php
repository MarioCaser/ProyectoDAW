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
            height: 100%;
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
        console.log("id del usuario: " + userId);
    </script>
@endif


    <div class="contenedorCompleto flex">
        <div class="w-1/4 bg-gray-200">
            <!-- Panel de usuarios o lista de conversaciones -->
            <div class="p-4">
                <!-- Aquí puedes colocar el contenido del panel de usuarios o lista de conversaciones -->
                <ul>
                    <li>Historial de chat</li>
                    <li>Chat actual</li>
                    <!-- ... -->
                </ul>
            </div>
        </div>
        <div class="flex-1 bg-white">
            <!-- Área del chat -->
            <div class="conversacion p-4">
                <!-- Aquí puedes colocar el contenido del área del chat -->
                <div class="mensajes mb-6">
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
                <div>
                    <form action="/chatAdminMensaje" method="POST" class="flex flex-row">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{$userId}}">
                        <input type="text" name="mensaje" class="border border-gray-300 rounded-lg px-4 py-2 w-full mr-2" placeholder="Escribe tu mensaje aquí..." required>
                        <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var mensajesDiv = document.querySelector('.mensajes');
            mensajesDiv.scrollTop = mensajesDiv.scrollHeight;
        });
    </script>
@endsection