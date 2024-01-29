@extends('layouts.app')
@section('estilos')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{
            background-color: white;
            color: black;
        }
        main{
            color: black;
        }
        /* .contenido {
            color: white;
        } */
        .bg-custom-color {
            background-color: #f7a600;
        }
        .mb-6{
            margin-top: 1vw;
        }

    </style>
@endsection

@section('content')
<form action="{{ route('guardar_saldo') }}" method="POST" style="margin: 2.5%;width:30%;">
        @csrf
        <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="user_id">
            Usuario
        </label>
        <select id="user_id" name="user_id" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->email }}</option>
            @endforeach
        </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="currency">
                Moneda
            </label>
            <select name="currency" id="currency" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                @foreach ($coins as $coin)
                    <option value="{{ $coin->symbol }}">{{ $coin->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="balance">
            Balance
        </label>
        <input type="number" id="balance" name="balance" class="form-input rounded-md shadow-sm mt-1 block w-full" required step="any">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="saldo_bloqueado">
                Saldo Bloqueado
            </label>
            <input type="number" id="bloqueado" name="bloqueado" class="form-input rounded-md shadow-sm mt-1 block w-full" required step="any">
        </div>
        <button type="submit" class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded-full">Añadir</button>
    </form>
  
@endsection