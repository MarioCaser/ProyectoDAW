
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
        main{
            background-color: white;
            color:black;
        }

    </style>
@endsection

@section('content')

@if(session()->has('resultado'))
    <script>
        alert('{{ session('resultado') }}');
    </script>
@endif





<table style="color:black;background-color:white;margin-top:35px;margin-left:35px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{print_r($usuarios)}} --}}
        <form action="/chatAdmin" method="POST">
            @csrf <!-- Agrega esta línea para incluir el token CSRF -->
            @foreach($usuarios as $usuario)
                @php
                    $user = App\Models\User::find($usuario->id_usuario);
                    $email = $user->email;
                @endphp
                <tr>
                    <td>
                        <input style="cursor:pointer;" type="submit" name="id_usuario" value="{{$usuario->id_usuario}}"
                        class="@if($usuario->tieneMensajeNoLeido) font-bold @else font-normal @endif">
                    </td>
                    <td>
                        <label>{{ $email }}</label>
                    </td>
                </tr>
            @endforeach
        </form>
    </tbody>
</table>





<script>
    var results = `<?php echo json_encode($usuarios); ?>`;
    // Ahora puedes acceder a los resultados desde JavaScript
    console.log(results);
</script>

  
    
@endsection