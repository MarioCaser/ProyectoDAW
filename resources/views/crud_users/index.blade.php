@extends('layouts.app')

@section('content')
    <h1 class="text-black">Lista de Usuarios</h1>
    <div style="padding-left:5%;margin-bottom:3%;">
        <table class="text-black mb-3">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Correo Electrónico</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('crud_users.show', $user) }}" class="text-blue-500 hover:text-blue-700 mr-2">Ver</a>
                            <a href="{{ route('crud_users.edit', $user) }}" class="text-green-500 hover:text-green-700 mr-2">Editar</a>
                            <form action="{{ route('crud_users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('crud_users.create') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20">Crear nuevo usuario</a>
    </div>
@endsection