@extends('layouts.app')

@section('content')
<h1 style="font-size: 1.7rem; color: black; margin-left: 25px;">Detalles del producto</h1>
    <p style="color: black; padding-left: 25px;"><strong>ID usuario:</strong> {{ $earn_contratados->user_id }} </p>
    <p style="color: black; padding-left: 25px;"><strong>id_producto:</strong> {{ $earn_contratados->id_producto_earn }}</p>
    <p style="color: black; padding-left: 25px;"><strong>APR:</strong> {{ $earn_contratados->cantidad }}</p>
    <p style="color: black; padding-left: 25px;margin-bottom:15px;"><strong>Fecha fin:</strong> {{ $earn_contratados->fecha_fin }}</p>
    <a href="{{ route('crud_productos_contratados.index') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20" style="margin-left: 25px; margin-bottom: 15px; margin-top: 15px;">Volver</a>
@endsection