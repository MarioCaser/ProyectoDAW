@extends('layouts.app')

@section('content')
    <h1 style="color:black;padding-left:25px;">Detalle del Comentario</h1>

    <p style="color:black;padding-left:25px;"><strong>ID:</strong> {{ $comment->id }}</p>
    <p style="color:black;padding-left:25px;"><strong>Contenido:</strong> {{ $comment->content }}</p>
    <p style="color:black;padding-left:25px;margin-bottom:15px;"><strong>Puntuación:</strong> {{ $comment->rating }}</p>

    <a href="{{ route('crud_comments.index') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20" style="margin-left:25px;margin-bottom:15px;">Volver</a>
@endsection