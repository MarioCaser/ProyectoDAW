@extends('layouts.app')

@section('content')
    <h1 class="text-black">Lista de Comentarios</h1>
    <div style="padding-left:5%;margin-bottom:3%;">
        <table class="text-black mb-3">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Contenido</th>
                    <th class="px-4 py-2">Puntuación</th>
                    <th class="px-4 py-2">Usuario</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td class="px-4 py-2">{{ $comment->id }}</td>
                        <td class="px-4 py-2">{{ $comment->content }}</td>
                        <td class="px-4 py-2">{{ $comment->rating }}</td>
                        <td class="px-4 py-2">{{ $comment->user_id }}</td> <!-- Mostrar el ID del usuario -->
                        <td class="px-4 py-2">
                            <a href="{{ route('crud_comments.show', $comment) }}" class="text-blue-500 hover:text-blue-700 mr-2">Ver</a>
                            <a href="{{ route('crud_comments.edit', $comment) }}" class="text-green-500 hover:text-green-700 mr-2">Editar</a>
                            <form action="{{ route('crud_comments.destroy', $comment) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este comentario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('crud_comments.create') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20">Crear nuevo comentario</a>
    </div>
@endsection