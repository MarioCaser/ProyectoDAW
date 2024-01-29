
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
        .contenido {
            color: white;
        }
        .bg-custom-color {
            background-color: #f7a600;
        }
        .mb-6{
            margin-top: 1vw;
        }

    </style>
@endsection

@section('content')

@if(session()->has('resultado'))
    <script>
        alert('{{ session('resultado') }}');
    </script>
@endif



<script>
    var results = `<?php echo json_encode($datos); ?>`;
    // Ahora puedes acceder a los resultados desde JavaScript
    console.log(results);
</script>


<table class="min-w-full divide-y divide-gray-200">
  <thead>
    <tr>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Rol</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Currency</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Balance</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Saldo Bloqueado</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Funciones</th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($datos as $result)
    <tr>
      <td class="px-6 py-4 whitespace-nowrap">{{ $result->id }}</td>
      <td class="px-6 py-4 whitespace-nowrap">{{ $result->email }}</td>
      <td class="px-6 py-4 whitespace-nowrap">{{ $result->id_rol }}</td>
      <td class="px-6 py-4 whitespace-nowrap">{{ $result->currency }}</td>
      <td class="px-6 py-4 whitespace-nowrap">{{ $result->balance }}</td>
      <td class="px-6 py-4 whitespace-nowrap">{{ $result->saldo_bloqueado }}</td>
      <td class="px-6 py-4 whitespace-nowrap">
        {{-- <form action="" method="post"></form> --}}
        <form action="/modificar_saldo" method="post">
            @csrf
            <input type="hidden" name="id_usuario" value="{{ $result->id }}">
            <input type="hidden" name="moneda" value="{{ $result->currency }}">
            <input type="submit" value="Modificar" style="cursor: pointer;">
        </form>
        <form action="/eliminar_saldo" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este saldo?')">
            @csrf
            <input type="hidden" name="id_usuario" value="{{ $result->id }}">
            <input type="hidden" name="moneda" value="{{ $result->currency }}">
            <input type="submit" value="eliminar" style="cursor: pointer;">
        </form>
      </td>
    </tr>
    @endforeach
</tbody>

</table>

<div style="margin:2%;">
    <a href="{{ route('crear_saldo') }}" class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded-full">
        Añadir saldo
    </a>
  </div>
  
    
@endsection

