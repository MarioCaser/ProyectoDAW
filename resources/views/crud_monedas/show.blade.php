@extends('layouts.app')

@section('content')
    <h1 style="color: black; padding-left: 25px; font-size: 24px; margin-bottom: 10px; margin-top: 15px;">Detalles de la moneda</h1>
    <p style="color: black; padding-left: 25px;"><strong>Nombre:</strong> {{ $coins->name }}</p>
    <p style="color: black; padding-left: 25px;"><strong>Símbolo:</strong> {{ $coins->symbol }}</p>
    <p style="color: black; padding-left: 25px;"><strong>Logo:</strong> {{ $coins->logo }}</p>
    <p style="color: black; padding-left: 25px;"><strong>Tipo:</strong> {{ $coins->type }}</p>
    <p style="color: black; padding-left: 25px;"><strong>Disponible:</strong> {{ $coins->disponible ? 'Sí' : 'No' }}</p>
    <p style="color: black; padding-left: 25px;margin-bottom:15px;"><strong>Descripción:</strong> {{ $coins->descripcion }}</p>
    <a href="{{ route('crud_monedas.index') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20" style="margin-left: 25px; margin-bottom: 15px; margin-top: 15px;">Volver</a>
@endsection