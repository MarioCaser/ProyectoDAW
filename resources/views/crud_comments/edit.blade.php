@extends('layouts.app')

@section('content')
<div style="padding-left: 5%;">
    <h1 class="text-black">Editar Comentario</h1>

    <form action="{{ route('crud_comments.update', $comment) }}" method="POST" class="text-black">
        @csrf
        @method('PUT')
        
        <label for="content">Contenido:</label><br>
        <textarea name="content" id="content" rows="3" required class="border rounded-md p-2">{{ $comment->content }}</textarea>
        <br><br>
        <label for="rating">Puntuación:</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required value="{{ $comment->rating }}" class="border rounded-md p-2">
        <br><br>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
    </form>
</div>
@endsection
