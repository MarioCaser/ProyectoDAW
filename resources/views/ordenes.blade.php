@extends('layouts.app')
@section('estilos')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        
    </style>
@endsection

@section('content')

    <div class="bg-gray-100 w-full flex items-center justify-between">
        <a href="{{ route('historial') }}" class="flex-1 text-gray-800 hover:bg-gray-300 hover:text-gray-800 px-3 py-3 rounded-md text-sm font-bold text-center">Órdenes Abiertas</a>
        <a href="{{ route('historial_ordenes') }}" class="flex-1 text-gray-800 hover:bg-gray-300 hover:text-gray-800 px-3 py-3 rounded-md text-sm font-medium text-center">Historial de Órdenes</a>
        <a href="{{ route('historial_operaciones') }}" class="flex-1 text-gray-800 hover:bg-gray-300 hover:text-gray-800 px-3 py-3 rounded-md text-sm font-medium text-center">Historial de Operaciones</a>
    </div>

    <div class="text-gray-800 w-full" style="margin-right:0">
        {{-- <h3 class="text-2xl text-center text-center py-4">Órdenes Abiertas</h3> --}}
        <br>

        <style>
            .highlight-row:hover {
                background-color: #e5e7eb;
            }
        </style>
        
        <table class="table w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-gray-800 text-center">ID</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-800 text-center">Cantidad a Pagar</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-800 text-center">Moneda a Recibir</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-800 text-center">Precio</th>
                    {{-- <th class="py-2 px-4 bg-gray-200 text-gray-800 text-center">Moneda de Comisión</th> --}}
                    <th class="py-2 px-4 bg-gray-200 text-gray-800 text-center">Tipo de Orden</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-800 text-center">Cancelar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordenes as $orden)
                    <tr class="highlight-row">
                        <td class="py-2 px-4 text-center">{{ $orden->id }}</td>
                        <td class="text-center">
                            @php
                                $formattedCantidad = number_format($orden->cantidadPagar, 8);
                                $formattedCantidad = rtrim($formattedCantidad, '0');
                                $formattedCantidad = rtrim($formattedCantidad, '.');
                            @endphp
                            {{ $formattedCantidad . " " . strtoupper($orden->monedaPagar)}}
                        </td>
                        <td class="py-2 px-4 text-center">{{ strtoupper($orden->monedaRecibir) }}</td>
                        <td class="text-center">
                            @php
                                //$formattedCantidad = number_format($orden->precio, max(1, $orden->precio - floor($orden->precio)), '.', ',');
                            @endphp
                            {{ $orden->precio }}
                        </td>

                        
                        
                        
                        {{-- <td class="py-2 px-4 text-center">{{ $orden->monedaComisión }}</td> --}}
                        <td class="py-2 px-4 text-center">{{ $orden->tipoOrden }}</td>
                        <td class="py-2 px-4 text-center">
                            <form method="post" action="/cancelar_orden">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $orden->id }}">
                                <button type="submit" class="btn-cancel-order bg-amber-500 text-white py-1 px-2 rounded-lg">Cancelar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <div class="mt-4 lg:px-4 mb-4">
        {{ $ordenes->links() }}
    </div>    
@endsection