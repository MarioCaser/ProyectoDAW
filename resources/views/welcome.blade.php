@extends('layouts.app')

@section('estilos')
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  <style>
    .pagination {
    color: white;
    background-color: transparent;
    border-color: white;
    }
    main{
      background-color:black;
    }
    

  </style>
@endsection



@section('content')
<div style="display: flex; padding: 10%;">
    <div style="flex-basis: 63%; padding-right: 10px;">
      <div style="text-align: left" class="divForm">
        <form method="get" action="/registro" class="mt-5">
          <h1 class="primerTexto" style="text-align: left;">Compra y vende más de 300 criptomonedas de forma segura</h1>
          
            @guest
              <div class="mt-0 flex">
                <input type="text" name="email" class="inputCorreo mt-5 focus:outline-none focus:ring-0 p-3 bg-transparent text-white text-lg border border-white rounded" placeholder="Correo electrónico">
                <input type="submit" value="Regístrate" class="mt-5 bg-white border-0 text-black rounded-l-full rounded-r-full px-8 py-3 text-lg ml-4">
              </div>
            @endguest

        </form>        
        <div class="imagenes partner-bar flex justify-between mt-7">
          <div class="partner-item">
            <picture class="okui-image-webp">
              <source srcset="https://static.okx.com/cdn/assets/imgs/2210/960EBD3DB32081AC.png?x-oss-process=image/format,webp">
              <img class="" src="https://static.okx.com/cdn/assets/imgs/2210/960EBD3DB32081AC.png" alt="Más rápido, mejor y más robusto que el exchange de criptos promedio" width="129" height="75">
            </picture>
          </div>
          <div class="partner-item">
            <picture class="okui-image-webp">
              <source srcset="https://static.okx.com/cdn/assets/imgs/2210/499A92F3657A52EC.png?x-oss-process=image/format,webp">
              <img class="" src="https://static.okx.com/cdn/assets/imgs/2210/499A92F3657A52EC.png" alt="Más rápido, mejor y más robusto que el exchange de criptos promedio" width="129" height="34">
            </picture>
          </div>
          <div class="partner-item">
            <picture class="okui-image-webp">
              <source srcset="https://static.okx.com/cdn/assets/imgs/2210/6279B178FADAFCC5.png?x-oss-process=image/format,webp">
              <img class="" src="https://static.okx.com/cdn/assets/imgs/2210/6279B178FADAFCC5.png" alt="Más rápido, mejor y más robusto que el exchange de criptos promedio" width="64" height="64">
            </picture>
          </div>
        </div>        
      </div>
    </div>
    <div style="flex-basis: 37%; text-align: center;">
      <div class="text-center">
        <video class="first-img mx-auto" autoplay="" loop="" muted="" playsinline="" width="280" height="580" poster="https://static.okx.com/cdn/assets/imgs/2210/8B245F5F74788F8A.png?x-oss-process=image/format,webp" src="https://static.okx.com/cdn/assets/files/2211/7A3CB59773E00032.mp4"></video>
      </div>
    </div>
    
  </div>
  <div id="containerMarquesina">
    <div class="slider" id="slider1">
        <label id="label1">--</label>
        <label id="label2">Label 2</label>
        <label id="label3">Label 3</label>
        <label id="label4">Label 4</label>
        <label id="label5">Label 5</label>
        <label id="label6">Label 6</label>
        <label id="label7">Label 7</label>
        <label id="label8">Label 8</label>
        <label id="label9">Label 9</label>
        <label id="label10">Label 10</label>
    </div>
    <div class="slider" id="slider2">
        <label id="label11">Label 1</label>
        <label id="label12">Label 2</label>
        <label id="label13">Label 3</label>
        <label id="label14">Label 4</label>
        <label id="label15">Label 5</label>
        <label id="label16">Label 6</label>
        <label id="label17">Label 7</label>
        <label id="label18">Label 8</label>
        <label id="label19">Label 9</label>
        <label id="label110">Label 10</label>
    </div>
    <div class="slider" id="slider3">
        <label>Label 1</label>
        <label>Label 2</label>
        <label>Label 3</label>
        <label>Label 4</label>
        <label>Label 5</label>
        <label>Label 6</label>
        <label>Label 7</label>
        <label>Label 8</label>
        <label>Label 9</label>
        <label>Label 10</label>
    </div>
</div>


{{-- <h1 class="text-4xl font-bold" style="text-align: left;padding-left: 5vw;margin-top: 35px;">Criptomonedas populares</h1> --}}


{{-- tabla con los datos de las monedas
<div class="bg-white shadow-md rounded my-6" style="margin: 0 20px;">
  <table class="min-w-max w-full table-auto">
    <thead>
      <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <th class="py-3 px-6 text-left">Criptomoneda</th>
        <th class="py-3 px-6 text-left">Último precio</th>
        <th class="py-3 px-6 text-left">Cambio en 24h</th>
        <th class="py-3 px-6 text-left">Cap. de mercado</th>
      </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
      <!-- Filas de datos -->
      {{-- <tr class="border-b border-gray-200 hover:bg-gray-100">
        <td class="py-3 px-6 text-left" id="nombre1"></td>
        <td class="py-3 px-6 text-left" id="precio1"></td>
        <td class="py-3 px-6 text-left" id="cambio1"></td>
        <td class="py-3 px-6 text-left" id="cap1"></td>
      </tr>
      <tr class="border-b border-gray-200 hover:bg-gray-100">
        <td class="py-3 px-6 text-left" id="nombre1"></td>
        <td class="py-3 px-6 text-left" id="precio2"></td>
        <td class="py-3 px-6 text-left" id="cambio2"></td>
        <td class="py-3 px-6 text-left" id="cap2"></td>
      </tr> --}}
      <!-- ... Agregar más filas de datos aquí ... 
    </tbody>
  </table>
</div> --}}-->


{{-- Explora los diferentes tipos de proyectos dentro dentro del mundo de las criptomonedas. Minimiza los riesgos y maximiza tus oportunidades al diversificar inteligentemente tu cartera. Descubre un abanico de posibilidades para invertir en proyectos prometedores y construye una base sólida para alcanzar tus metas financieras. --}}

<br><br>
<div class="grid grid-cols-12" style="padding-left: 3vw;padding-right: 3vw; margin-top: 3vw; margin-bottom: 5vw;">
  <div class="col-span-5" style="padding-right:1vw;">
    <div class="leftSection">
      <h3 class="title text-2xl mb-4 ">Diversifica tu cartera</h3>
      <label class="content">Minimiza riesgos y aumenta tus podibilidades diversificando tu cartera</label><br><br>
      <a href="/convert" class="inline-flex items-center justify-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-md shadow-md transition-colors duration-300 focus:outline-none">
        Compra
      </a>            
      {{-- <label class="content">Descubre oportunidades de inversión en proyectos prometedores y alcanza tus metas financieras.</label><br> --}}
      {{-- <div class="linkRow"><a cla="sslink" href="/basket">explore baskets</a></div> --}}
   </div>
  </div>
  <div class="col-span-3" style="padding-left: 3vw;">
    <div class="rightSection">
      <img class="graphImg" src="/images/basketgraph.svg">
   </div>
  </div>
  <div class="col-span-4 flex justify-center items-center" style="">
    <div class="topValueSection">
      <h3 class="topValue text-4xl mb-4 text-center">diversifica</h3>
      <label class="topTitle">tus inversinoes con nuestros productos!</label>
    </div>
  </div>  
</div>

{{-- <div class="flex justify-between" style="padding:0 2vw;margin: 3vw 0;width:100%;">
  <div class="basket w-1/5" style="z-index:0;">
    <div class="top">
      <div class="title">Beginner's Luck</div>
    </div>
    <h3 class="desc text-base" style="padding-left: 5%;">Recomendado para principiantes</h3><br>
    <div class="coinMix">
      <div class="list">
          <label class="name text-sm">Bitcoin</label><br>
          <label class="name text-sm">Ethereum</label><br>
          <label class="name text-sm">BNB</label>
      </div>
    </div>
    <div class="bottom absolute bottom-0 left-0 w-full">
      <div class="coinButtonSection">
          <div class="basketCoinIcons stacked flex items-center justify-center" style="height: 10%;">
            <img class="icon c-btc bg-white rounded-full relative left-4" src="/images/criptologos/BTC.png" style="width: 30px;z-index:-2;">
            <img class="icon c-eth bg-white rounded-full relative left-2" src="/images/criptologos/ETH.png" style="width: 30px;z-index:-3;">
            <img class="icon c-eth bg-white rounded-full" src="/images/criptologos/BNB.png" style="width: 30px;z-index:-4;">
          </div>
          <a class="btn investBtn text-white rounded-l-full rounded-r-full flex items-center" href="/convert/BTC/BUSD">Invierte ahora<img src="images/rightArrowInactive.svg" class="ml-2"></a>
      </div>
    </div>
  </div>

  <div class="basket w-1/5" style="z-index:0;">
    <div class="top">
      <div class="title">Crypto Largecap</div>
    </div>
    <h3 class="desc text-base" style="padding-left: 5%;">Mayor capitalización de mercado</h3><br>
    <div class="coinMix">
      <div class="list">
          <label class="name text-sm">Bitcoin</label><br>
          <label class="name text-sm">Ethereum</label><br>
          <label class="name text-sm">BNB</label><br>
          <label class="name text-sm">Solana</label><br>
          <label class="name text-sm">Ripple</label><br>
          <label class="name text-sm">Cardano</label>
      </div>
    </div>
    <div class="bottom absolute bottom-0 left-0 w-full">
      <div class="coinButtonSection">
          <div class="basketCoinIcons stacked flex items-center justify-center" style="height: 10%;">
            <img class="icon c-btc bg-white rounded-full relative left-4" src="/images/criptologos/BTC.png" style="width: 30px;z-index:-2;">
            <img class="icon c-eth bg-white rounded-full relative left-2" src="/images/criptologos/ETH.png" style="width: 30px;z-index:-3;">
            <img class="icon c-eth bg-white rounded-full" src="/images/criptologos/BNB.png" style="width: 30px;z-index:-4;">
          </div>
          <a class="btn investBtn text-white rounded-l-full rounded-r-full flex items-center" href="/convert/BTC/BUSD">Invierte ahora<img src="images/rightArrowInactive.svg" class="ml-2"></a>
      </div>
    </div>
  </div>

  <div class="basket w-1/5" style="z-index:0;">
    <div class="top">
      <div class="title">Defi</div>
    </div>
    <h3 class="desc text-base" style="padding-left: 5%;">Finanzaz descentralizadas</h3><br>
    <div class="coinMix">
      <div class="list">
          <label class="name text-sm">Chainlink</label><br>
          <label class="name text-sm">Aave</label><br>
          <label class="name text-sm">Pancake Swap</label><br>
          <label class="name text-sm">THORChain</label><br>
          <label class="name text-sm">Uniswap</label>
      </div>
    </div>
    <div class="bottom absolute bottom-0 left-0 w-full">
      <div class="coinButtonSection">
          <div class="basketCoinIcons stacked flex items-center justify-center" style="height: 10%;">
            <img class="icon c-btc bg-white rounded-full relative left-4" src="/images/criptologos/LINK.png" style="width: 30px;z-index:-2;">
            <img class="icon c-eth bg-white rounded-full relative left-2" src="/images/criptologos/AAVE.png" style="width: 30px;z-index:-3;">
            <img class="icon c-eth bg-white rounded-full" src="/images/criptologos/CAKE.png" style="width: 30px;z-index:-4;">
          </div>
          <a class="btn investBtn text-white rounded-l-full rounded-r-full flex items-center" href="/convert/BTC/BUSD">Invierte ahora<img src="images/rightArrowInactive.svg" class="ml-2"></a>
      </div>
    </div>
  </div>
  <div class="basket w-1/5" style="z-index:0;">
    <div class="top">
      <div class="title">Metaverse</div>
    </div>
    <h3 class="desc text-base" style="padding-left: 5%;">Metaverso</h3><br>
    <div class="coinMix">
      <div class="list">
          <label class="name text-sm">Decentraland</label><br>
          <label class="name text-sm">The Sandbox</label><br>
          <label class="name text-sm">Theta</label><br>
          <label class="name text-sm">Chromia</label>
      </div>
    </div>
    <div class="bottom absolute bottom-0 left-0 w-full">
      <div class="coinButtonSection">
          <div class="basketCoinIcons stacked flex items-center justify-center" style="height: 10%;">
            <img class="icon c-btc bg-white rounded-full relative left-4" src="/images/criptologos/MANA.png" style="width: 30px;z-index:-2;">
            <img class="icon c-eth bg-white rounded-full relative left-2" src="/images/criptologos/SAND.png" style="width: 30px;z-index:-3;">
            <img class="icon c-eth bg-white rounded-full" src="/images/criptologos/THETA.png" style="width: 30px;z-index:-4;">
          </div>
          <a class="btn investBtn text-white rounded-l-full rounded-r-full flex items-center" href="/convert/BTC/BUSD">Invierte ahora<img src="images/rightArrowInactive.svg" class="ml-2"></a>
      </div>
    </div>
  </div>
</div> --}}







{{-- <div class="fixed bottom-3 right-3">
  <div id="chatIcon" class="relative">
    <img src="images/chat.png" alt="chat" width="110px">
  </div>
  <div id="chatBox" class="fixed bottom-4 right-3" style="display: none;">
    <div class="flex justify-end">
      <div id="volver" class="flex items-center justify-center rounded-full mb-4" style="width: 45px; height: 45px; background-color: #de6b48;">
        <img src="images/flecha-abajo.png" class="" style="width:40%;padding-top:2px;">
      </div>      
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md" style="width: 371px; height: 70vh; padding: 0; overflow: hidden;max-height:500px;">
      <div style="height: 100px; background-color: #de6b48; margin: 0; display: flex;" class="items-center justify-center">
        <label>Contacte con nosotros ahora</label>
      </div>
      <div id="contenidoAbajo" style="">
        
        <h3 class="text-xl text-center pb-3 text-black">Preguntas frecuentes</h3>
        
        <div id="FAQ">

          <div class="pb-1 pt-1 pl-1 mb-2 bg-gray-100">
            <div class="flex">
                <img width="20px" height="16px" loading="lazy" src="https://public.bnbstatic.com/image/cms/content/body/202202/56e071f41e41e2623af29d87e8cf23c6.png" alt="FAQ icon" class="css-0">
                <label class="text-black text-sm">Funciones de la cuenta</label>
            </div>
          </div>
        
          <div class="pb-1 pt-1 pl-1 mb-2 bg-gray-100">
            <div class="flex">
              <img width="20px" height="16px" loading="lazy" src="images/deposito.svg" alt="FAQ icon" class="css-0">
              <label class="text-black text-sm">Depositar</label>
            </div>
          </div>

          <div class="pb-1 pt-1 pl-1 mb-2 bg-gray-100">
            <div class="flex">
              <img width="20px" height="16px" loading="lazy" src="images/retiro.svg" alt="FAQ icon" class="css-0">
              <label class="text-black text-sm">Retirar</label>
            </div>
          </div>

          <div class="pb-1 pt-1 pl-1 mb-2 bg-gray-100">
            <div class="flex">
              <img width="20px" height="16px" loading="lazy" src="images/compras.svg" alt="FAQ icon" class="css-0">
              <label class="text-black text-sm">Comprar</label>
            </div>
          </div>

          <div class="pb-1 pt-1 pl-1 mb-2 bg-gray-100">
            <div class="flex">
              <img width="20px" height="16px" loading="lazy" src="images/earn.svg" alt="FAQ icon" class="css-0">
              <label class="text-black text-sm">Prestar dinero</label>
            </div>
          </div>
        </div>
      </div>

      <div style="height:100px;display:flex;flex-direction:column;">
        <div class="flex flex-col items-center justify-center mt-auto" id="botonAbajo" style="margin-bottom: 20px;">
          @auth
            <!-- Botón de contacto para usuarios con sesión iniciada -->
            <button class="boton" onclick="window.location.href = '/chat'">Contactar con un operador</button>
          @else
            <!-- Mensaje y botón para usuarios sin sesión iniciada -->
            <p class="text-black text-sm text-center mb-4">Regístrate para disfrutar de todas las funciones.</p>
            <button class="boton" onclick="window.location.href = '/contacto'">Continuar como invitado</button>
          @endauth
        </div>
      </div>

    </div>
  </div>  
</div> --}}









<!-- resources/views/comments/index.blade.php -->
<h1 class="text-2xl">Comentarios</h1>



{{-- <h2>Comentarios existentes:</h2> --}}
<div style="padding-left: 5%; padding-right: 5%; padding-top: 2%; padding-bottom: 2%;">
  @forelse ($comments as $comment)
    @include('_comments')
  @empty
    <p>No hay comentarios.</p>
  @endforelse
</div>

<div class="" style="padding-left: 5%; padding-right: 5%;">
  {{ $comments->links() }}
</div>


@auth
    <form action="{{ route('comments.store') }}" method="POST" style="margin-bottom:3%;">
        @csrf
        <div style="width:100%;padding-left:5%;padding-right:5%;">
            {{-- <label>Añade un comentario:</label> --}}
            <br>
            <textarea name="body" id="body" rows="3" placeholder="Añade un comentario!" required class="w-full px-2 py-1 bg-transparent border border-gray-300"></textarea>
          </div>
        <div style="padding-left:5%;">
            <label>Puntuación:</label>
            <span class="text-yellow-500 cursor-pointer" id="punto1">★</span>
            <span class="text-yellow-500 cursor-pointer" id="punto2">★</span>
            <span class="text-yellow-500 cursor-pointer" id="punto3">★</span>
            <span class="text-yellow-500 cursor-pointer" id="punto4">★</span>
            <span class="text-yellow-500 cursor-pointer" id="punto5">★</span>
            <input type="hidden" name="rating" id="rating" min="1" max="5" required style="background-color:transparent;border:1px solid lightgrey;" value="5">
        </div>
        <button type="submit" class="bg-white text-black rounded-full p-1" style="margin-left:5%;margin-top:1%;">Publicar comentario</button>
      </form>
@else
  <p style="padding-left:5%;padding-right:5%;margin-bottom:3%;">
    <a href="{{ route('login') }}" class="text-amber-500">Inicia sesión</a> para dejar un comentario.
  </p>
@endauth


<script>
  // const chatIcon = document.getElementById('chatIcon');
  // const chatBox = document.getElementById('chatBox');

  // chatIcon.addEventListener('click', () => {
  //   chatIcon.style.display = 'none';
  //   chatBox.style.display = "block";
  // });

  // document.getElementById("volver").addEventListener('click', () => {
  //   chatIcon.style.display = 'block';
  //   chatBox.style.display = "none";
  // });


  document.getElementById("punto1").onclick = () => {
    document.getElementById("rating").value = 1;
  }
  document.getElementById("punto2").onclick = () => {
    document.getElementById("rating").value = 2;
  }
  document.getElementById("punto3").onclick = () => {
    document.getElementById("rating").value = 3;
  }
  document.getElementById("punto4").onclick = () => {
    document.getElementById("rating").value = 4;
  }
  document.getElementById("punto5").onclick = () => {
    document.getElementById("rating").value = 5;
  }







  // text-yellow-500
  // text-gray-500

let estrella1 = document.getElementById("punto1");
let estrella2 = document.getElementById("punto2");
let estrella3 = document.getElementById("punto3");
let estrella4 = document.getElementById("punto4");
let estrella5 = document.getElementById("punto5");

estrella1.onclick = () => {
  estrella1.classList.remove('text-gray-500');
  estrella1.classList.add('text-yellow-500');

  estrella2.classList.remove('text-yellow-500');
  estrella2.classList.add('text-gray-500');

  estrella3.classList.remove('text-yellow-500');
  estrella3.classList.add('text-gray-500');

  estrella4.classList.remove('text-yellow-500');
  estrella4.classList.add('text-gray-500');

  estrella5.classList.remove('text-yellow-500');
  estrella5.classList.add('text-gray-500');
}


estrella2.onclick = () => {
  estrella1.classList.remove('text-gray-500');
  estrella1.classList.add('text-yellow-500');

  estrella2.classList.add('text-yellow-500');
  estrella2.classList.remove('text-gray-500');

  estrella3.classList.remove('text-yellow-500');
  estrella3.classList.add('text-gray-500');

  estrella4.classList.remove('text-yellow-500');
  estrella4.classList.add('text-gray-500');

  estrella5.classList.remove('text-yellow-500');
  estrella5.classList.add('text-gray-500');
}


estrella3.onclick = () => {
  estrella1.classList.remove('text-gray-500');
  estrella1.classList.add('text-yellow-500');

  estrella2.classList.add('text-yellow-500');
  estrella2.classList.remove('text-gray-500');

  estrella3.classList.add('text-yellow-500');
  estrella3.classList.remove('text-gray-500');

  estrella4.classList.remove('text-yellow-500');
  estrella4.classList.add('text-gray-500');

  estrella5.classList.remove('text-yellow-500');
  estrella5.classList.add('text-gray-500');
}


estrella4.onclick = () => {
  estrella1.classList.remove('text-gray-500');
  estrella1.classList.add('text-yellow-500');

  estrella2.classList.add('text-yellow-500');
  estrella2.classList.remove('text-gray-500');

  estrella3.classList.add('text-yellow-500');
  estrella3.classList.remove('text-gray-500');

  estrella4.classList.add('text-yellow-500');
  estrella4.classList.remove('text-gray-500');

  estrella5.classList.remove('text-yellow-500');
  estrella5.classList.add('text-gray-500');
}


estrella5.onclick = () => {
  estrella1.classList.remove('text-gray-500');
  estrella1.classList.add('text-yellow-500');

  estrella2.classList.remove('text-gray-500');
  estrella2.classList.add('text-yellow-500');

  estrella3.classList.remove('text-gray-500');
  estrella3.classList.add('text-yellow-500');

  estrella4.classList.remove('text-gray-500');
  estrella4.classList.add('text-yellow-500');

  estrella5.classList.remove('text-gray-500');
  estrella5.classList.add('text-yellow-500');
}












</script>




<script>
  let slider1 = document.getElementById("slider1");
  let slider2 = document.getElementById("slider2");
  let slider3 = document.getElementById("slider3");

  slider1.addEventListener('mouseenter', detenerMovimiento);
  slider1.addEventListener('mouseleave', reanudarMovimiento);
  slider2.addEventListener('mouseenter', detenerMovimiento);
  slider2.addEventListener('mouseleave', reanudarMovimiento);
  slider3.addEventListener('mouseenter', detenerMovimiento);
  slider3.addEventListener('mouseleave', reanudarMovimiento);

  function detenerMovimiento() {
    slider1.classList.add('pausado');
    slider2.classList.add('pausado');
    slider3.classList.add('pausado');
  }

  function reanudarMovimiento() {
    // elementoMovil.classList.remove('pausado');
    slider1.classList.remove('pausado');
    slider2.classList.remove('pausado');
    slider3.classList.remove('pausado');
  }

  let datos = null;

  async function obtenerDatosCriptomonedas() {
  try {
    const response = await fetch(
      'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=bitcoin,ethereum,binancecoin,ripple,cardano,dogecoin,solana,litecoin,polkadot,tron&order=market_cap_desc&price_change_percentage=24h'
    );

    if (!response.ok) {
      throw new Error('Error al obtener los datos de las criptomonedas.');
    }

    const data = await response.json();
    let cont = 1;
    datos = data;
    console.log(datos);
    // document.getElementById("nombre1").innerHTML = data[0].








//para mostrar una tabla con los datos de las monedas
// Obtener la referencia a la tabla en el HTML
// const tableBody = document.querySelector(".table-auto tbody");

// // Generar filas de datos para cada criptomoneda en el array
// data.forEach((crypto) => {
//   // Crear una nueva fila en la tabla
//   const row = document.createElement("tr");
//   row.classList.add("border-b", "border-gray-200", "hover:bg-gray-100");

//   // Generar el contenido de cada celda en la fila
//   const nameCell = document.createElement("td");
//   nameCell.classList.add("py-3", "px-6", "text-left");
//   nameCell.textContent = crypto.name;
//   row.appendChild(nameCell);

//   const priceCell = document.createElement("td");
//   priceCell.classList.add("py-3", "px-6", "text-left");
//   priceCell.textContent = `$${crypto.current_price}`;
//   row.appendChild(priceCell);

//   const priceChangeCell = document.createElement("td");
//   priceChangeCell.classList.add("py-3", "px-6", "text-left");
//   priceChangeCell.textContent = `${crypto.price_change_percentage_24h}%`;
//   row.appendChild(priceChangeCell);

//   const marketCapCell = document.createElement("td");
//   marketCapCell.classList.add("py-3", "px-6", "text-left");
//   marketCapCell.textContent = `$${crypto.market_cap}`;
//   row.appendChild(marketCapCell);

//   // Agregar la fila generada a la tabla
//   tableBody.appendChild(row);
// });














    data.forEach((criptomoneda) => {
      const nombre = criptomoneda.name;
      const precio = criptomoneda.current_price;
      const cambioPorcentaje24h = criptomoneda.price_change_percentage_24h;

      let cambiar = "label" + cont;
      let cambiar2 = "label1" + cont;
      cont++;

      document.getElementById(cambiar).innerHTML = `${nombre}: $${precio.toFixed(2)} (${cambioPorcentaje24h.toFixed(2)}%)`;
      document.getElementById(cambiar2).innerHTML = `${nombre}: $${precio.toFixed(2)} (${cambioPorcentaje24h.toFixed(2)}%)`;
      if(cont>11)
        cont = 0;
      console.log(`${nombre}: $${precio.toFixed(2)} (${cambioPorcentaje24h.toFixed(2)}%)`);
    });
  } catch (error) {
    console.error(error);
  }
}

obtenerDatosCriptomonedas();
  
</script>
@endsection