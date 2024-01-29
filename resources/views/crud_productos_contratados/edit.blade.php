@extends('layouts.app')

@section('content')
<div style="padding-left: 5%;">
    <h1 class="text-3xl font-bold text-black my-4">Editar producto contratado</h1>

    <form action="{{ route('crud_productos_contratados.update', ['earn_contratados' => $earn_contratados]) }}" method="POST" class="text-black">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-2 font-bold">Id usuario:</label>
            <select name="user_id" id="user_id" required class="px-3 py-2 border rounded-lg">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $earn_contratados->user_id ? 'selected' : '' }}>{{ $user->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-bold">Id producto:</label>
            <select name="id_producto_earn" id="id_producto_earn" required class="px-3 py-2 border rounded-lg">
                @foreach ($earn_disponible as $earn_disponibl)
                    <option value="{{ $earn_disponibl->id }}" {{ $earn_disponibl->id == $earn_contratados->id_producto_earn ? 'selected' : '' }}>{{ $earn_disponibl->id }}</option>
                @endforeach
            </select>
        </div> 

        <label>Cantidad:</label><br>
        <input type="number" name="cantidad" id="cantidad" step="0.00000001" required class="border rounded-md p-2" value="{{ number_format($earn_contratados->cantidad, 8) }}">
        <br><br>

        

        <label for="APR">Fecha fin:</label><br>
        <input type="date" name="fecha_fin" id="fecha_fin" required class="border rounded-md p-2" value="{{ $earn_contratados->fecha_fin }}">
        <br><br>

        {{-- <label for="disponible">Disponibilidad:</label><br>
        <select name="disponible" id="disponible" required class="border rounded-md p-2">
            <option value="1" {{ $earn_disponible->disponible ? 'selected' : '' }}>Disponible</option>
            <option value="0" {{ !$earn_disponible->disponible ? 'selected' : '' }}>No disponible</option>
        </select>
        <br><br> --}}


        <!-- Agrega los campos adicionales aquí -->

        <button type="submit" class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded-full mb-4">Actualizar</button>
    </form>
</div>

@if ($errors->any() || isset($error))
<div id="errorModal" class="fixed z-10 inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50" style="color:black;">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-bold mb-2">Error al modificar earn_disponible</h2>
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