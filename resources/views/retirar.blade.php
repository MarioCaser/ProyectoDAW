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

    <div class="page-indicator">
        <p>Estás en: <a href="/resumen" class="text-amber-500 hover:text-amber-500">Resumen</a> > Retirar</p>
    </div>
    
    
    {{-- @php print_r($saldoSpot) @endphp --}}
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Retirar</h1>
        
        <form action="{{ route('retiro') }}" method="POST" id="retiroForm">
            @csrf
            <div class="mb-6 custom-select">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="coin">Selecciona la moneda:</label>
                <select name="coin" id="coin" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    @foreach ($saldoSpot as $saldo)
                        <option value="{{ $saldo->currency }}" data-image="{{ asset('images/criptologos/' . strtoupper($saldo->currency) . '.png') }}" data-balance="{{ $saldo->balance }}">
                            {{ $saldo->name }} (Balance: {{ $saldo->balance }})
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">Cantidad:</label>
                <input type="number" name="amount" id="amount" value="" step="0.00000001" min="0.00000001" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                <label id="balanceError" class="text-red-500"></label>
            </div>
    
            <button type="submit" class="w-full bg-indigo-500 text-white rounded-lg px-4 py-2 font-semibold">Retirar</button>
        </form>
    
        <script>
            const amountInput = document.getElementById('amount');
            const balanceErrorLabel = document.getElementById('balanceError');
    
            amountInput.addEventListener('input', function() {
                balanceErrorLabel.textContent = '';
    
                const coinSelect = document.getElementById('coin');
                const selectedOption = coinSelect.options[coinSelect.selectedIndex];
                const selectedBalance = parseFloat(selectedOption.dataset.balance);
                const enteredAmount = parseFloat(amountInput.value);
    
                if (enteredAmount > selectedBalance) {
                    balanceErrorLabel.textContent = 'No tienes suficiente saldo en esta moneda';
                }
            });
    
            document.getElementById('retiroForm').addEventListener('submit', function(event) {
                const coinSelect = document.getElementById('coin');
                const selectedOption = coinSelect.options[coinSelect.selectedIndex];
                const selectedBalance = parseFloat(selectedOption.dataset.balance);
                const enteredAmount = parseFloat(amountInput.value);
    
                if (enteredAmount > selectedBalance) {
                    event.preventDefault();
                    balanceErrorLabel.textContent = 'No tienes suficiente saldo en esta moneda';
                } else {
                    // Realizar el retiro utilizando los valores del formulario
                    const formData = new FormData(event.target);
                    const coin = formData.get('coin');
                    const amount = formData.get('amount');
    
                    // Realizar las acciones necesarias para el retiro de saldo
                    // utilizando los valores de "coin" y "amount"
    
                    // Ejemplo de envío de solicitud AJAX al servidor
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('retiro') }}', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Retiro exitoso, realizar acciones adicionales si es necesario
                            } else {
                                // Error en el retiro, mostrar mensaje de error o realizar acciones adicionales
                            }
                        }
                    };
                    xhr.send(`coin=${coin}&amount=${amount}`);
                }
            });
        </script>
    
        <script>
            document.getElementById('retiroForm').addEventListener('submit', function(event) {
                const coinSelect = document.getElementById('coin');
                const selectedOption = coinSelect.options[coinSelect.selectedIndex];
                const selectedBalance = parseFloat(selectedOption.dataset.balance);
                const amountInput = document.getElementById('amount');
                const enteredAmount = parseFloat(amountInput.value);
    
                if (enteredAmount > selectedBalance) {
                    event.preventDefault();
                    const balanceErrorLabel = document.getElementById('balanceError');
                    balanceErrorLabel.textContent = 'No tienes suficiente saldo en esta moneda';
                }
            });
            document.getElementById('retiroForm').addEventListener('input', function(event) {
                const coinSelect = document.getElementById('coin');
                const selectedOption = coinSelect.options[coinSelect.selectedIndex];
                const selectedBalance = parseFloat(selectedOption.dataset.balance);
                const amountInput = document.getElementById('amount');
                const enteredAmount = parseFloat(amountInput.value);
    
                if (enteredAmount > selectedBalance) {
                    event.preventDefault();
                    const balanceErrorLabel = document.getElementById('balanceError');
                    balanceErrorLabel.textContent = 'No tienes suficiente saldo en esta moneda';
                }
            });
        </script>
        
        
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
                alert("Retiro realizado correctamente");
            });
        </script>
    @endif

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if (session('error'))
        <div class="alert alert-danger" style="color:transparent;">
            {{ session('error') }}
        </div>
    @endif --}}


    </main>
@endsection