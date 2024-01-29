@extends('layouts.app')

@section('content')
    <h1 class="text-black">Lista de productos contratados</h1>
    <div style="padding-left: 5%; margin-bottom: 3%;">
        <table class="text-black mb-3">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID usuario</th>
                    <th class="px-4 py-2">id producto</th>
                    <th class="px-4 py-2">Cantidad</th>
                    <th class="px-4 py-2">Fecha fin</th>
                    <th class="px-4 py-2">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($earn_contratados as $earnContratado)
                    <tr>
                        <td class="px-4 py-2">{{ $earnContratado->user_id }}</td>
                        <td class="px-4 py-2">{{ $earnContratado->id_producto_earn }}</td>
                        <td class="px-4 py-2">{{ $earnContratado->cantidad }}</td>
                        <td class="px-4 py-2">{{ $earnContratado->fecha_fin }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('crud_productos_contratados.show', $earnContratado) }}" class="text-blue-500 hover:text-blue-700 mr-2">Ver</a>
                            <a href="{{ route('crud_productos_contratados.edit', $earnContratado) }}" class="text-green-500 hover:text-green-700 mr-2">Editar</a>
                            <form action="{{ route('crud_productos_contratados.destroy', $earnContratado->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto contratado?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach  
            </tbody>
        </table>
        <a href="{{ route('crud_productos_contratados.create') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20">Crear nuevo producto contratado</a>
    </div>
@endsection