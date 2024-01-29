@extends('layouts.app')

@section('content')
    <h1 style="color:black;padding-left:25px;">Detalle del Usuario</h1>
    <p style="color:black;padding-left:25px;"><strong>ID:</strong> {{ $user->id }} </p>
    <p style="color:black;padding-left:25px;"><strong>Rol:</strong> {{ $user->id_rol }}</p>
    <p style="color:black;padding-left:25px;margin-bottom:15px;"><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
    <a href="{{ route('crud_users.index') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20" style="margin-left:25px;margin-bottom:15px;margin-top:15px;">Volver</a>
@endsection