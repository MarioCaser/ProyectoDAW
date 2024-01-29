@extends('layouts.app')

@section('content')
<div style="padding-left: 5%;">
    <h1 class="text-black">Añadir moneda</h1>

    <form action="{{ route('crud_monedas.store') }}" method="POST" class="text-black">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="name" id="name" step="0.01" required class="border rounded-md p-2">
        <br><br>

        <label>Símbolo</label><br>
        <input type="text" name="symbol" id="symbol" required class="border rounded-md p-2">
        <br><br>

        <label>Logo</label><br>
        <input type="text" name="logo" id="logo" required class="border rounded-md p-2">
        <br><br>

        <label>Tipo:</label><br>
        <select name="type" id="type" required class="border rounded-md p-2">
            <option value="crypto" selected>Cripto</option>
            <option value="fiat">Fiat</option>
        </select>
        <br><br>

        <label>Disponibilidad:</label><br>
        <select name="disponible" id="disponible" required class="border rounded-md p-2">
            <option value="1">Disponible</option>
            <option value="0">No disponible</option>
        </select>
        <br><br>

        <label>Descripción</label><br>
        <input type="text" name="descripcion" id="descripcion" required class="border rounded-md p-2">
        <br><br>

        <!-- Agrega los campos adicionales aquí -->

        <button type="submit" class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded-full mb-4">Crear</button>
    </form>
</div>

@if (session('error'))
    <script>
        let error = "{{ session('error') }}";
        alert(error);
    </script>
@endif


@endsection