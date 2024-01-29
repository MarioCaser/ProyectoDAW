@extends('layouts.app')
@section('estilos')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        main{
            background-color: white;
            color:black;
        }
    </style>
@endsection

@section('content')
<script>

var simbolo = '';

</script>
<div class="mb-4 py-5 pl-10">
    <label for="search" class="sr-only">Buscar</label>
    <input id="search" type="text" placeholder="Buscar" class="border border-gray-300 rounded-md px-4 py-2">
  </div>
    <div class="container mx-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moneda</th>
                    {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Variación 24h</th> --}}
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">cambio 24h</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio ($)</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Máximo 24h</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Mínimo 24h</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Compra</th>
                    <!-- Agrega aquí las columnas adicionales que deseas mostrar -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                    $url = "https://api.binance.com/api/v3/ticker/24hr";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($curl);
                    curl_close($curl);

                    $data = json_decode($response, true);




                    use App\Models\coins;

                    $coins = coins::all();
                    $symbols = [];

                    foreach ($coins as $coin) {
                        $symbol = strtoupper($coin->symbol);
                        $symbols[] = $symbol . "USDT";
                    }

                    // Eliminar la cadena "USDTUSDT" si existe
                    if (($key = array_search("USDTUSDT", $symbols)) !== false) {
                        unset($symbols[$key]);
                    }


                    foreach ($data as $crypto) {
                        if (in_array($crypto['symbol'], $symbols)) {
                            $symbol = substr($crypto['symbol'], 0, -4);
                            $isFavorite = session('favorites', [])[$symbol] ?? false;
                ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span id="star_{{ $symbol }}" class="text-gray-500 cursor-pointer" onclick="toggleFavorite('{{ $symbol }}')">
                                {{-- &#9734; --}}
                                &#9733;
                            </span>
                            <script>
                                simbolo = "{{ $symbol }}";
                                if (localStorage.getItem(simbolo)){
                                    document.getElementById( "star_{{$symbol}}").classList.remove('text-gray-500');
                                    document.getElementById( "star_{{$symbol}}").classList.add('text-yellow-500');
                                    // document.getElementById( "star_{{$symbol}}").classList.add = "yellow";
                                }
                            </script>
                            <img src="images/criptologos/{{ substr($crypto['symbol'], 0, -4) }}.png" alt="logo" width="30px" class="inline-block">
                            <span class="ml-2">{{ substr($crypto['symbol'], 0, -4) }}</span>
                        </td>                        
                        {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $crypto['priceChange'] }}</td> --}}
                        <td class="px-6 py-4 whitespace-nowrap {{ $crypto['priceChangePercent'] > 0 ? 'text-green-500' : 'text-red-500' }} hidden sm:table-cell">{{ number_format($crypto['priceChangePercent'], 2) }}%</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php
                                $formattedPrice = number_format($crypto['weightedAvgPrice'], 6 - strlen(floor($crypto['weightedAvgPrice'])), '.', ',');
                                echo rtrim($formattedPrice, '0');
                            ?>
                            {{-- &nbsp;$ --}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                            <?php
                                $formattedPrice = number_format($crypto['highPrice'], 6 - strlen(floor($crypto['highPrice'])), '.', ',');
                                echo rtrim($formattedPrice, '0');
                            ?>
                            {{-- &nbsp;$ --}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                            <?php
                                $formattedPrice = number_format($crypto['lowPrice'], 6 - strlen(floor($crypto['lowPrice'])), '.', ',');
                                echo rtrim($formattedPrice, '0');
                            ?>
                            {{-- &nbsp;$ --}}
                        </td>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="/convert/{{substr($crypto['symbol'], 0, -4)}}/USDT" class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded">
                                Compra
                            </a>
                        </th>                                                <!-- Agrega aquí las celdas adicionales que deseas mostrar -->                        
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>


    <script>
        document.getElementById("search").addEventListener("input", function() {
          const input = document.getElementById("search");
          const filter = input.value.toUpperCase();
          const rows = document.getElementsByTagName("tr");
      
          for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            let shouldDisplay = false;
      
            for (let j = 0; j < cells.length - 1; j++) {
              const cell = cells[j];
              if (cell) {
                const text = cell.textContent || cell.innerText;
                if (text.toUpperCase().indexOf(filter) > -1) {
                  shouldDisplay = true;
                  break;
                }
              }
            }
      
            rows[i].style.display = shouldDisplay ? "" : "none";
          }
        });
      </script>


<script>
    function toggleFavorite(symbol) {
        const star = document.getElementById('star_' + symbol);

        if (star.classList.contains('text-gray-500')) {
            star.classList.remove('text-gray-500');
            star.classList.add('text-yellow-500');
            addFavorite(symbol);
        } else {
            star.classList.remove('text-yellow-500');
            star.classList.add('text-gray-500');
            removeFavorite(symbol);
        }
    }

    function addFavorite(symbol) {
        localStorage.setItem(symbol, true);
        console.log(localStorage.getItem(symbol));
    }

    function removeFavorite(symbol) {
        localStorage.removeItem(symbol);
        console.log(localStorage.getItem(symbol));
    }

    document.addEventListener('DOMContentLoaded', function() {
        const favorites = JSON.parse(localStorage.getItem('favorites') || '{}');

        Object.keys(favorites).forEach(symbol => {
            const star = document.getElementById('star_' + symbol);
            if (star) {
                star.classList.remove('text-gray-500');
                star.classList.add('text-yellow-500');
            }
        });
    });

    var objetoGuardado = JSON.parse(localStorage.getItem('BTC'));
    console.log(objetoGuardado);

</script>

<script>
    document.getElementById("preciosEnlace1").style.color = "#f59e0b";
  
  
    var enlace = document.getElementById("preciosEnlace1");
  
  enlace.addEventListener("mouseover", function() {
    this.style.color = "#f59e0b";
  });
  
  enlace.addEventListener("mouseout", function() {
    this.style.color = "#f59e0b";
  });
  </script>

@endsection
