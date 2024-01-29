@extends('layouts.app')

@section('content')
<div style="padding-left: 5%;">
    <h1 class="text-black">Editar moneda</h1>

    <form action="{{ route('crud_monedas.update', $coins) }}" method="POST" class="text-black">
        @csrf
        @method('PUT')

        <label>Nombre:</label><br>
        <input type="text" name="name" id="name" required class="border rounded-md p-2" value="{{ $coins->name }}">
        <br><br>

        <label>Logo:</label><br>
        <input type="text" name="logo" id="logo" required class="border rounded-md p-2" value="{{ $coins->logo }}">
        <br><br>

        <label>Descripcion:</label><br>
        <input type="text" name="descripcion" id="descripcion" required class="border rounded-md p-2" value="{{ $coins->descripcion }}">
        <br><br>

        <label>Tipo:</label><br>
        <select name="type" id="type" required class="border rounded-md p-2">
            <option value="crypto" {{ $coins->type == "crypto" ? 'selected' : '' }}>Cripto</option>
            <option value="fiat" {{ !$coins->type  == "fiat" ? 'selected' : '' }}>Fiat</option>
        </select>
        <br><br>

        <label>Disponibilidad:</label><br>
        <select name="disponible" id="disponible" required class="border rounded-md p-2">
            <option value="1" {{ $coins->disponible ? 'selected' : '' }}>Disponible</option>
            <option value="0" {{ !$coins->disponible ? 'selected' : '' }}>No disponible</option>
        </select>
        <br><br>

        <!-- Agrega los campos adicionales aquí -->

        <button type="submit" class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded-full mb-4">Actualizar</button>
    </form>
</div>

@if ($errors->any() || isset($error))
<div id="errorModal" class="fixed z-10 inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50" style="color:black;">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-bold mb-2">Error al modificar la moneda</h2>
        <p>{{ $errors->first() ?? $error }}</p>
        <button id="closeErrorModal" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">Cerrar</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var errorModal = document.getElementById('errorModal');
        var closeErrorModal = document.getElementById('closeErrorModal');

        errorModal.classList.remove('hidden');

        closeErrorModal.addEventListener('click', function() {
            errorModal.classList.add('hidden');
        });
    });
</script>
@endif

@endsection