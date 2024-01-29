@extends('layouts.app')

@section('content')
<div style="padding-left: 5%;">
    <h1 class="text-black">Crear earn_disponible</h1>

    <form action="{{ route('crud_productos.store') }}" method="POST" class="text-black">
        @csrf

        <div class="mb-4">
            <label for="currency" class="block mb-2 font-bold">Moneda:</label>
            <select name="currency" id="currency" required class="px-3 py-2 border rounded-lg">
                @foreach ($coins as $coin)
                    <option value="{{ $coin->symbol }}">{{ $coin->symbol }}</option>
                @endforeach
            </select>
        </div> 

        <label for="APR">APR:</label><br>
        <input type="number" name="APR" id="APR" step="0.01" required class="border rounded-md p-2">
        <br><br>

        <label for="APR">Duración (días):</label><br>
        <input type="number" step="1" name="duracion" id="duracion" required class="border rounded-md p-2">
        <br><br>

        <label for="APR">Cantidad disponible:</label><br>
        <input step="0.00000001" type="number" name="cantidad_disponible" id="cantidad_disponible" required class="border rounded-md p-2">
        <br><br>

        <label for="APR">Máximo usuario:</label><br>
        <input step="0.00000001" type="number" name="maximo_usuario" id="maximo_usuario" required class="border rounded-md p-2">
        <br><br>

        <label for="APR">Mínimo usuario:</label><br>
        <input type="number" step="0.00000001" name="minimo_usuario" id="minimo_usuario" required class="border rounded-md p-2">
        <br><br>

        <label for="disponible">Disponibilidad:</label><br>
        <select name="disponible" id="disponible" required class="border rounded-md p-2">
            <option value="1">Disponible</option>
            <option value="0">No disponible</option>
        </select>
        <br><br>

        <!-- Agrega los campos adicionales aquí -->

        <button type="submit" class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded-full mb-4">Crear</button>
    </form>
</div>

@if ($errors->any() || isset($error))
<div id="errorModal" class="fixed z-10 inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50" style="color:black;">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-bold mb-2">Error al crear earn_disponible</h2>
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