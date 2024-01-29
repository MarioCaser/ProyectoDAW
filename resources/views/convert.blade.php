@extends('layouts.app')


@section('estilos')
	<link rel="stylesheet" href="{{ asset('css/comprar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/convert.css') }}">
@endsection


<script>
	let from2 = "{{$from}}";
	let to2 = "{{$to}}";
	var limite = false;
</script>


@push('scripts')
	<script src="{{ asset('js/comprar.js') }}" defer></script>

	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bignumber.js/9.0.0/bignumber.min.js"></script> --}}
	<script src="{{ asset('js/config.js') }}"></script>
	<script>
		var saldos = {!! json_encode($saldos) !!};
		console.log(saldos);
	</script>
	<script>
		// let aux = "{{$from}}";
		let hayUsuario = "{{ $hayUsuario }}";
		var criptoArray = @json($criptoArray);
		let monedaFromSimbolo = "{{$from}}";
	</script>
	<script src="{{ asset('js/grafica.js') }}" defer></script>
@endpush


@section('content')
	<div style="display: flex; justify-content: center;">
		<div style="flex:2;margin-left:40px;margin-top:40px;" class="hidden xl:table-cell">
			<div class="container">
				<div class="left">
					<canvas id="canvas" width="700" height="350">
				</div>
				{{-- <div class="right"></div> --}}
			</div>
		</div>
	<div class="contenedor" style="width: 100%">
		<div style="display: flex; justify-content: flex-end;">
			<img src="/images/historial.png" alt="historial" width="30px" height="auto" style="padding-right: 10px; cursor: pointer;" onclick="redirigirPagina()">
			<label style="cursor: pointer;color:#747c8c;" onclick="redirigirPagina()">Historial</label>
		</div>
		<script>
			function redirigirPagina() {
				// Redirigir a la página deseada
				window.location.href = "/resumen/historial";
			}
		</script>
		<div class="orderType">
			<label id="mercado" class="marcado" style="color:black;">Mercado</label>
			<label id="limite">Límite</label>
		</div>
		<div style="display: flex; width: 428px;">
			<label style="margin-right: auto;">Pagas</label>
			<label id="precioMercado1" style="margin-left: auto;"></label>
		</div>		  
		<div class="pagar">
			<input type="text" id="cantidadPagar" class="cantidadPagar" placeholder="0.00" autocomplete="off">
			<label class="max">Máx.</label>
			<div style="border:1px solid #bdbdbd; height:35%;margin-right: 4%;"></div>
			<div class="crypto-container" id="crypto-container-pay">
				<div class="logo" id="logo-pay">
					<img src="{{ asset('images/criptologos/BTC.png') }}" alt="Bitcoin Logo" id="img-pay">
				</div>
	
				<div class="info">
				<h4 id="abreviaturaPagar">BTC</h4>
				
				</div>
			</div>
			<div class="select-container" id="select-pay">
				<div class="search-container" id="search-container-pay">
					<input type="text" placeholder="Buscar..." id="buscador">
				</div>
					
				<ul class="currency-list-pay" id="currency-list-pay">
				</ul>                        
			</div>
		</div>
		<div>
			<label class="informacionGris">Disponible: </label>
			<label class="informacionGris" id="saldoDisponible">0</label>
			<label></label>
		</div>
		<div id="precioLimite">

		</div>
		<div class="intercambio">
			<div id="boton" style="padding:0;">
				  
				<img src="{{ asset('images/intercambiar.png') }}" alt="intercambiar" id="imagenIntercambiar">
			</div>
		</div>
		<label>Obtienes</label>


		<div class="pagar">
			<input type="text" id="cantidadRecibir" class="cantidadPagar" placeholder="0.00" autocomplete="off" value="">
			<label class="max">Máx.</label>
			<div style="border:1px solid #bdbdbd; height:35%;margin-right: 4%;"></div>
			<div class="crypto-container" id="crypto-container-receive">
				<div class="logo" id="logo-receive">
					<img src="{{ asset('images/criptologos/EUR.png') }}" alt="Logo euro" id="img-receive">
				</div>
	
				<div class="info">
					<h4 id="abreviaturaRecibir">EUR</h4>
				</div>
			</div>
			<div class="select-container" id="select-receive">
				<div class="search-container" id="search-container-receive">
					<input type="text" placeholder="Buscar..." id="buscadorRecibir">
				</div>
					
				<ul class="currency-list-receive" id="currency-list-receive">
				</ul>                        
			</div>
		</div>
		<div class="botonComprar" id="botonComprar" style="width: 428px;">
			<label>Previsualizar orden</label>
		</div>
		{{-- nuevo --}}

		<!-- Capa gris que cubre el resto de la pantalla -->
		<div id="capa"></div>

		<!-- Ventana emergente -->
		<div id="ventana">
			<div id="mensajeCompraResumen">
				<h3 style="margin: 0;text-align:center; margin-bottom: 5px;">confirmar</h3>
				<div id="contenedorMonedas1" style="display: flex; align-items: center;">
					<div style="display: flex; align-items: center;">
						<img src="./BTC.png" width="30px" height="30px" alt="Logo de la moneda con la que pagas" id="logoMonedaPagar">
						<label id="abreviaturaMonedaPagar" style="font-weight: bold; margin: 10px;">-</label>
					</div>
					<label id="cantidadMonedaPagar" style="margin-left: auto;"> 5</label>
				</div>
				<div id="contenedorMonedas2" style="display: flex; align-items: center;">
					<div style="display: flex; align-items: center;">
						<img src="./BTC.png" width="30px" height="30px" alt="Logo de la moneda que recibes" id="logoMonedaRecibir">
						<label id="abreviaturaMonedaRecibir" style="font-weight: bold; margin: 10px;">-</label>
					</div>
					<label id="cantidadMonedaRecibir" style="margin-left: auto;">-</label>
				</div>
				<div style="display: flex; justify-content: space-between;">
					<label>Tipo de cambio: </label>
					<label style="margin-left: auto;" id="tipoCambio">-</label>
				</div>
				<div style="display: flex; justify-content: space-between;">
					<label>Tipo de cambio inverso: </label>
					<label style="margin-left: auto;" id="tipoCambioInverso">-</label>
				</div>
				<div style="display: flex; justify-content: space-between;">
					<label>Comisión: </label>
					<label style="margin-left: auto;" id="comision">-</label>
				</div>
				<div style="display: flex; justify-content: space-between;">
					<label>Recibirás: </label>
					<label style="margin-left: auto;" id="cantidadRecibirResumen">-</label>
				</div>
			</div>
			  
			<p id="mensajeInicio">Debes iniciar sesión para poder comprar.</p>
			<p id="mensajeSaldoInsuficiente">Tu saldo es insuficiente para realizar esta compra.</p>
			<div style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;">
				<button id="cerrarVentana" style="background-color: #f7a600; color: black; border-radius: 5px;border: 0; padding: 8px; font-weight: bold;height:40px;">Cerrar</button>
			</div>
			<div style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;" id="operacion">

				<form action="{{ route('compra') }}" method="POST">
					@csrf
					<input type="hidden" name="monedaPagarHidden" id="monedaPagarHidden" value="">
					<input type="hidden" name="monedaRecibirHidden" id="monedaRecibirHidden" value="">
					<input type="hidden" name="cantidadPagarHidden" id="cantidadPagarHidden" value="">
					<input type="hidden" name="tipoCambioHidden" id="tipoCambioHidden" value="">
					
					<!-- Agrega más campos ocultos para cada dato que deseas enviar -->
					<button type="submit" id="ejecutarOperacion" style="background-color: #f7a600; color: black; border-radius: 5px;border: 0; padding: 8px; font-weight: bold;height:40px;cursor:pointer;">Ejecutar operación</button>

				</form>
				
				<button id="cerrarVentana2" style="background-color: rgb(247, 166, 0); color: black; border-radius: 5px; border: 0px; padding: 8px; font-weight: bold; display: block;height:40px;margin-left: 10px;cursor:pointer;">Cancelar</button>
			</div>
		</div>
		{{-- fin ventana emergente para comprar --}}

		{{-- ventana emergente para poner ordenes limite --}}
		<div id="ventanaEmergente" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;">
			<div style="display: flex; flex-direction: column; width: 400px; color: black; align-items: center; font-weight: bold; align-items: flex-start; border-radius: 5px; background-color: white; margin: 75px auto auto auto; padding: 20px;">
				<div style="display: flex; flex-direction: column; width:100%; color: black; align-items: center;font-weight: bold; align-items: flex-start;border-radius: 5px;">
					<div style="display: flex; align-items: center;">
						<img src="/images/criptologos/BTC.png" alt="logo de la moneda con la que pagas" style="width: 30px;margin-right:15px;" id="logoPagarVentanaEmergente">
						<label id="CantidadPagarLimiteResumen">0.36&nbsp;</label>
						<label id="monedaPagar1">BTC</label>
					</div>
					<label style="margin: 10px 0; font-size: 1.5em; text-align:left;margin-left:9px;">↓</label>
					<div style="display: flex; align-items: center;">
						<img src="/images/criptologos/ETH.png" alt="logo de la moneda que recibes" style="width: 30px;margin-right:15px;" id="logoRecibirVentanaEmergente">
						<label id="CantidadRecibirLimiteResumen">0.69&nbsp;</label>
						<label id="monedaRecibir1">ETH</label>
					</div>    
				
					<div style="display: flex; align-items: center; justify-content: space-between; margin-top:10px;width:100%;">
						<label>Comisión: </label>
						<div>
							<label id="comisionResumenLimite">--</label>
							<label id="monedaPagar2">BTC</label>
						</div>
					</div>
					  
			
					<div style="display: flex; align-items: center; justify-content: space-between; margin-top:10px; width:100%;">
						<label>Precio de cambio: </label>
						<div>
							<label>1</label>
							<label id="monedaPagarLimiteResumen">BTC</label>
							<label>=</label>
							<label id="tCambio">1</label>
							<label id="monedaRecibir2">ETH</label>
						</div>
					</div>

					<div style="display: flex; align-items: center; justify-content: space-between; margin-top:10px; width:100%;">
						<label id="aviso" style="font-weight: normal; color: red; font-size: 0.9em;"></label>
					</div>
					
					  
					
					<div style="display: flex; justify-content: center; align-items: center;width:100%;margin-top:20px;">
						<form action="{{ route('ponerOrden') }}" method="POST">
							@csrf
							<input type="hidden" name="cantidadPagarLimite" id="cantidadPagarLimite">
							<input type="hidden" name="tipoCambioLimite" id="tipoCambioLimite">
							<input type="hidden" name="monedaPagarLimite" id="monedaPagarLimite">
							<input type="hidden" name="monedaRecibirLimite" id="monedaRecibirLimite">
							<input type="submit" style="margin-top: 25px; background-color: rgb(247, 166, 0); color: black; border-radius: 5px; border: 0px; padding: 8px; font-weight: bold; display: block; height: 40px; margin-left: 10px; cursor: pointer;" value="Poner orden de compra">
						</form>
						<button onclick="ocultarVentanaEmergente()" style="height:40px;margin-top: 10px; background-color: rgb(247, 166, 0); color: black; border-radius: 5px; border: 0px; padding: 8px; font-weight: bold; display: block; height: 40px; margin-left: 10px; cursor: pointer;">Cancelar</button>
					</div>	  
				</div>
			</div>
		</div>
	</div>
</div>

<div class="panelCompleto" style="color:black;font-family: BlinkMacSystemFont,'PingFang SC','Microsoft YaHei';box-sizing: border-box;background-clip: padding-box!important;display: block;">
	<h2 class="text-3xl">FAQ</h2>
	<div>
		<div class="container p-4" style="color:black;font-family: BlinkMacSystemFont,'PingFang SC','Microsoft YaHei';box-sizing: border-box;background-clip: padding-box!important;display: block;">
			<div class="title" id="2">
				<h3 class="text-2xl">1. ¿Cuáles son las comisiones por trading?</h3><svg width="24" height="24" viewBox="0 0 24 24" fill="none" show="" class="lrtcss-pd849e"><path d="M4.84049 8.035L12.0064 15.2012L19.1661 8.04153" stroke="currentColor" stroke-width="2"></path></svg>
			</div>
			<div height="66" id="respuesta2" class="respuesta">
				<div>
					<div>
						<div class="text-lg" style="padding-bottom: 13px;">Las comisiones por trading pueden variar dependiendo de la plataforma o exchange que utilices. Es importante revisar las políticas y tarifas de cada plataforma para conocer los detalles sobre las comisiones aplicables.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container p-4">
			<div class="title" id="3">
				<h3 class="text-2xl">2. ¿Cómo puedo comprar criptomonedas?</h3><svg width="24" height="24" viewBox="0 0 24 24" fill="none" show="" class="lrtcss-pd849e"><path d="M4.84049 8.035L12.0064 15.2012L19.1661 8.04153" stroke="currentColor" stroke-width="2"></path></svg>
			</div>
			<div height="66" id="respuesta3" class="respuesta">
				<div>
					<div>
						<div class="text-lg" style="padding-bottom: 13px;">Para comprar criptomonedas, generalmente debes registrarte en una plataforma de intercambio de criptomonedas, verificar tu identidad y depositar fondos en tu cuenta. Luego puedes buscar la criptomoneda que deseas comprar y realizar la transacción siguiendo las instrucciones de la plataforma.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container p-4">
			<div class="title" id="4">
				<h3 class="text-2xl">3. ¿Cómo puedo vender mis criptomonedas?</h3><svg width="24" height="24" viewBox="0 0 24 24" fill="none" show="" class="lrtcss-pd849e"><path d="M4.84049 8.035L12.0064 15.2012L19.1661 8.04153" stroke="currentColor" stroke-width="2"></path></svg>
			</div>
			<div height="44" id="respuesta4" class="respuesta">
				<div>
					<div>
						<div class="text-lg" style="padding-bottom: 13px;">Para vender tus criptomonedas, debes tener una cuenta en una plataforma de intercambio de criptomonedas. Debes seleccionar la criptomoneda que deseas vender, indicar la cantidad y seguir los pasos proporcionados por la plataforma para completar la transacción de venta.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container p-4">
			<div class="title" id="5">
				<h3 class="text-2xl">4. ¿Cómo puedo proteger mi criptomonedas?</h3><svg width="24" height="24" viewBox="0 0 24 24" fill="none" show="" class="lrtcss-pd849e"><path d="M4.84049 8.035L12.0064 15.2012L19.1661 8.04153" stroke="currentColor" stroke-width="2"></path></svg>
			</div>
			<div height="44" id="respuesta5" class="respuesta">
				<div>
					<div>
						<div class="text-lg" style="padding-bottom: 13px;">Para proteger tus criptomonedas, es recomendable utilizar una billetera digital segura. Puedes optar por billeteras de hardware (como Ledger o Trezor) o billeteras de software (como Exodus o Trust Wallet). Además, es importante utilizar contraseñas seguras, habilitar la autenticación de dos factores y tener cuidado al interactuar con enlaces o archivos sospechosos.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script>
		document.getElementById("comprarEnlace1").style.color = "#f59e0b";
	
	
		var enlace = document.getElementById("comprarEnlace1");
	
		enlace.addEventListener("mouseover", function() {
			this.style.color = "#f59e0b";
		});
		
		enlace.addEventListener("mouseout", function() {
			this.style.color = "#f59e0b";
		});
	</script>


	@if(isset($resultado))
	<script>
		// Muestra la ventana emergente con el mensaje del resultado
		alert("{{ $resultado }}");
		window.location.href = "/convert/BTC/BUSD";
	</script>
	@endif



	<script>
		function mostrarVentanaEmergente() {
			var ventanaEmergente = document.getElementById("ventanaEmergente");
			ventanaEmergente.style.display = "block";
		}

		function ocultarVentanaEmergente() {
			var ventanaEmergente = document.getElementById("ventanaEmergente");
			ventanaEmergente.style.display = "none";
		}

	</script>
	
	<script src="{{ asset('js/convert.js') }}"></script>
	
@endsection