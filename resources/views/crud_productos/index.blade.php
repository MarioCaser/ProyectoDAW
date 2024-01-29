@extends('layouts.app')

@section('content')
    <h1 class="text-black">Lista de productos disponibles</h1>
    <div style="padding-left: 5%; margin-bottom: 3%;">
        <table class="text-black mb-3">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Currency</th>
                    <th class="px-4 py-2">APR</th>
                    <th class="px-4 py-2">Duración</th>
                    <th class="px-4 py-2">Disponible</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($earn_disponibles as $earnDisponible)
                    <tr>
                        <td class="px-4 py-2">{{ $earnDisponible->id }}</td>
                        <td class="px-4 py-2">{{ $earnDisponible->currency }}</td>
                        <td class="px-4 py-2">{{ $earnDisponible->APR }}</td>
                        <td class="px-4 py-2">{{ $earnDisponible->duracion }}</td>
                        <td class="px-4 py-2">{{ $earnDisponible->disponible ? 'Sí' : 'No' }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('crud_productos.show', $earnDisponible) }}" class="text-blue-500 hover:text-blue-700 mr-2">Ver</a>
                            <a href="{{ route('crud_productos.edit', $earnDisponible) }}" class="text-green-500 hover:text-green-700 mr-2">Editar</a>
                            <form action="{{ route('crud_productos.destroy', $earnDisponible) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este earn_disponible?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('crud_productos.create') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20">Crear nuevo earn_disponible</a>
    </div>
@endsection