@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4" style="color:black;">Crear Comentario</h1>

    <form action="{{ route('crud_comments.store') }}" method="POST" class="max-w-md" style="color:black;">
        @csrf
        <div class="mb-4">
            <label for="content" class="block mb-2 font-bold">Contenido:</label>
            <textarea name="content" id="content" rows="3" required class="w-full px-3 py-2 border rounded-lg"></textarea>
        </div>

        <div class="mb-4">
            <label for="rating" class="block mb-2 font-bold">Puntuación:</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required class="w-full px-3 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="user_id" class="block mb-2 font-bold">Usuario:</label>
            <select name="user_id" id="user_id" required class="w-full px-3 py-2 border rounded-lg">
                @foreach ($users as $id => $email)
                    <option value="{{ $id }}">{{ $id }} - {{ $email }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Guardar</button>
    </form>
@endsection
