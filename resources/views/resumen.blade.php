@extends('layouts.app')
@section('estilos')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .contenedor{
            width: 100%;
            display: flex;
        }
        .menuIzquierda{
            width: 250px;
            /* border:1px solid black; */
        }
        .menuDerecha{
            /* border:1px solid black; */
            width: 100%;
        }
        .opciones:hover{
            cursor: pointer;
            background-color: lightgrey;
        }
        canvas {
            width: 100px;
            height: 100px;
        }

    </style>
@endsection

@section('content')
    <div class="contenedor">
        <div class="menuIzquierda">
            <h3 class="ml-5 mt-5 mb-2 text-xl">Saldos</h3>
            <canvas id="myChart" style=""></canvas>
        </div>
        <div class="menuDerecha pl-4" >
            <h3 class="ml-5 mt-5 text-xl">Resumen de cuenta</h3>
            <div style="display:flex;justify-content:space-between;margin-bottom:20px;margin-top:20px;padding-right:10px;">
                <div style="display:flex;flex-direction:column">
                    {{-- <div class="flex">
                        <h2>0.00&nbsp;</h2>
                        <label>EUR</label>
                    </div>
                    <div style="display:flex;">
                        <label>≈ </label>
                        <h2>0.00000000</h2>
                        <label>BTC</label>
                    </div> --}}
                </div>
                <div>
                    <div class="flex gap-4">
                        <button class="py-2 px-4 bg-amber-500 text-black rounded-lg hover:bg-amber-400" onclick="window.location.href='/depositar'">Depositar</button>
                        <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg" onclick="window.location.href='/resumen/retirar'">Retirar</button>
                        {{-- <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg">Enviar a otros usuarios</button> --}}
                        <button class="py-2 px-4 bg-transparent text-black border border-gray-300 hover:text-amber-400 hover:border-amber-400 rounded-lg" onclick="window.location.href='/convert'">Convertir</button>
                    </div>
                </div>
            </div>
            
            {{-- <label class="text-lg mb-2">Mis activos</label> --}}

            <div class="opciones" style="display:flex;width:100%;justify-content:space-between;align-items:center;" id="spot">
                <div class="flex">
                    <img src="images/spot.svg" alt="spot">
                    <h2>Spot</h2>
                </div>
                <div>
                    <div style="display:flex;">
                        {{-- <h2>0.00</h2>
                        <label>EUR</label> --}}
                    </div>
                    <div style="display:flex;">
                        {{-- <label>≈ </label>
                        <h2>0.00000000</h2>
                        <label>BTC</label> --}}
                        <br><br>
                    </div>
                </div>

                <div style="display:flex;justify-content:space-between;">
                    {{-- <div>
                        <img src="images/depositar.png" alt="depositar" width="30px">
                    </div>
                    <div>
                        <img src="images/retirar.png" alt="retirar" width="30px">
                    </div>
                    <div>
                        <img src="images/convertir.png" alt="convertir" width="30px">
                    </div> --}}
                </div>




            </div>



            <div class="opciones" style="display:flex;width:100%;justify-content:space-between;align-items:center;" id="earn">
                <div class="flex">
                    <img src="images/cerdo.png" alt="spot" width="30px">
                    <h2>productos contratados</h2>
                </div>
                <div>
                    <div style="display:flex;">
                        <h2></h2>
                        <label></label>
                    </div>
                    <div style="display:flex;">
                        <label> </label>
                        <h2></h2>
                        <label></label>
                        <br><br>
                    </div>
                </div>

                <div style="display:flex;justify-content:space-between;">
                    
                </div>




            </div>







            <div class="opciones" style="display:flex;width:100%;justify-content:space-between;align-items:center;" id="ordenes_abiertas">
                <div class="flex">
                    <img src="images/ordenes_abiertas.svg" alt="spot">
                    <h2>Órdenes abiertas</h2>
                </div>
                <div>
                    <div style="display:flex;">
                        <h2></h2>
                        <label></label>
                    </div>
                    <div style="display:flex;">
                        <label></label>
                        <h2></h2>
                        <label></label>
                        <br><br>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;"></div>
            </div>



            <div class="opciones" style="display:flex;width:100%;justify-content:space-between;align-items:center;" id="historial_ordenes">
                <div class="flex">
                    <img src="images/historial.png" width="16px" alt="spot">
                    <h2>&nbsp;Historial de órdenes</h2>
                </div>
                <div>
                    <div style="display:flex;">
                        <h2></h2>
                        <label></label>
                    </div>
                    <div style="display:flex;">
                        <label></label>
                        <h2></h2>
                        <label></label>
                        <br><br>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;"></div>
            </div>


            <div class="opciones" style="display:flex;width:100%;justify-content:space-between;align-items:center;" id="historial_operaciones">
                <div class="flex">
                    <img src="images/historial.png" width="16px" alt="spot">
                    <h2>&nbsp;Historial de operaciones</h2>
                </div>
                <div>
                    <div style="display:flex;">
                        <h2></h2>
                        <label></label>
                    </div>
                    <div style="display:flex;">
                        <label></label>
                        <h2></h2>
                        <label></label>
                        <br><br>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;"></div>
            </div>



            
        </div>
    </div>


    <script>
        document.getElementById("spot").onclick = () =>{
            location.href ='/resumen/spot';
        }
        document.getElementById("earn").onclick = () =>{
            location.href ='/resumen/earn';
        }
        document.getElementById("ordenes_abiertas").onclick = () =>{
            location.href ='/resumen/historial';
        }
        document.getElementById("historial_ordenes").onclick = () =>{
            location.href ='/resumen/historial/historial_ordenes';
        }
        document.getElementById("historial_operaciones").onclick = () =>{
            location.href ='/resumen/historial/historial_operaciones';
        }





        //para las gráficas
        var valorSaldos = @json($valorSaldos);
        let totalDinero = 0;
        totalBloqueado = 0;

        // Obtener el total de valores
        var totalValores = valorSaldos.reduce((acumulador, objeto) => acumulador + objeto.valor, 0);

        // Filtrar los objetos con porcentajes inferiores al 1%
        var objetosFiltrados = valorSaldos.filter(objeto => (objeto.valor / totalValores) >= 0.01);

        // Calcular el valor total de los objetos filtrados
        var totalObjetosFiltrados = objetosFiltrados.reduce((acumulador, objeto) => acumulador + objeto.valor, 0);

        // Obtener los valores y etiquetas de los objetos filtrados
        var valores = objetosFiltrados.map(objeto => objeto.valor);
        var etiquetas = objetosFiltrados.map(objeto => objeto.currency);

        // Calcular el porcentaje de "Otros"
        var porcentajeOtros = (totalValores - totalObjetosFiltrados) / totalValores;

        // Agregar "Otros" al arreglo de valores y etiquetas
        valores.push(totalValores - totalObjetosFiltrados);
        etiquetas.push("Otros");

        // Crear el gráfico circular
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: etiquetas,
            datasets: [{
            data: valores,
            backgroundColor: ['red', 'blue', 'green', 'yellow', 'orange', 'purple', 'pink', 'gray', 'brown'] // Puedes personalizar los colores aquí
            }]
        },
        options: {
            plugins: {
            tooltip: {
                callbacks: {
                label: function(context) {
                    var dataIndex = context.dataIndex;
                    var dataset = context.dataset;
                    var label = dataset.label || '';

                    if (dataIndex !== undefined) {
                    var currentValue = dataset.data[dataIndex];
                    var percentage = ((currentValue / totalValores) * 100).toFixed(2) + "%";
                    return label + ': ' + percentage;
                    }
                }
                }
            }
            }
        }
        });
        console.log(valorSaldos);


    </script>
@endsection
