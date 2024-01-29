@extends('layouts.app')

@section('estilos')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <style>
        .select2-search__field {
            width: 100%;
            border: none;
            outline: none;
            background-color: transparent;
            font-size: 14px;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            transition: border-color 0.3s ease;
            border-radius: 5px;
        }
    
        .select2-search__field:focus {
            border-color: #8a8a8a;
        }

        .select2-results__options::-webkit-scrollbar {
            width: 8px;
        }

        .select2-results__options::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .select2-results__options::-webkit-scrollbar-thumb {
            background: #888;
        }

        .select2-results__options::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    
@endsection

@section('content')
<main class="container mx-auto px-4 py-8 text-black">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Depositar</h1>
        
        <form action="{{ route('deposito') }}" method="POST">
            @csrf
            <div class="mb-6 custom-select">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="coin">Selecciona la moneda:</label>
                <select name="coin" id="coin" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    @foreach ($coins as $coin)
                        <option value="{{ $coin->symbol }}" data-image="{{ asset('images/criptologos/' . strtoupper($coin->symbol) . '.png') }}">
                            {{ $coin->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">Cantidad:</label>
                <input type="number" name="amount" id="amount" value="1" step="0.00000001" min="0.00000001" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500">
            </div>
            
            <button type="submit" class="w-full bg-indigo-500 text-white rounded-lg px-4 py-2 font-semibold">Depositar</button>
        </form>
        
        <script>
            $(document).ready(function() {
                $('#coin').select2({
                    templateResult: formatCoinOption
                });
            });
        
            function formatCoinOption(coin) {
                if (!coin.id) {
                    return coin.text;
                }
        
                var $coin = $(
                    '<span><img src="' + $(coin.element).data('image') + '" class="coin-logo" /> ' + coin.text + '</span>'
                );
        
                return $coin;
            }
        </script>
        
        <style>
            .coin-logo {
                width: 35px;
                height: auto;
                margin-right: 10px;
            }
            
            .custom-select .select2-container--default .select2-selection--single {
                height: 40px;
            }
            .select2-selection{}
            .select2-selection__rendered{
                margin-top: 5px;
            }
            .select2-selection__arrow{
                margin-top:5px;
            }
            ul li span{
                display: flex;
                flex-direction: row;
            }
        </style>
        <script>
            const input = document.getElementById('amount');
        
            input.addEventListener('keydown', function (event) {
                if (event.key === 'ArrowUp') {
                    event.preventDefault();
                    const currentValue = parseFloat(input.value);
                    const incrementedValue = (currentValue + 1).toFixed(8);
                    input.value = incrementedValue;
                }
                if (event.key === 'ArrowDown') {
                    event.preventDefault();
                    const currentValue = parseFloat(input.value);
                    const incrementedValue = (currentValue - 1).toFixed(8);
                    input.value = incrementedValue;
                }
            });

            const incrementButton = input.nextElementSibling;
            const decrementButton = input.previousElementSibling;

            incrementButton.addEventListener('click', function () {
                const currentValue = parseFloat(input.value);
                const incrementedValue = (currentValue + 1).toFixed(8);
                input.value = incrementedValue;
            });

            decrementButton.addEventListener('click', function () {
                const currentValue = parseFloat(input.value);
                const decrementedValue = (currentValue - 1).toFixed(8);
                input.value = decrementedValue;
            });
        </script>
    </div>
    @if(session('success'))
        <script>
            $(document).ready(function() {
                alert("Depósito realizado correctamente");
            });
        </script>
    @endif

    </main>



    <script>
        document.getElementById("depositarEnlace1").style.color = "#f59e0b";
      
      
        var enlace = document.getElementById("depositarEnlace1");
      
      enlace.addEventListener("mouseover", function() {
        this.style.color = "#f59e0b";
      });
      
      enlace.addEventListener("mouseout", function() {
        this.style.color = "#f59e0b";
      });
      </script>
@endsection
