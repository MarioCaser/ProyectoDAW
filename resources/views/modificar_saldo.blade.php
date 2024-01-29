@extends('layouts.app')

@section('content')
    <form action="{{ route('actualizar_saldo') }}" method="POST" style="color:black;margin: 2.5%;">
        @csrf
        <input type="hidden" name="id_usuario" value="{{ $saldo->user_id }}" style="border:1px solid black;">
        <input type="hidden" name="moneda" value="{{ $saldo->currency }}" style="border:1px solid black;">
        <label for="balance">Balance:</label>
        <input type="text" name="balance" value="{{ $saldo->balance }}" style="border:1px solid black;">
        <br>
        <label for="saldo_bloqueado">Saldo Bloqueado:</label>
        <input type="text" name="saldo_bloqueado" value="{{ $saldo->saldo_bloqueado }}" style="border:1px solid black;">
        <br>
        <input type="submit" value="Actualizar" class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded-full">
    </form>
@endsection
