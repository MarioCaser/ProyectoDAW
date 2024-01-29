@extends('layouts.app')

@section('content')
    <h1 style="color: black; padding-left: 25px;">Detalle del producto</h1>
    <p style="color: black; padding-left: 25px;"><strong>ID:</strong> {{ $earn_disponible->id }} </p>
    <p style="color: black; padding-left: 25px;"><strong>Currency:</strong> {{ $earn_disponible->currency }}</p>
    <p style="color: black; padding-left: 25px;"><strong>APR:</strong> {{ $earn_disponible->APR }}</p>
    <p style="color: black; padding-left: 25px;"><strong>Duración (días):</strong> {{ $earn_disponible->duracion }}</p>
    <p style="color: black; padding-left: 25px;"><strong>Mínimo usuario:</strong> {{ number_format($earn_disponible->minimo_usuario, 8) }}</p>
    <p style="color: black; padding-left: 25px;"><strong>Máximo usuario:</strong> {{ number_format($earn_disponible->maximo_usuario, 8) }}</p>
    <p style="color: black; padding-left: 25px;"><strong>Cantidad disponible:</strong> {{ number_format($earn_disponible->cantidad_disponible, 8) }}</p>
    <p style="color: black; padding-left: 25px;margin-bottom:15px;"><strong>Disponible:</strong> {{ $earn_disponible->disponible ? 'Sí' : 'No' }}</p>
    <a href="{{ route('crud_productos.index') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20" style="margin-left: 25px; margin-bottom: 15px; margin-top: 15px;">Volver</a>
@endsection