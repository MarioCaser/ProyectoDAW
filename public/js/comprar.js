const logoContainerPay = document.getElementById('logo-pay');
const selectContainerPay = document.getElementById('select-pay');
const lista = document.getElementById("currency-list-pay");
const elementosLi = lista.querySelectorAll("li");
let searchContainer = document.getElementById("search-container-pay");
const cryptoContainer = document.getElementById('crypto-container-pay');
const currencyList = document.querySelectorAll('.currency-list-pay li');
// let limite = false;


console.log(criptoArray);

if(hayUsuario){
    
    criptoArray.forEach((moneda, index) => {
        let monedaMinuscula = moneda[2].toLocaleLowerCase();
        if(saldos[monedaMinuscula] != undefined)
            moneda[4] = saldos[monedaMinuscula].balance;
    });  
    criptoArray.sort((a, b) => b[4] - a[4]);
}



logoContainerPay.addEventListener('click', () => {
    selectContainerPay.classList.toggle('active');

    for (let i = 1; i < elementosLi.length; i++)
        elementosLi[i].style.display = "block";

    if(searchContainer.style.display == "block")
        searchContainer.style.display = "none";
    else
        searchContainer.style.display = "block";

    
    if(selectContainerPay.style.display == "block")
        selectContainerPay.style.display = "none";
    else
        selectContainerPay.style.display = "block";
});



// Agregar un event listener al objeto document
document.addEventListener('click', function(event) {
    // Verificar si el evento click se originó fuera del div crypto-container
    if (!selectContainerPay.contains(event.target) && !cryptoContainer.contains(event.target)) {
        // Ocultar el div crypto-container
        // Verificar si el elemento está mostrándose antes de ocultarlo
        if (selectContainerPay.classList.contains('active')) {
            selectContainerPay.classList.toggle('active');
        }
        if(searchContainer.style.display == "block")
            searchContainer.style.display = "none";
        
        if(selectContainerPay.style.display == "block")
            selectContainerPay.style.display = "none";
        
    }
});

//para añadir las monedas a la lista
function addCurrencies(criptos) {
    const ul = document.getElementById("currency-list-pay");

    const nuevoArray2 = criptos.filter(function(elemento) {
        return elemento[2] !== document.getElementById("abreviaturaPagar").innerHTML;
    });
    const nuevoArray = nuevoArray2.filter(function(elemento) {
        return elemento[2] !== document.getElementById("abreviaturaRecibir").innerHTML;
    });

    for (let i = 0; i < nuevoArray.length; i++) {
        const li = document.createElement("li");
        li.setAttribute("data-value", nuevoArray[i][0]);


        let img = document.createElement("img");

        img.setAttribute("src", '/images/criptologos/' + nuevoArray[i][2] + '.png');
        img.setAttribute("alt", `${nuevoArray[i][1]} Logo`);

        const div = document.createElement("div");
        div.classList.add("currency-info");

        const name = document.createElement("div");
        name.classList.add("currency-name");
        name.innerHTML = nuevoArray[i][1];

        const symbol = document.createElement("div");
        symbol.classList.add("currency-symbol");
        symbol.innerHTML = nuevoArray[i][2];

        div.appendChild(name);
        div.appendChild(symbol);

        li.appendChild(img);
        li.appendChild(div);

        li.addEventListener('click', function() {
            const imgElement = document.querySelector('#logo-pay img');
            imgElement.src = '/images/criptologos/' + nuevoArray[i][2] + '.png';
            document.getElementById("abreviaturaPagar").innerHTML = nuevoArray[i][2];
            
            const currencyList = document.getElementById("currency-list-pay");
            while (currencyList.firstChild)
                currencyList.removeChild(currencyList.firstChild);
            addCurrencies(criptoArray);

            const currencyListReceive = document.getElementById("currency-list-receive");
            while (currencyListReceive.firstChild)
                currencyListReceive.removeChild(currencyListReceive.firstChild);
            addCurrenciesReceive(criptoArray);

            if(limite){
                precioCambioLimite();
            }
            document.getElementById("cantidadPagar").value = '';
            document.getElementById("cantidadRecibir").value = '';
        });

        if(nuevoArray[i][4] != 0){
            //console.log(nuevoArray[i]);
            const balance = document.createElement("div");
            balance.classList.add("currency-balance");
            balance.innerHTML = nuevoArray[i][4];

            const euro = document.createElement("div");
            euro.classList.add("currency-euro");
            // euro.innerHTML = (nuevoArray[i][4] * 5).toFixed(2) + " €";
            euro.innerHTML = saldos[nuevoArray[i][2].toLowerCase()].total.toFixed(2) + "€";

            let aux = document.createElement("div");
            aux.classList.add("auxDerecha");
            aux.appendChild(balance);
            aux.appendChild(euro);
            li.appendChild(aux);
        }



        ul.appendChild(li);
    }
}
    addCurrencies(criptoArray);




//-----------------------------------------------------------------------------
//fin del añadir las monedas al div de pagar, ahora añadiré las monedas al div de recibir. Será prácricamente igual que arriba
//-----------------------------------------------------------------------------


const logoContainerReceive = document.getElementById('logo-receive');
const selectContainerReceive = document.getElementById('select-receive');
const listaReceive = document.getElementById("currency-list-receive");
const elementosLiReceive = listaReceive.querySelectorAll("li");
let searchContainerReceive = document.getElementById("search-container-receive");
const cryptoContainerReceive = document.getElementById('crypto-container-receive');
const currencyListReceive = document.querySelectorAll('.currency-list-receive li');

logoContainerReceive.addEventListener('click', () => {
    selectContainerReceive.classList.toggle('active');

    for (let i = 1; i < elementosLiReceive.length; i++)
        elementosLiReceive[i].style.display = "block";

    if(searchContainerReceive.style.display == "block")
        searchContainerReceive.style.display = "none";
    else
        searchContainerReceive.style.display = "block";

    
    if(selectContainerReceive.style.display == "block")
        selectContainerReceive.style.display = "none";
    else
        selectContainerReceive.style.display = "block";
});



// Agregar un event listener al objeto document
document.addEventListener('click', function(event) {
    // Verificar si el evento click se originó fuera del div crypto-container
    if (!selectContainerReceive.contains(event.target) && !cryptoContainerReceive.contains(event.target)) {
        // Ocultar el div crypto-container
        // Verificar si el elemento está mostrándose antes de ocultarlo
        if (selectContainerReceive.classList.contains('active')) {
            selectContainerReceive.classList.toggle('active');
        }
        if(searchContainerReceive.style.display == "block")
        searchContainerReceive.style.display = "none";
        
        if(selectContainerReceive.style.display == "block")
        selectContainerReceive.style.display = "none";
        
    }
});

//para añadir las monedas a la lista
function addCurrenciesReceive(criptos) {
    const ul = document.getElementById("currency-list-receive");

    const nuevoArray2 = criptos.filter(function(elemento) {
        return elemento[2] !== document.getElementById("abreviaturaRecibir").innerHTML;
    });
    let nuevoArray = nuevoArray2.filter(function(elemento) {
        return elemento[2] !== document.getElementById("abreviaturaPagar").innerHTML;
    });

    for (let i = 0; i < nuevoArray.length; i++) {
        const li = document.createElement("li");
        li.setAttribute("data-value", nuevoArray[i][0]);

        const img = document.createElement("img");
        img.setAttribute("src", '/images/criptologos/' + nuevoArray[i][2] + '.png');
        img.setAttribute("alt", `${nuevoArray[i][1]} Logo`);

        const div = document.createElement("div");
        div.classList.add("currency-info");

        const name = document.createElement("div");
        name.classList.add("currency-name");
        name.innerHTML = nuevoArray[i][1];

        const symbol = document.createElement("div");
        symbol.classList.add("currency-symbol");
        symbol.innerHTML = nuevoArray[i][2];

        div.appendChild(name);
        div.appendChild(symbol);

        li.appendChild(img);
        li.appendChild(div);

        li.addEventListener('click', function() {
            const imgElement = document.querySelector('#logo-receive img');
            imgElement.src = '/images/criptologos/' + nuevoArray[i][2] + '.png';
            document.getElementById("abreviaturaRecibir").innerHTML = nuevoArray[i][2];

            const currencyList = document.getElementById("currency-list-receive");
            while (currencyList.firstChild)
                currencyList.removeChild(currencyList.firstChild);
            addCurrenciesReceive(criptoArray);


            const currencyListPay = document.getElementById("currency-list-pay");
            while (currencyListPay.firstChild)
                currencyListPay.removeChild(currencyListPay.firstChild);
            addCurrencies(criptoArray);

            if(limite){
                precioCambioLimite();
            }
            document.getElementById("cantidadPagar").value = '';
            document.getElementById("cantidadRecibir").value = '';
        });

        ul.appendChild(li);
    }
}

addCurrenciesReceive(criptoArray);



//------------------------------------------------------------------------------------------
//fin del añadir las monedas a la lista de recibir
//------------------------------------------------------------------------------------------



// El buscador pay

$('#search-container-pay input[type="text"]').on('keyup', function() {
    const searchTerm = $(this).val().toLowerCase();
    const listItems = $('.currency-list-pay li');

    listItems.each(function() {
        const currencyName = $(this).find('.currency-name').text().toLowerCase();
        const currencySymbol = $(this).find('.currency-symbol').text().toLowerCase();

        if (currencyName.includes(searchTerm) || currencySymbol.includes(searchTerm)) {
        $(this).show();
        } else {
        $(this).hide();
        }
    });
});


//el buscador recibir

$('#search-container-receive input[type="text"]').on('keyup', function() {
    const searchTerm = $(this).val().toLowerCase();
    const listItems = $('.currency-list-receive li');

    listItems.each(function() {
        const currencyName = $(this).find('.currency-name').text().toLowerCase();
        const currencySymbol = $(this).find('.currency-symbol').text().toLowerCase();

        if (currencyName.includes(searchTerm) || currencySymbol.includes(searchTerm)) {
        $(this).show();
        } else {
        $(this).hide();
        }
    });
});




var preciosCriptos = null;
// Hacemos la petición a la API de Binance
fetch('https://api.binance.com/api/v3/ticker/price')
  .then(response => response.json())
  .then(data => {
    preciosCriptos = data;
    if(document.getElementById("cantidadPagar").value != ""){
        document.getElementById("cantidadPagar").value = "";
    }
});


/* Para que los input sea más refachero */
const miInput = document.getElementById("cantidadPagar");

miInput.addEventListener("input", function() {
    const valor = this.value;
    const regex = /^\d*[.]?\d*$/;

    if (!regex.test(valor)) {
        this.value = valor.slice(0, valor.length - 1);
    }
    let simbolo1 = document.getElementById("abreviaturaPagar").innerHTML + "USDT";
    let simbolo2 = document.getElementById("abreviaturaRecibir").innerHTML + "USDT";

    

    let precio1;
    let precio2;
    if(simbolo1 == "USDTUSDT")
        precio1 = 1;
    else
        for (let i = 0; i < preciosCriptos.length; i++)
            if (preciosCriptos[i].symbol == simbolo1) {
                precio1 = preciosCriptos[i].price;
                break;
            }
    if(simbolo2 == "USDTUSDT")
        precio2 = 1;
    else
        for (let i = 0; i < preciosCriptos.length; i++)
            if (preciosCriptos[i].symbol == simbolo2) {
                precio2 = preciosCriptos[i].price;
                break;
            }
    let precioDefinitivo = precio1/precio2;
    if(!limite)
        document.getElementById("cantidadRecibir").value = precioDefinitivo * this.value;
    else{
        if(document.getElementById("precioCambio").value == '' || document.getElementById("cantidadPagar").value == ''){
            document.getElementById("cantidadRecibir").value = '';
        }
        else{
            var input = document.getElementById("precioCambio").value;
            // Verifica si el valor contiene solo números
            if (/^\d+(\.\d+)?$/.test(input)) {
                document.getElementById("cantidadRecibir").value = this.value * document.getElementById("precioCambio").value;
            } else {
                document.getElementById("cantidadRecibir").value = '';
            }
        }
    }
        
});






function validarNumero(input) {
    // Obtén el valor actual del campo de entrada
    var valor = input.value;
  
    // Reemplaza cualquier carácter que no sea número o punto por una cadena vacía
    valor = valor.replace(/[^0-9.]/g, '');
  
    // Verifica si el valor contiene más de un punto decimal
    if ((valor.match(/\./g) || []).length > 1) {
      valor = valor.replace(/\.+$/, ''); // Elimina puntos adicionales al final
    }
  
    // Verifica si el punto es el primer carácter
    if (valor.indexOf('.') === 0) {
      valor = valor.replace('.', ''); // Elimina el punto
    }
  
    // Actualiza el valor del campo de entrada con el valor validado
    input.value = valor;




        if(document.getElementById("precioCambio").value == '' || document.getElementById("cantidadPagar").value == ''){
            document.getElementById("cantidadRecibir").value = '';
        }
        else{
            var input = document.getElementById("precioCambio").value;
            // Verifica si el valor contiene solo números
            if (/^\d+(\.\d+)?$/.test(input)) {
                document.getElementById("cantidadRecibir").value = document.getElementById("precioCambio").value * document.getElementById("cantidadPagar").value;
            } else {
                document.getElementById("cantidadRecibir").value = '';
            }
        }
        let precioMercado = parseFloat(document.getElementById("labelPrecioMercado2").innerHTML);
        let precioEscrito = parseFloat(document.getElementById("precioCambio").value);
        if (precioEscrito < precioMercado) {
            console.log("juan");
            console.log(precioEscrito)
            console.log(precioMercado)
            document.getElementById("precioSuperior").textContent = "El precio de venta indicado es inferior al precio de mercado, por lo que se venderá al precio de mercado actual";
        } else {
            console.log(precioEscrito)
            console.log(precioMercado)
            console.log("juan inalámbrico");
            document.getElementById("precioSuperior").textContent = '';
        }        
  }
  
  


  
  


const miInputRecibir = document.getElementById("cantidadRecibir");

miInputRecibir.addEventListener("input", function() {
    const valor = this.value;
    const regex = /^\d*[.]?\d*$/;

    if (!regex.test(valor))
        this.value = valor.slice(0, valor.length - 1);
});


//para que el botón de intercambiar cambie las monedas de pagar y recibir
function intercambiar() {
    // intercambiar texto de h2
    const h2Pagar = document.getElementById("abreviaturaPagar");
    const h2Recibir = document.getElementById("abreviaturaRecibir");
    const temp = h2Pagar.innerText;
    h2Pagar.innerText = h2Recibir.innerText;
    h2Recibir.innerText = temp;

    // intercambiar imágenes
    const imgPay = document.getElementById("logo-pay").getElementsByTagName("img")[0];
    const imgReceive = document.getElementById("logo-receive").getElementsByTagName("img")[0];
    const tempSrc = imgPay.src;
    imgPay.src = imgReceive.src;
    imgReceive.src = tempSrc;

    document.getElementById("cantidadPagar").value = "";
    document.getElementById("cantidadRecibir").value = "";
    if(limite)
        actualizaLimite();
}

document.getElementById("boton").onclick = () => intercambiar();


document.getElementById("limite").onclick = () => {
    if(limite == false){
        ordenLimite();
        limite = true;

        let mercadoDiv = document.getElementById('mercado');
        mercadoDiv.classList.remove('marcado');
        mercadoDiv.style.color = '#9b9b9b';

        let limiteDiv = document.getElementById('limite');
        limiteDiv.classList.add('marcado');
        limiteDiv.style.color = "black";
        precioCambioLimite();
    }
    document.getElementById("precioCambio").oninput = function() {
        validarNumero(this);
    };

    
}
document.getElementById("mercado").onclick = () => {
    if(limite == true){                
        let precioLimiteDiv = document.getElementById('precioLimite');

        while (precioLimiteDiv.firstChild)
            precioLimiteDiv.removeChild(precioLimiteDiv.firstChild);

        
        let limiteDiv = document.getElementById('limite');
        limiteDiv.classList.remove('marcado');
        limiteDiv.style.color = '#9b9b9b';

        let mercadoDiv = document.getElementById('mercado');
        mercadoDiv.classList.add('marcado');
        mercadoDiv.style.color = "black";  



        limite = false;
    }
}

function ordenLimite(){
    const precioLimiteDiv = document.getElementById('precioLimite');
    const br1 = document.createElement('br');
    const br2 = document.createElement('br');
    precioLimiteDiv.appendChild(br1);
    precioLimiteDiv.appendChild(br2);

    const divContenedor = document.createElement('div');
    divContenedor.style.display = 'inline-block';

    // const labelPrecio = document.createElement('label');
    // labelPrecio.textContent = 'Precio de conversión:';





    // Crear el elemento <div>
    const divLabels = document.createElement('div');
    divLabels.style.display = 'flex';
    divLabels.style.flexDirection = 'column';

    // Crear el primer <label> "Precio de cambio:"
    const labelPrecioCambio = document.createElement('label');
    labelPrecioCambio.textContent = 'Precio de cambio: ';
    divLabels.appendChild(labelPrecioCambio);

    // Crear el segundo <label> con el estilo en línea y el id "precioSuperior"
    const labelPrecioSuperior = document.createElement('label');
    labelPrecioSuperior.style.color = 'red';
    labelPrecioSuperior.id = 'precioSuperior';
    divLabels.appendChild(labelPrecioSuperior);







    const divPagar = document.createElement('div');
    divPagar.className = 'pagar';
    divPagar.style.height = '45px';

    const labelCantidad = document.createElement('label');
    labelCantidad.className = 'informacionGris';
    labelCantidad.textContent = '1 ';

    const labelMoneda = document.createElement('label');
    labelMoneda.className = 'informacionGris';
    labelMoneda.id = 'monedaPrecio';
    // labelMoneda.textContent = 'BTC= ';
    let monedaPagar = document.getElementById("abreviaturaPagar").innerHTML;
    labelMoneda.textContent = monedaPagar + '= ';

    const inputPrecio = document.createElement('input');
    inputPrecio.type = 'text';
    inputPrecio.id = 'precioCambio';
    inputPrecio.className = 'cantidadPagar';
    inputPrecio.placeholder = '0.00';
    inputPrecio.autocomplete = 'off';
    inputPrecio.value = '';
    inputPrecio.style.fontSize = '1em';
    inputPrecio.style.width = '70%';
    inputPrecio.style.fontWeight = 'normal';
    inputPrecio.style.height = '35px';

    const divCryptoContainer = document.createElement('div');
    divCryptoContainer.className = 'crypto-container';
    divCryptoContainer.id = 'crypto-container-pay';

    const divInfo = document.createElement('div');
    divInfo.className = 'info';

    const h6Abreviatura = document.createElement('h6');
    h6Abreviatura.id = 'abreviaturaSegundaMoneda';
    h6Abreviatura.className = 'informacionGris';
    // h6Abreviatura.textContent = 'ETH';
    let monedaRecibir = document.getElementById("abreviaturaRecibir").innerHTML;
    h6Abreviatura.textContent = monedaRecibir;


    divInfo.appendChild(h6Abreviatura);
    divCryptoContainer.appendChild(divInfo);
    divPagar.appendChild(labelCantidad);
    divPagar.appendChild(labelMoneda);
    divPagar.appendChild(inputPrecio);
    divPagar.appendChild(divCryptoContainer);

    const divPrecioMercado = document.createElement('div');
    divPrecioMercado.style.textAlign = 'right';

    const labelPrecioMercado1 = document.createElement('label');
    labelPrecioMercado1.className = 'informacionGris';
    labelPrecioMercado1.textContent = 'Precio de mercado:';

    const labelPrecioMercado2 = document.createElement('label');
    labelPrecioMercado2.id="labelPrecioMercado2";
    labelPrecioMercado2.className = 'informacionGris';
    // labelPrecioMercado2.textContent = '29,748.22€';

    //actualizamos el precio de mercado de una moneda con respecto a la otra
    
    divPrecioMercado.appendChild(labelPrecioMercado1);
    divPrecioMercado.appendChild(labelPrecioMercado2);

    divContenedor.appendChild(divLabels);
    divContenedor.appendChild(divPagar);
    divContenedor.appendChild(divPrecioMercado);
    precioLimiteDiv.appendChild(divContenedor);
    actualizaLimite();
}

var imagenOriginal = document.getElementById("imagenIntercambiar").src;
var imagenNueva = "/images/intercambiarHover.png";
    
document.getElementById("imagenIntercambiar").addEventListener("mouseover", function(){
    this.src = imagenNueva;
});

document.getElementById("imagenIntercambiar").addEventListener("mouseout", function(){
    this.src = imagenOriginal;
});



function precioCambioLimite(){
    let moneda1 = document.getElementById("abreviaturaPagar").innerHTML;
    let moneda2 = document.getElementById("abreviaturaRecibir").innerHTML;
    // let cambiar = false;
    // var arrayValores = [];

    // if(moneda1 == "BUSD"){
    //     cambiar = true;
    // }
    // else if(moneda1 == "USDT")
    //     cambiar = true;
    // else if(moneda1 == "EUR"){
    //     if(moneda2 != "BUSD" && moneda2 != "USDT")
    //         cambiar = true;
    // }
    // else{
        
    //     getCryptoArrayReceive().then((result) => {
    //         let num = result.length + 1;
    //         result[result.length-1] = [num,"Euro","EUR","https://img.favpng.com/11/2/17/euro-sign-currency-symbol-exchange-rate-money-png-favpng-n5Hzj51yiivDvYZbWw2SaEVxx.jpg"];
    //         arrayValores = result;
    //         if(compararPosiciones(arrayValores,moneda1,moneda2) == moneda1){
    //             cambiar = true;
    //             console.log("se cambia");
    //         }
    //         else if(compararPosiciones(arrayValores,moneda1,moneda2) == null)
    //             console.log("alguno de los dos no se ha encontrado");
    //     });
    // }

    // if(cambiar == true){
    //     let aux = moneda1;
    //     moneda1 = moneda2;
    //     moneda2 = aux;
    // }
    document.getElementById("monedaPrecio").innerHTML = moneda1 + " = ";
    document.getElementById("abreviaturaSegundaMoneda").innerHTML = moneda2 + " ";                
}

function compararPosiciones(arr, nombre1, nombre2) {

    let pos1 = -1;
    let pos2 = -1;

    for (let i = 0; i < arr.length; i++) {
        if (arr[i][2] === nombre1) {
            pos1 = i;
        } else if (arr[i][2] === nombre2) {
            pos2 = i;
        }

        if (pos1 !== -1 && pos2 !== -1)
            break;
    }

    if (pos1 > pos2) {
        return nombre1;
    } else if (pos2 > pos1) {
        return nombre2;
    } else {
        return null;
    }
}



//función para que cuando se reciban parámetros mediante $_GET se muestren esas monedas en el apartado de intercambiar

function showGet(moneda1, moneda2, criptos) {
    
    const abbreviationsToFind = [moneda1, moneda2];
    
    let src1 = '';
    let src2 = '';

    for (const element of criptos) {
        if(element[2] == moneda1){
            src1 = element[3];
        }
        if(element[2] == moneda2){
            src2 = element[3];
        }
    }



    //en caso de que las dos monedas pasadas por get estén en la lista de monedas disponibles
    if (src1 != '' && src2 != '') {

        //pongo la imagen y la abreviatura de las monedas que se pasan como parámetro mediante get
        const imgElement = document.querySelector('#logo-pay img');
        imgElement.src = src1;
        console.log(document.getElementById("abreviaturaPagar").innerHTML);
        console.log(moneda1);
        document.getElementById("abreviaturaPagar").innerHTML = moneda1;

        const imgElement2 = document.querySelector('#logo-receive img');
        imgElement2.src = src2;
        document.getElementById("abreviaturaRecibir").innerHTML = moneda2;
        
        //elimino la moneda 1 y la moneda 2 de la lista de monedas
        const aux1 = criptos.filter(function(elemento) {
            return elemento[2] !== moneda1;
        });
        const aux2 = aux1.filter(function(elemento) {
            return elemento[2] !== moneda2;
        });

        //añado la lista de monedas sin la moneda 1 y 2 en las dos listas desplegables
        const currencyList = document.getElementById("currency-list-pay");
        while (currencyList.firstChild)
            currencyList.removeChild(currencyList.firstChild);
        addCurrencies(aux2);

        const currencyListReceive = document.getElementById("currency-list-receive");
        while (currencyListReceive.firstChild)
            currencyListReceive.removeChild(currencyListReceive.firstChild);
        addCurrenciesReceive(aux2);

        if(limite){
            precioCambioLimite();
        }
    } else {
        console.log(`Las abreviaturas ${abbreviationsToFind.join(', ')} no se encuentran en el array`);
    }
}
showGet(from2, to2, criptoArray);




// Obtener referencia al elemento HTML
const abreviaturaPagar = document.getElementById('abreviaturaPagar');

// Función a ejecutar cuando se produzca un cambio en el contenido
function observarCambios(mutationsList) {
    for (let mutation of mutationsList) {
        if (mutation.type === 'childList' || mutation.type === 'characterData') {
            // Se ha producido un cambio en el contenido del elemento
            if (limite) {
                actualizaLimite();
            }
        }
    }
}

// Crear una instancia del MutationObserver
const observer = new MutationObserver(observarCambios);

// Configurar las opciones de observación
const config = { characterData: true, childList: true, subtree: true };

// Observar los cambios en el contenido del elemento
observer.observe(abreviaturaPagar, config);



// función para actualizar el precio de mercado de una moneda con respecto a otra

function actualizaLimite(){
    //obtener el precio de una moneda con respecto a otra

    //primero obtenemos el precio en dolares de la moneda en la que paga
    let precio1 = null;
    let monedaPagar = document.getElementById("abreviaturaPagar").innerHTML;
    let monedaRecibir = document.getElementById("abreviaturaRecibir").innerHTML;
    if(monedaPagar == 'USDT'){
        precio1 = 1;
    }
    else{
        const url = `https://api.binance.com/api/v3/ticker/price?symbol=${monedaPagar + "USDT"}`;
    
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const price = data.price;
                precio1 = price;
                // console.log(`El precio de ${symbol} es: ${price}`);
                // Aquí puedes hacer lo que desees con el precio obtenido

                //es asíncrono, por lo que si queremos que se realice en orden hay que meter un fetch dentro del otro
                let precio2 = null;
                if(monedaRecibir == 'USDT'){
                    precio2 = 1;
                }
                else{
                    const url = `https://api.binance.com/api/v3/ticker/price?symbol=${monedaRecibir + "USDT"}`;
                
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            const price = data.price;
                            precio2 = price;
                            // console.log(`El precio de ${symbol} es: ${price}`);
                            // Aquí puedes hacer lo que desees con el precio obtenido
                            let precioMercado = precio1 / precio2;
                            document.getElementById("labelPrecioMercado2").textContent = precioMercado;
                        })
                        .catch(error => console.error(error));
                }

            })
            .catch(error => console.error(error));
    }

    //intercambiamos los labels con las abreviaturas de las monedas
    document.getElementById("monedaPrecio").innerHTML = document.getElementById("abreviaturaPagar").innerHTML + " = ";
    document.getElementById("abreviaturaSegundaMoneda").innerHTML = document.getElementById("abreviaturaRecibir").innerHTML;
}