 // Agregar un listener al elemento para el evento DOMSubtreeModified
 document.getElementById('abreviaturaPagar').addEventListener('DOMSubtreeModified', function() {
    // Obtener la nueva abreviatura de la moneda
    const moneda = document.getElementById('abreviaturaPagar').innerHTML;
    //console.log(saldos["btc"]);
    let monedaMinuscula = moneda.toLowerCase();

    let saldo = saldos[monedaMinuscula];

    // Actualizar el contenido del elemento h4
    if(saldo == undefined)
        document.getElementById("saldoDisponible").textContent = 0;
    else
        document.getElementById("saldoDisponible").textContent = saldo.balance;

    document.getElementById("saldoDisponible").textContent += " " + moneda;
});


let abreviaturaAMinuscula = document.getElementById("abreviaturaPagar").innerHTML;
abreviaturaAMinuscula = abreviaturaAMinuscula.toLowerCase();	



//const boton = document.querySelector('#mostrarVentana');
let boton = document.getElementById("botonComprar");
const capa = document.querySelector('#capa');
const ventana = document.querySelector('#ventana');
const mensajeInicio = document.querySelector('#mensajeInicio');
const mensajeSaldoInsuficiente = document.querySelector('#mensajeSaldoInsuficiente');
const mensajeCompraResumen = document.querySelector('#mensajeCompraResumen');
const botonCerrar = document.querySelector('#cerrarVentana');
let botonOperacion = document.getElementById("ejecutarOperacion");


// Evento click del botón de comprar
boton.addEventListener('click', () => {
    if(!limite && document.getElementById("cantidadPagar").value != ''){
        abreviaturaAMinuscula = document.getElementById("abreviaturaPagar").innerHTML;
        let saldo = saldos[abreviaturaAMinuscula.toLowerCase()].balance;
        saldo=BigNumber(saldo);
        let precio = document.getElementById("cantidadPagar").value;
        precio=BigNumber(precio);

        console.log(abreviaturaAMinuscula);
        console.log(saldos)
        console.log(precio.toNumber())
        console.log(saldo.toNumber())

        // Si no ha iniciado sesión
        if (!hayUsuario) {
            mensajeInicio.style.display = 'block';
            mensajeSaldoInsuficiente.style.display = 'none';
            mensajeCompraResumen.style.display = 'none';
            botonOperacion.style.display = 'none';
        } 
        // Si ha iniciado sesión pero el saldo es insuficiente
        else if (precio.isGreaterThan(saldo)) {
            
            mensajeInicio.style.display = 'none';
            mensajeSaldoInsuficiente.style.display = 'block';
            mensajeCompraResumen.style.display = 'none';
            botonOperacion.style.display = 'none';
        }
        // Si ha iniciado sesión y el saldo es suficiente
        else {
            mensajeInicio.style.display = 'none';
            mensajeSaldoInsuficiente.style.display = 'none';
            botonOperacion.style.display = 'block';
            botonCerrar.style.display = 'none';

            let monedaPagar = document.getElementById("abreviaturaPagar").innerHTML;
            let monedaRecibir = document.getElementById("abreviaturaRecibir").innerHTML;
            let cantidadPagar = document.getElementById("cantidadPagar").value;


            document.getElementById("logoMonedaPagar").src = document.getElementById("img-pay").src;
            document.getElementById("logoMonedaRecibir").src = document.getElementById("img-receive").src;
            document.getElementById("cantidadMonedaPagar").innerHTML = cantidadPagar;
            document.getElementById("cantidadMonedaRecibir").innerHTML = document.getElementById("cantidadPagar").value;
            document.getElementById("abreviaturaMonedaPagar").innerHTML = monedaPagar;
            document.getElementById("abreviaturaMonedaRecibir").innerHTML = monedaRecibir;

            //paga con una moneda diferente a USDT
            if(monedaPagar != "USDT"){

                fetch('https://api.binance.com/api/v3/ticker/price?symbol=' + monedaPagar + "USDT")
                    .then(response => response.json())
                    .then(data => {
                        //paga y recibe en una moneda diferente a USDT
                        if(monedaRecibir != "USDT"){
                            fetch('https://api.binance.com/api/v3/ticker/price?symbol=' + monedaRecibir + "USDT")
                                .then(response2 => response2.json())
                                .then(data2 => {
                                    let precio1 = BigNumber(data.price);
                                    let precio2 = BigNumber(data2.price);
                                    
                                    let tipoCambio = precio1.dividedBy(precio2);
                                    let tipoCambioInverso = precio2.dividedBy(precio1);

                                    let cantidadPagarBigNumber = BigNumber(cantidadPagar);
                                    let comision = cantidadPagarBigNumber.times(0.003);

                                    let cantidadConvertir = cantidadPagarBigNumber.minus(comision);
                                    let cantidadRecibir = cantidadConvertir.times(tipoCambio);


                                    document.getElementById("tipoCambio").innerHTML = tipoCambio.toFixed(8);
                                    document.getElementById("tipoCambioInverso").innerHTML = tipoCambioInverso.toFixed(8);
                                    document.getElementById("comision").innerHTML = comision.toFixed(8) + " " + monedaPagar;
                                    document.getElementById("cantidadRecibirResumen").innerHTML = cantidadRecibir.toFixed(8) + " " + monedaRecibir;
                                    document.getElementById("cantidadMonedaRecibir").innerHTML = cantidadRecibir.toFixed(8) + " " + monedaRecibir;


                                    document.getElementById("tipoCambioHidden").value = tipoCambio;
                                    document.getElementById("cantidadPagarHidden").value = cantidadPagarBigNumber;
                                    document.getElementById("monedaPagarHidden").value = monedaPagar;
                                    document.getElementById("monedaRecibirHidden").value = monedaRecibir;

                                })
                                .catch(error => {
                                    console.error('Ha ocurrido un error al obtener el precio de BTC:', error);
                                });
                        }
                        //paga en una moneda diferente a USDT y recibe en USDT
                        else{
                            let precio1 = BigNumber(data.price);
                            let precio2 = BigNumber(1);
                            
                            let tipoCambio = precio1.dividedBy(precio2);
                            let tipoCambioInverso = precio2.dividedBy(precio1);

                            let cantidadPagarBigNumber = BigNumber(cantidadPagar);
                            let comision = cantidadPagarBigNumber.times(0.003);

                            let cantidadConvertir = cantidadPagarBigNumber.minus(comision);
                            let cantidadRecibir = cantidadConvertir.times(tipoCambio);


                            document.getElementById("tipoCambio").innerHTML = tipoCambio.toFixed(8);
                            document.getElementById("tipoCambioInverso").innerHTML = tipoCambioInverso.toFixed(8);
                            document.getElementById("comision").innerHTML = comision.toFixed(8) + " " + monedaPagar;
                            document.getElementById("cantidadRecibirResumen").innerHTML = cantidadRecibir.toFixed(8) + " " + monedaRecibir;
                            document.getElementById("cantidadMonedaRecibir").innerHTML = cantidadRecibir.toFixed(8) + " " + monedaRecibir;


                            document.getElementById("tipoCambioHidden").value = tipoCambio;
                            document.getElementById("cantidadPagarHidden").value = cantidadPagarBigNumber;
                            document.getElementById("monedaPagarHidden").value = monedaPagar;
                            document.getElementById("monedaRecibirHidden").value = "usdt";
                        }
                })
                .catch(error => {
                console.error('Ha ocurrido un error al obtener el precio de la moneda con la que pagas: ', error);
                });
            }
            //paga con USDT
            else{
                //el usuario paga con USDT y recibe en una moneda diferente a USDT
                if(monedaRecibir != "USDT"){
                    fetch('https://api.binance.com/api/v3/ticker/price?symbol=' + monedaRecibir + "USDT")
                        .then(response2 => response2.json())
                        .then(data2 => {
                            let precio1 = BigNumber(1);
                            let precio2 = BigNumber(data2.price);
                            
                            let tipoCambio = precio1.dividedBy(precio2);
                            let tipoCambioInverso = precio2.dividedBy(precio1);

                            let cantidadPagarBigNumber = BigNumber(cantidadPagar);
                            let comision = cantidadPagarBigNumber.times(0.003);

                            let cantidadConvertir = cantidadPagarBigNumber.minus(comision);
                            let cantidadRecibir = cantidadConvertir.times(tipoCambio);


                            document.getElementById("tipoCambio").innerHTML = tipoCambio.toFixed(8);
                            document.getElementById("tipoCambioInverso").innerHTML = tipoCambioInverso.toFixed(8);
                            document.getElementById("comision").innerHTML = comision.toFixed(8) + " USDT";
                            document.getElementById("cantidadRecibirResumen").innerHTML = cantidadRecibir.toFixed(8) + " " + monedaRecibir;
                            document.getElementById("cantidadMonedaRecibir").innerHTML = cantidadRecibir.toFixed(8) + " " + monedaRecibir;


                            document.getElementById("tipoCambioHidden").value = tipoCambio;
                            document.getElementById("cantidadPagarHidden").value = cantidadPagarBigNumber;
                            document.getElementById("monedaPagarHidden").value = "usdt";
                            document.getElementById("monedaRecibirHidden").value = monedaRecibir;

                        })
                        .catch(error => {
                            console.error('Ha ocurrido un error al obtener el precio de la moneda en la que recibes el pago: ', error);
                        });
                }
                // por si la persona modifica el codigo fuente y selecciona pagar y recibir en USDT (de forma normal no se puede hacer).
                // Podríamos dar un mensaje de error y ya, pero por hacer la
                // coña, realmente podrá utilizar sus "USDT" para comprar "USDT"
                else{
                    let precio1 = BigNumber(1);
                    let precio2 = BigNumber(1);
                    
                    let tipoCambio = precio1.dividedBy(precio2);
                    let tipoCambioInverso = precio2.dividedBy(precio1);

                    let cantidadPagarBigNumber = BigNumber(cantidadPagar);
                    let comision = cantidadPagarBigNumber.times(0.003);

                    let cantidadConvertir = cantidadPagarBigNumber.minus(comision);
                    let cantidadRecibir = cantidadConvertir.times(tipoCambio);


                    document.getElementById("tipoCambio").innerHTML = tipoCambio.toFixed(8);
                    document.getElementById("tipoCambioInverso").innerHTML = tipoCambioInverso.toFixed(8);
                    document.getElementById("comision").innerHTML = comision.toFixed(8) + " USDT";
                    document.getElementById("cantidadRecibirResumen").innerHTML = cantidadRecibir.toFixed(8) + " " + monedaRecibir;
                    document.getElementById("cantidadMonedaRecibir").innerHTML = cantidadRecibir.toFixed(8) + " " + monedaRecibir;


                    document.getElementById("tipoCambioHidden").value = tipoCambio;
                    document.getElementById("cantidadPagarHidden").value = cantidadPagarBigNumber;
                    document.getElementById("monedaPagarHidden").value = "usdt";
                    document.getElementById("monedaRecibirHidden").value = "usdt";
                }
            }

            mensajeCompraResumen.style.display = 'block';
        }
        // Mostrar la capa gris y la ventana emergente
        capa.style.display = 'block';
        ventana.style.display = 'block';
    }
    else if(limite && document.getElementById("cantidadPagar").value != '' && document.getElementById("precioCambio").value != '' ){
        if(!hayUsuario) window.location.href = "/registro";
        else if(saldos[document.getElementById('abreviaturaPagar').innerHTML.toLowerCase()].balance < document.getElementById("cantidadPagar").value){
            alert("no tienes suficiente saldo");
        }
        else{
            document.getElementById("logoPagarVentanaEmergente").src = "/images/criptologos/" + document.getElementById("abreviaturaPagar").innerHTML + ".png";
            document.getElementById("logoRecibirVentanaEmergente").src = "/images/criptologos/" + document.getElementById("abreviaturaRecibir").innerHTML + ".png";

            var cantidadPagar = limitarDecimales(document.getElementById("cantidadPagar").value);
            
            document.getElementById("monedaPagar1").innerHTML = document.getElementById("abreviaturaPagar").innerHTML;
            document.getElementById("monedaPagar2").innerHTML = document.getElementById("abreviaturaPagar").innerHTML;
            
            document.getElementById("monedaRecibir1").innerHTML = document.getElementById("abreviaturaRecibir").innerHTML;
            document.getElementById("monedaRecibir2").innerHTML = document.getElementById("abreviaturaRecibir").innerHTML;

            document.getElementById("monedaPagarLimiteResumen").innerHTML = document.getElementById("abreviaturaPagar").innerHTML;

            var cantidadPagar = limitarDecimales(document.getElementById("cantidadPagar").value);
            document.getElementById("CantidadPagarLimiteResumen").innerHTML = cantidadPagar;
            
            var precioCambio = limitarDecimales(document.getElementById("precioCambio").value);
            var cantidadPagar = limitarDecimales(document.getElementById("cantidadPagar").value);
            let comision = 0.003 * cantidadPagar;
            var comisionResumenLimite = limitarDecimales(comision);
            document.getElementById("comisionResumenLimite").innerHMTL = comisionResumenLimite;

            document.getElementById("tCambio").innerHTML = precioCambio;

            var cantidadRecibirLimite = limitarDecimales((cantidadPagar - comisionResumenLimite) * precioCambio);
            document.getElementById("CantidadRecibirLimiteResumen").innerHTML = limitarDecimales(cantidadRecibirLimite);
            document.getElementById("comisionResumenLimite").innerHTML = comisionResumenLimite;

            mostrarVentanaEmergente();

            document.getElementById("cantidadPagarLimite").value = cantidadPagar;
            document.getElementById("tipoCambioLimite").value = precioCambio;
            document.getElementById("monedaPagarLimite").value = document.getElementById("abreviaturaPagar").innerHTML.toLowerCase();
            document.getElementById("monedaRecibirLimite").value = document.getElementById("abreviaturaRecibir").innerHTML.toLowerCase();

			document.getElementById("aviso").innerHTML = document.getElementById("precioSuperior").innerHTML;
            
        }
























































        
    }
});

// Evento click del botón de cerrar la ventana
botonCerrar.addEventListener('click', () => {
// Ocultar la capa gris y la ventana emergente
capa.style.display = 'none';
ventana.style.display = 'none';
});

document.getElementById("cerrarVentana2").addEventListener('click', () => {
    // Ocultar la capa gris y la ventana emergente
    capa.style.display = 'none';
    ventana.style.display = 'none';
});
    const elementos = document.querySelectorAll('.title');
    const estados = {};

    elementos.forEach(elemento => {
        const id = elemento.getAttribute('id');
        const respuesta = document.getElementById(`respuesta${id}`);
        estados[id] = false;

        elemento.addEventListener('click', () => {
            const altura = respuesta.scrollHeight;
            const estado = estados[id];

            if (!estado) {
                respuesta.style.maxHeight = `${altura}px`;
                respuesta.classList.add('mostrar');
                estados[id] = true;
            } else {
                respuesta.style.maxHeight = '0';
                respuesta.classList.remove('mostrar');
                estados[id] = false;
            }
        });
    });



    function limitarDecimales(numero) {
        var decimales = contarDecimales(numero);
        
        if (decimales > 8) {
          return numero.toFixed(8);
        } else {
          return numero;
        }
      }
      

      function contarDecimales(numero) {
        if (Math.floor(numero) === numero) {
            return 0; // No tiene decimales
        } else {
            let numPartes = numero.toString().split('.').length;
            if(numPartes == 1) return 0;
            else return numero.toString().split('.')[1].length;
        }
      }
      