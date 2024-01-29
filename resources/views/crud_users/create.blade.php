@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4" style="color:black;">Crear Usuario</h1>

    <form action="{{ route('crud_users.store') }}" method="POST" class="max-w-md" style="color:black;margin-left: 4%;">
        @csrf

        <div class="mb-4">
            <label for="rol" class="block mb-2 font-bold">Rol:</label>
            <select name="rol" id="rol" required class="w-full px-3 py-2 border rounded-lg">
                @foreach ($userPermissions as $id_rol)
                    <option value="{{ $id_rol }}">{{ $id_rol }}</option>
                @endforeach
            </select>
        </div>        

        <div class="mb-4">
            <label for="email" class="block mb-2 font-bold">Correo Electrónico:</label>
            <input type="email" name="email" id="email" required class="w-full px-3 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-2 font-bold">Contraseña:</label>
            <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded-lg">
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Guardar</button>
    </form>

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
