@extends('layouts.app')

@section('content')
<div style="padding-left: 5%;">
    <h1 class="text-black">Editar Usuario</h1>

    <form action="{{ route('crud_users.update', $user) }}" method="POST" class="text-black">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="rol" class="block mb-2 font-bold">Rol:</label>
            <select name="rol" id="rol" required class="w-full px-3 py-2 border rounded-lg">
                @foreach ($userPermissions as $id_rol)
                    <option value="{{ $id_rol }}">{{ $id_rol }}</option>
                @endforeach
            </select>
        </div> 
        <label for="content">Correo:</label><br>
        <input type="text" name="email" id="email" required class="border rounded-md p-2" value="{{ $user->email }}">
        <br><br>
        <label for="rating">contraseña:</label>
        <input type="text" name="password" id="password" required class="border rounded-md p-2">
        <br><br>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
    </form>
</div>


@if ($errors->any() || isset($error))
<div id="errorModal" class="fixed z-10 inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50" style="color:black;">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-bold mb-2">Error al crear el usuario</h2>
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