<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Orca Capital</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<script src="https://cdn.tailwindcss.com"></script>

		<link rel="icon" type="image/png" href="{{ asset('images/orca.png') }}" />
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
		
		@yield('estilos')
		@stack('scripts')

		<style>
			.menu-icon {
				display: none;
			}
			@media (max-width: 1000px) {
				.enlace {
					display: none;
				}
				.menu-icon {
					display: block;
				}
			}
			.enlaces-menu {
				transition: all 0.5s ease;
				overflow: hidden;
			}
			.enlaces-menu.show {
				max-height: 1000px;
			}
			#divMenuVertical {
				position: fixed;
				top: 0;
				width: 314px;
				height: 100vh;
				background-color: #121818;
				transition: all 0.3s ease-in-out;
				display: flex;
				flex-direction: column;
				z-index: 99999999;
			}
			.mostrar {
				right: 0;
			}
			.menuVertical{
				right: -314px;
			}

			.round-link {
				display: inline-block;
				padding: 10px;
				border: 1px solid white;
				border-radius: 30px;
				text-decoration: none;
				color: white;
				transition: background-color 0.3s, color 0.3s;
			}

			.round-link:hover {
				background-color: white;
				color: black;
			}
			#cerrarMenuLateral:hover{
				cursor: pointer;
			}
			.logout-button {
				background-color: white;
				color: black;
				border: none;
				border-radius: 5px;
				padding: 5px 10px;
				cursor: pointer;
				margin-left: 10px;
				margin-right: 10px;
				height: 35px;
				margin-top: 0;
				margin-bottom: 0;
			}

				/* Estilos para el botón al pasar el ratón por encima */
			.logout-button:hover {
				background-color: #f2f2f2;
			}
			#todo {
				min-height: 100vh;
				display: flex;
				flex-direction: column;
			}

			footer {
				margin-top: auto;
			}
			.enlace a:hover {
    			color: #f59e0b;
  			}
			
		

		</style>
	</head>
	<body>
		<div id="todo">	
			<header style="overflow: hidden;z-index: 99999999;" class="enlaces-menu">
				<div class="logo apply-none">
				  <a href="/"><img class="apply-none"src="{{ asset('images/orca.png') }}" height="50px" width="90px" class="mx-auto"/></a>
				</div>
				<div class="enlace">
					<a href="{{route('depositar')}}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');" id="depositarEnlace1">Depositar</a>
				</div>
				<div class="enlace">
				  	<a href="/precios" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');" id="preciosEnlace1">Precios</a>
				</div>
				<div class="enlace">
				  	<a href="{{route('convert')}}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');" id="comprarEnlace1">Comprar</a>
				</div>
				{{-- <div class="enlace">
				  	<a href="{{route('futuros')}}">Futuros</a>
				</div> --}}
				<div class="enlace">
				  	<a href="{{route('earn')}}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');" id="earnEnlace1">Earn</a>
				</div>
				{{-- <div class="enlace">
				  	<a href="./activos.php">Mis activos</a>
				</div> --}}
				<div class="enlace">
					<a href="{{route('contacto')}}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');" id="contactoEnlace1">Contacto</a>
			  	</div>
				<div class="enlace">
					<a href="{{route('chat')}}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');" id="chatEnlace1">Chat</a>
			  	</div>
				<div class="enlace">
					<a href="{{route('resumen')}}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');">Resumen</a>
			  	</div>
				
				<?php
				  	$check = Auth::check();
				  	if ($check) {
					  	$user = auth()->user();
					  	if ($user->id_rol == 2) {
			  	?>
				<div class="enlace">
					<select id="options" name="options" onchange="redirectToPage(this)">
						<option value="">Seleccione una opción</option>
						<option value="{{ route('crud_saldos') }}">Crud saldos</option>
						<option value="/crud_comments">Crud comentarios</option>
						<option value="/crud_users">Crud usuarios</option>
						<option value="/crud_productos">Crud productos</option>
						<option value="/crud_monedas">Crud monedas</option>
						<option value="/crud_productos_contratados">Crud productos contratados</option>
						<option value="{{ route('crud_chat') }}">Chat Admin</option>
					  </select>
					  
					  <script>
						function redirectToPage(selectElement) {
						  var selectedOption = selectElement.value;
						  if (selectedOption !== "") {
							window.location.href = selectedOption;
						  }
						}
					  </script>
					  
				</div>
			  	<?php
						}
				  	}
			  	?>
			
				<?php
				  	$check = Auth::check();
				  	if(!$check){
				?>
				  	<div class="enlace derecha apply-none enlace">
						<a href="{{ route('login') }}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');">Iniciar sesión</a>
				  	</div>
				  	<div class="enlace apply-none">
						<a href="{{ route('registro') }}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color=this.getAttribute('data-original-color');" id="registroEnlace1">Registrarse</a>
					  </div>
				<?php 
					} else { 
				?>
				  	<div class="nombreUsuario apply-none">
						<label>{{ Auth::user()->email }} </label>
				  	</div>
					<div>
						@auth
							<form action="{{ route('logout') }}" method="GET" id="formLogOut" style="margin-bottom:0;">
								@csrf
								<button type="submit" class="logout-button" id="logoutB" style="background-color: white;">Cerrar sesión</button>
							</form>
						@endauth
					</div>
				<?php
				  	}
				?>
				<button class="derecha menu-icon" onclick="mostrarDiv()" style="background-color: transparent;border:none;margin-right: 15px;">
					<label style="color: white;background-color: transparent;border:none;">☰</label>
				</button>

			  </header><!-- #header -->
			  <div id="divMenuVertical" class="menuVertical">
				<div style="display:flex;align-items:center;width:100%;color:lightgrey;height:46px;">
					<label style="text-align:right;padding-right: 27px;width:100%;" id="cerrarMenuLateral">x</label>
				</div>



				<?php
					$check = Auth::check();
					if(!$check){
				?>
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:center;">
					<a href="{{route('login')}}" style="color:white; text-decoration:none;">Iniciar sesión</a>
				</div>
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:center;">
					<a href="{{route('registro')}}" class="round-link">Registrarse</a>
				</div>
				<?php 
					} else { 
				?>
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:center;">
					<label style="color:white; text-decoration:none;">{{ Auth::user()->email }} </label>
				</div>
				<?php
					}
				?>



				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:flex-start;padding-left:24px;">
					<a href="{{route('depositar')}}" style="color:white; text-decoration:none;" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color='white';">Depositar</a>
				</div>
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:flex-start;padding-left:24px;">
					<a href="/precios" style="color:white; text-decoration:none;" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color='white'">Precios</a>
				</div>
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:flex-start;padding-left:24px;">
					<a href="{{route('convert')}}" style="color:white; text-decoration:none;" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color='white'">Comprar</a>
				</div>
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:flex-start;padding-left:24px;">
					<a href="{{route('futuros')}}" style="color:white; text-decoration:none;" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color='white'">Futuros</a>
				</div>
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:flex-start;padding-left:24px;">
					<a href="{{route('earn')}}" style="color:white; text-decoration:none;" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color='white'">Earn</a>
				</div>
				{{-- <div style="display:flex;align-items:center;width:100%;height:46px;justify-content:flex-start;padding-left:24px;">
					<a href="/" style="color:white; text-decoration:none;">Mis activos</a>
				</div> --}}
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:flex-start;padding-left:24px;">
					<a href="contacto" style="color:white; text-decoration:none;" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color='white'">Contacto</a>
				</div>
				<div style="display:flex;align-items:center;width:100%;height:46px;justify-content:flex-start;padding-left:24px;">
					<a href="contacto" style="color:white; text-decoration:none;" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color='white'">Chat</a>
				</div>
				<div class="enlace">
					<a href="{{route('resumen')}}" onmouseover="this.style.color='#f59e0b';" onmouseout="this.style.color='white'">Resumen</a>
			  	</div>
				<div>
					@auth
						<form action="{{ route('logout') }}" method="POST">
							@csrf
							<button type="submit" class="logout-button">Cerrar sesión</button>
						</form>
					@endauth
				</div>

  
			</div>
			  
			
			<div class="contenido"  
			@if(preg_match('/^convert($|\/.*)/', request()->path())
			 || request()->is('registro') || request()->is('login') || request()->is('depositar') || 
			 request()->is('earn') || request()->is('crear_saldo') || request()->is('contacto') || request()->is('chat') 
			 || request()->is('resumen') || request()->is('resumen/spot') || request()->is('resumen/earn') || request()->is('comprar') 
			 || request()->is('retirar') || request()->is('resumen/retirar') || request()->is('resumen/historial') || 
			 request()->is('resumen/historial/ordenes') || request()->is('resumen/historial/historial_ordenes') || 
			 request()->is('resumen/historial/historial_operaciones') || request()->is('crud_comments')
			 || strpos(request(), "crud_comments")
			 || strpos(request(), "crud")
			 
			 ) style="background-color: white;" 
			 @else{ @if(request()->is('futuros')) style="background-color: black;" @else style="background-color: black;" @endif}  @endif>				<main>
					@yield('content')
				</main>
			</div>
			
			
		    <footer>
				<span>ORCA © 2023</span>
				<?php
					// Verificar si ya existe una cookie de visita previa para crearla en caso de que no exista
					if(isset($_COOKIE['visitas']))
						$visitas = $_COOKIE['visitas'] + 1;
					else
						$visitas = 1;

					// Almacenar la cookie en el servidor
					setcookie('visitas', $visitas, time() + (86400 * 30), '/');
					// Mostrar el número de visitas al usuario
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usted ha visitado este sitio $visitas veces.";
				?>
		    </footer><!-- #footer -->
		</div><!-- #wrapper -->	
	</body>
	<script>
		function mostrarDiv() {
			var div = document.getElementById("divMenuVertical");
			div.classList.toggle("menuVertical");
			div.classList.toggle("mostrar");
		}
		document.getElementById("cerrarMenuLateral").onclick = () => {
			var div = document.getElementById("divMenuVertical");
			div.classList.toggle("menuVertical");
			div.classList.toggle("mostrar");
		}
	</script>
</html>