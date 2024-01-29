@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold text-black mt-4">Lista de productos disponibles</h1>
    <div style="padding-left: 5%; margin-bottom: 3%;">
        <input type="text" id="searchInput" placeholder="Buscar" class="m-2 px-4 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:bg-white focus:shadow-outline">
        <table id="coinsTable" class="text-black mb-3">
            <thead>
                <tr>
                    {{-- <th class="px-4 py-2">ID</th> --}}
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Símbolo</th>
                    <th class="px-4 py-2">Logo</th>
                    <th class="px-4 py-2">Tipo</th>
                    <th class="px-4 py-2">Disponible</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coins as $coin)
                    <tr>
                        {{-- <td class="px-4 py-2 text-center">{{ $coin->id }}</td> --}}
                        <td class="px-4 py-2 text-center">{{ $coin->name }}</td>
                        <td class="px-4 py-2 text-center">{{ $coin->symbol }}</td>
                        <td class="px-4 py-2 text-center">{{ $coin->logo }}</td>
                        <td class="px-4 py-2 text-center">{{ $coin->type }}</td>
                        <td class="px-4 py-2 text-center">{{ $coin->disponible ? 'Sí' : 'No' }}</td>
                        <td class="px-4 py-2 text-center">{{ $coin->descripcion }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('crud_monedas.show', $coin) }}" class="text-blue-500 hover:text-blue-700 mr-2">Ver</a>
                            <a href="{{ route('crud_monedas.edit', $coin) }}" class="text-green-500 hover:text-green-700 mr-2">Editar</a>
                            <form action="{{ route('crud_monedas.destroy', $coin) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este earn_disponible?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('crud_monedas.create') }}" class="text-white bg-black rounded-full px-4 py-2 mb-20">Crear nueva moneda</a>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const coinsTable = document.getElementById('coinsTable');

        searchInput.addEventListener('input', function() {
            const searchText = searchInput.value.toLowerCase();
            const rows = coinsTable.getElementsByTagName('tr');

            for (let row of rows) {
                const cells = row.getElementsByTagName('td');
                let shouldShowRow = false;

                for (let cell of cells) {
                    if (cell.textContent.toLowerCase().includes(searchText)) {
                        shouldShowRow = true;
                        break;
                    }
                }

                row.style.display = shouldShowRow ? '' : 'none';
            }
        });
    </script>
@endsection