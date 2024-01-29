var mensajeError = document.getElementById('errorMessage');
        // Si el mensaje de error existe, mostrar la capa de fondo y la ventana de error
        if (mensajeError) {
            document.getElementById("capa").style.display = "block";
            document.getElementById('myModal').style.display = "block";

            // Agregar un evento al botón "Cerrar" para ocultar la capa de fondo y la ventana de error
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById("capa").style.display = "none";
                document.getElementById('myModal').style.display = "none";
            });
        }
        
        let boton = document.getElementById("botonVentana");
        let botonCerrar = document.getElementById("cerrar-ventana");

        // Evento click del botón de cerrar la ventana
        botonCerrar.addEventListener('click', () => {
            // Ocultar la capa gris y la ventana emergente
            capa.style.display = 'none';
            ventana.style.display = 'none';
            document.getElementById("resultado").innerHTML = "--";
            document.getElementById("cantidad").value = "";
            // document.getElementById("auscripcionAutomatica").checked = false;
            document.getElementById("fechaReembolsoTexto").innerHTML = "Fecha reembolso";
            document.getElementsById("cantidad").innerHTML = "";
        });


        function addNodos(grupo){
            for(let i=0;i<grupo.length;i++){
                // Obtener el elemento con el id "prueba"
                var prueba = document.getElementById("lista");

                // Crear los nodos
                var div1 = document.createElement("div");
                div1.classList.add("debajo");

                var div2 = document.createElement("div");
                div2.classList.add("rentabilidadMoneda", "flex", "items-center");

                var div3 = document.createElement("div");
                div3.classList.add("item", "item-1", "flex", "items-center");

                var div4 = document.createElement("div");
                div4.classList.add("divMoneda", "flex", "items-center");

                var div5 = document.createElement("div");
                div5.classList.add("logoMoneda");

                var img = document.createElement("img");
                img.src = "images/criptologos/" + grupo[i][0].currency.toUpperCase() + ".png";
                img.alt = "Logo";
                img.width = "35";

                var div6 = document.createElement("div");
                div6.classList.add("text");

                var label = document.createElement("label");
                label.classList.add("abreviaturaMoneda");
                label.textContent = grupo[i][0].currency.toUpperCase();

                var div7 = document.createElement("div");
                div7.id = grupo[i][0].currency;
                div7.classList.add("item", "item-2", "flex", "items-center");
                div7.textContent = parseFloat(grupo[i][grupo[i].length - 1].APR).toFixed(2) + "%";

                

                var div8 = document.createElement("div");
                div8.classList.add("item", "item-3", "flex", "items-center");

                let botones = [];

                for(let j=0;j<grupo[i].length;j++){

                    let button = document.createElement("button");
                    if(j+1 != grupo[i].length)
                        button.classList.add("bg-gray-200", "hover:bg-gray-300", "text-gray-800", "font-medium", "py-2", "px-4", "rounded");
                    else
                        button.classList.add("bg-white", "border-2", "border-amber-500", "text-gray-800","font-medium", "py-2", "px-4", "rounded");
                        

                    button.textContent = grupo[i][j].duracion;

                    botones[botones.length] = button;
                }


                var div9 = document.createElement("div");
                div9.classList.add("item", "item-4", "flex", "items-center");

                let button4 = document.createElement("button");
                button4.classList.add("bg-amber-500", "hover:bg-amber-400", "text-white", "font-bold", "py-2", "px-4", "rounded");
                button4.textContent = "Suscribirse";
                button4.id = "subscribe" + grupo[i][0].currency;
                

                button4.onclick = () => {
                    console.log(grupo[i][grupo[i].length - 1]);
                    // document.getElementById("aprEstimado").innerHTML = parseFloat(grupo[i][grupo[i].length - 1]["APR"]).toFixed(2) + "%";
                    document.getElementById("apraprox").innerHTML = parseFloat(grupo[i][grupo[i].length - 1]["APR"]).toFixed(2) + "%";
                    document.getElementById("duracionDias").innerHTML = grupo[i][grupo[i].length - 1]["duracion"]
                    document.getElementById("fechaSuscripcion").innerHTML = `${new Date().getHours().toString().padStart(2, '0')}:${new Date().getMinutes().toString().padStart(2, '0')} ${new Date().getDate().toString().padStart(2, '0')}-${(new Date().getMonth()+1).toString().padStart(2, '0')}-${new Date().getFullYear()}`;
                    

                    // Obtener la fecha y hora actual en hora local
                    const now = new Date();

                    // Crear un nuevo objeto Date para la hora UTC de hoy a las 00:00
                    let utcMidnight = new Date();
                    utcMidnight.setUTCHours(0, 0, 0, 0);

                    // Ajustar la hora UTC a la hora local
                    utcMidnight.setTime(utcMidnight.getTime() - now.getTimezoneOffset() * 60 * 1000);

                    // Si la fecha y hora ya ha pasado hoy, sumar un día y ajustar la hora a la hora local
                    if (utcMidnight < now) {
                        utcMidnight.setDate(utcMidnight.getDate() + 1);
                        utcMidnight.setTime(utcMidnight.getTime() + now.getTimezoneOffset() * 60 * 1000);
                    }

                    // Formatear la fecha y hora en el formato deseado
                    const formattedDate = `${utcMidnight.getHours().toString().padStart(2, '0')}:${utcMidnight.getMinutes().toString().padStart(2, '0')} ${utcMidnight.getDate().toString().padStart(2, '0')}-${(utcMidnight.getMonth()+1).toString().padStart(2, '0')}-${utcMidnight.getFullYear()}`;

                    // Mostrar la fecha formateada por consola
                    document.getElementById("fechaValor").innerHTML = formattedDate;

                    //para hacer la fecha final


                    document.getElementById("apraprox").innerHTML = parseFloat(grupo[i][grupo[i].length - 1]["APR"]).toFixed(2) + "%";
                    document.getElementById("duracionDias").innerHTML = grupo[i][grupo[i].length - 1]["duracion"];
                    document.getElementById("monedaEarn").innerHTML = grupo[i][grupo[i].length - 1]["currency"].toUpperCase();
                    document.getElementById("logoMonedaEarn").src = "images/criptologos/" + grupo[i][grupo[i].length - 1]["currency"].toUpperCase() + ".png";

                    // Sumar 60 días
                    utcMidnight.setDate(utcMidnight.getDate() + parseFloat(grupo[i][grupo[i].length - 1]["duracion"]));

                    // Volver a ajustar la hora UTC
                    const formattedDate2 = `${utcMidnight.getHours().toString().padStart(2, '0')}:${utcMidnight.getMinutes().toString().padStart(2, '0')} ${utcMidnight.getDate().toString().padStart(2, '0')}-${(utcMidnight.getMonth()+1).toString().padStart(2, '0')}-${utcMidnight.getFullYear()}`;

                    document.getElementById("fechaFin").innerHTML = formattedDate2; // Output: "Sun, 03 Jul 2023 00:00:00 GMT" (ejemplo)

                    utcMidnight.setHours(utcMidnight.getHours() + 10);

                    document.getElementById("fechaReembolso").innerHTML = `${utcMidnight.getHours().toString().padStart(2, '0')}:${utcMidnight.getMinutes().toString().padStart(2, '0')} ${utcMidnight.getDate().toString().padStart(2, '0')}-${(utcMidnight.getMonth()+1).toString().padStart(2, '0')}-${utcMidnight.getFullYear()}`;

                    const cantidadInput = document.getElementById("cantidad");
                    const juanInput = document.getElementById("resultado");

                    cantidadInput.addEventListener('focus', () => {
                        let cantidad = cantidadInput.innerHTML;
                        if(cantidad > saldos[grupo[i][0]["currency"]]){
                            cantidadInput.classList.remove('border-gray-300');
                            cantidadInput.classList.remove('border-red-500');
                            cantidadInput.classList.add('border-black', 'border-2');
                        }
                        else{
                            cantidadInput.classList.remove('border-gray-300');
                            cantidadInput.classList.remove('border-black');
                            cantidadInput.classList.add('border-red-500', 'border-2');
                        }
                    });
                    cantidadInput.addEventListener('blur', () => {
                        cantidadInput.classList.remove('border-black');

                        let cantidad = cantidadInput.innerHTML;
                        if(cantidad > saldos[grupo[i][0]["currency"]]){
                            cantidadInput.classList.remove('border-gray-300');
                            cantidadInput.classList.add('border-red-500','border-1');
                        }
                        else{
                            cantidadInput.classList.remove('border-red-500');
                            cantidadInput.classList.add('border-grey-300','border-1');
                        }
                    });



                    cantidadInput.addEventListener("input", (event) => {
                        const cantidad = parseFloat(event.target.value);
                        const resultado = cantidad * parseFloat(grupo[i][grupo[i].length - 1]["APR"]) * parseFloat(grupo[i][grupo[i].length - 1]["duracion"]) / (parseFloat(365) * 100);
                        document.getElementById("cantidadOculta").value = cantidad;
                        if(resultado == undefined || isNaN(resultado))
                            juanInput.innerHTML = "--";
                        else
                            juanInput.innerHTML = parseFloat(resultado.toFixed(8)) + grupo[i][grupo[i].length - 1]["currency"].toUpperCase();
                        
                        if (cantidad > saldos[grupo[i][0]["currency"]]) {
                            document.getElementById("mensajeSaldoInsuficiente").innerHTML = "Saldo insuficiente";
                            cantidadInput.classList.remove('border-black', 'border-grey-300');
                            cantidadInput.classList.add('border-red-500');
                            console.log("mayor");
                        } else {
                            document.getElementById("mensajeSaldoInsuficiente").innerHTML = "";
                            cantidadInput.classList.remove('border-grey-300','border-red-500');
                            cantidadInput.classList.add('border-black');
                            console.log("menor");
                        }
                    });

                    let maximo = grupo[i][grupo[i].length - 1]["cantidad_disponible"];
                    let maximoUsuario = grupo[i][grupo[i].length - 1]["maximo_usuario"];

                    if(maximo > maximoUsuario)
                        document.getElementById("maximo_usuario").innerHTML = maximoUsuario;
                    else
                        document.getElementById("maximo_usuario").innerHTML = maximo;
                    
                    document.getElementById("minimo").innerHTML = grupo[i][grupo[i].length - 1]["minimo_usuario"] + grupo[i][grupo[i].length - 1]["currency"].toUpperCase();

                    // document.getElementById("auto").addEventListener('change', function() {
                    //     if (this.checked){
                    //         document.getElementById("fechaReembolso").innerHTML = document.getElementById("fechaFin").innerHTML;
                    //         document.getElementById("fechaReembolsoTexto").innerHTML = "Nueva suscripción";
                    //     }
                    //     else{
                    //         document.getElementById("fechaReembolso").innerHTML = `${utcMidnight.getHours().toString().padStart(2, '0')}:${utcMidnight.getMinutes().toString().padStart(2, '0')} ${utcMidnight.getDate().toString().padStart(2, '0')}-${(utcMidnight.getMonth()+1).toString().padStart(2, '0')}-${utcMidnight.getFullYear()}`;
                    //         document.getElementById("fechaReembolsoTexto").innerHTML = "Fecha reembolso";
                    //     }
                    // });
                    document.getElementById("oculto").value = grupo[i][grupo[i].length - 1]["id"];
                    if(saldos[grupo[i][0]["currency"]] == undefined)
                        document.getElementById("saldoDisponible").innerHTML = "0 " + grupo[i][0]["currency"].toUpperCase() + " disponible";
                    else
                        document.getElementById("saldoDisponible").innerHTML = saldos[grupo[i][0]["currency"]] + " " + grupo[i][0]["currency"].toUpperCase() + " disponible";

                    capa.style.display = 'block';
                    ventana.style.display = 'block';
                }


                //para cambiarle la funcion que ejecuta al hacer click en suscribirse al pulsar en una opcion diferente
                for(let l=0;l<botones.length;l++){
                    botones[l].onclick = () => {
                        //para los colores de los botones al pulsarlos
                        for(k=0;k<botones.length;k++){
                            //le elimino a todos los botones las clases que tienen y les añado las clases de
                            while (botones[k].classList.length > 0)
                                botones[k].classList.remove(botones[k].classList.item(0));
                            
                            //al pulsado le pongo el estilo del pulsado (blanco con borde ambar) y a los demás le pongo el estilo de no pulsado (gris sin borde)
                            if(k != l)
                                botones[k].classList.add("bg-gray-200", "hover:bg-gray-300", "text-gray-800", "font-medium", "py-2", "px-4", "rounded");
                            else
                                botones[k].classList.add("bg-white", "border-2", "border-amber-500", "text-gray-800","font-medium", "py-2", "px-4", "rounded");
                        }

                        //pongo el porcentaje correspondiente al botón pulsado
                        document.getElementById(grupo[i][0].currency).textContent = parseFloat(grupo[i][l].APR).toFixed(2) + "%";


                        if(hayUsuario)
                            document.getElementById("subscribe" + grupo[i][0].currency).onclick = () => {

                                //ponerle la fecha de suscripción correspondiente a la del boton que está pulsado ahora
                                // document.getElementById("aprEstimado").innerHTML = parseFloat(grupo[i][grupo[i].length - 1]["APR"]).toFixed(2) + "%";
                                document.getElementById("fechaSuscripcion").innerHTML = `${new Date().getHours().toString().padStart(2, '0')}:${new Date().getMinutes().toString().padStart(2, '0')} ${new Date().getDate().toString().padStart(2, '0')}-${(new Date().getMonth()+1).toString().padStart(2, '0')}-${new Date().getFullYear()}`;
                                

                                // Obtener la fecha y hora actual en hora local
                                const now = new Date();

                                // Crear un nuevo objeto Date para la hora UTC de hoy a las 00:00
                                let utcMidnight = new Date();
                                utcMidnight.setUTCHours(0, 0, 0, 0);

                                // Ajustar la hora UTC a la hora local
                                utcMidnight.setTime(utcMidnight.getTime() - now.getTimezoneOffset() * 60 * 1000);

                                // Si la fecha y hora ya ha pasado hoy, sumar un día y ajustar la hora a la hora local
                                if (utcMidnight < now) {
                                    utcMidnight.setDate(utcMidnight.getDate() + 1);
                                    utcMidnight.setTime(utcMidnight.getTime() + now.getTimezoneOffset() * 60 * 1000);
                                }

                                // Formatear la fecha y hora en el formato deseado
                                const formattedDate = `${utcMidnight.getHours().toString().padStart(2, '0')}:${utcMidnight.getMinutes().toString().padStart(2, '0')} ${utcMidnight.getDate().toString().padStart(2, '0')}-${(utcMidnight.getMonth()+1).toString().padStart(2, '0')}-${utcMidnight.getFullYear()}`;

                                // Mostrar la fecha formateada por consola
                                document.getElementById("fechaValor").innerHTML = formattedDate;

                                //para hacer la fecha final


                                document.getElementById("apraprox").innerHTML = parseFloat(grupo[i][l]["APR"]).toFixed(2) + "%";
                                document.getElementById("duracionDias").innerHTML = grupo[i][l]["duracion"];
                                document.getElementById("monedaEarn").innerHTML = grupo[i][l]["currency"].toUpperCase();
                                document.getElementById("logoMonedaEarn").src = "images/criptologos/" + grupo[i][l]["currency"].toUpperCase() + ".png";

                                // Sumar 60 días
                                utcMidnight.setDate(utcMidnight.getDate() + parseFloat(grupo[i][l]["duracion"]));

                                // Volver a ajustar la hora UTC
                                const formattedDate2 = `${utcMidnight.getHours().toString().padStart(2, '0')}:${utcMidnight.getMinutes().toString().padStart(2, '0')} ${utcMidnight.getDate().toString().padStart(2, '0')}-${(utcMidnight.getMonth()+1).toString().padStart(2, '0')}-${utcMidnight.getFullYear()}`;

                                document.getElementById("fechaFin").innerHTML = formattedDate2; // Output: "Sun, 03 Jul 2023 00:00:00 GMT" (ejemplo)

                                utcMidnight.setHours(utcMidnight.getHours() + 10);

                                document.getElementById("fechaReembolso").innerHTML = `${utcMidnight.getHours().toString().padStart(2, '0')}:${utcMidnight.getMinutes().toString().padStart(2, '0')} ${utcMidnight.getDate().toString().padStart(2, '0')}-${(utcMidnight.getMonth()+1).toString().padStart(2, '0')}-${utcMidnight.getFullYear()}`;

                                const cantidadInput = document.getElementById("cantidad");
                                const juanInput = document.getElementById("resultado");


                                cantidadInput.addEventListener("input", (event) => {
                                    const cantidad = parseFloat(event.target.value);
                                    const resultado = cantidad * parseFloat(grupo[i][l]["APR"]) * parseFloat(grupo[i][l]["duracion"]) / (parseFloat(365) * 100);
                                    document.getElementById("cantidadOculta").value = cantidad;
                                    if(resultado == undefined || isNaN(resultado))
                                        juanInput.innerHTML = "--";
                                    else
                                        juanInput.innerHTML = parseFloat(resultado.toFixed(8)) + grupo[i][l]["currency"].toUpperCase();
                                    
                                    if (cantidad > saldos[grupo[i][0]["currency"]]) {
                                        document.getElementById("mensajeSaldoInsuficiente").innerHTML = "Saldo insuficiente";
                                        cantidadInput.classList.remove('border-black', 'border-grey-300');
                                        cantidadInput.classList.add('border-red-500');
                                        console.log("mayor");
                                    } else {
                                        document.getElementById("mensajeSaldoInsuficiente").innerHTML = "";
                                        cantidadInput.classList.remove('border-grey-300','border-red-500');
                                        cantidadInput.classList.add('border-black');
                                        console.log("menor");
                                    }
                                });



                                let maximo = parseFloat(grupo[i][l]["cantidad_disponible"]);
                                let maximoUsuario = parseFloat(grupo[i][l]["maximo_usuario"]);

                                if(maximo > maximoUsuario)
                                    document.getElementById("maximo_usuario").innerHTML = maximoUsuario;
                                else
                                    document.getElementById("maximo_usuario").innerHTML = maximo;

                                document.getElementById("minimo").innerHTML = grupo[i][l]["minimo_usuario"] + grupo[i][l]["currency"].toUpperCase();
                                
                                document.getElementById("oculto").value = grupo[i][l]["id"];
                                if(saldos[grupo[i][0]["currency"]] == undefined)
                                    document.getElementById("saldoDisponible").innerHTML = "0 " + grupo[i][0]["currency"].toUpperCase() + " disponible";
                                else
                                    document.getElementById("saldoDisponible").innerHTML = saldos[grupo[i][0]["currency"]] + " " + grupo[i][0]["currency"].toUpperCase() + " disponible";

                                capa.style.display = 'block';
                                ventana.style.display = 'block';
                            }
                    };
                }
                
                if(!hayUsuario){
                    button4.addEventListener("click", function() {
                        window.location.href = "/registro";
                    });
                }

                // Agregar los nodos al árbol DOM
                prueba.appendChild(div1);
                div1.appendChild(div2);
                div2.appendChild(div3);
                div3.appendChild(div4);
                div4.appendChild(div5);
                div5.appendChild(img);
                div4.appendChild(div6);
                div6.appendChild(label);
                div2.appendChild(div7);
                div2.appendChild(div8);

                for(let k=0;k<botones.length;k++){
                    div8.appendChild(botones[k]);
                }
                div2.appendChild(div9);
                div9.appendChild(button4);
            }
        }
        addNodos(agrupadas);

        function mostrarDatosMoneda(opcion){
            console.log(grupo[i][grupo[i].length - 1]);
        }


        document.getElementById('simple-search').addEventListener('input', function () {
            var searchValue = this.value.toLowerCase();
            var divs = document.querySelectorAll('#lista .debajo');
          
            divs.forEach(function (div) {
              var text = div.textContent.toLowerCase();
          
              if (text.includes(searchValue)) {
                div.classList.remove('hidden');
              } else {
                div.classList.add('hidden');
              }
            });
          });

          

// Obtener el APR, el período de reinversión y la inversión inicial
var aprInput = document.getElementById('apr');
var reinvestmentPeriodInput = document.getElementById('days');
var initialInvestmentInput = document.getElementById('initial-investment');

// Obtener los botones de cálculo de rentabilidad
var calculate120DaysButton = document.getElementById('calculate');
var calculate1YearButton = document.getElementById('calculate-year');
var calculate2YearsButton = document.getElementById('calculate-two-years');
var calculate3YearsButton = document.getElementById('calculate-three-years');
var calculate5YearsButton = document.getElementById('calculate-five-years');

// Función de cálculo de rentabilidad
function calculateProfitability(days) {
    var reinvestmentPeriod = parseFloat(reinvestmentPeriodInput.value);
    var apr = (parseFloat(aprInput.value)/100)*(reinvestmentPeriod/365);
    var initialInvestment = parseFloat(initialInvestmentInput.value);
    
    let resultado = initialInvestment * ((1+apr)**(days/reinvestmentPeriod));
    return resultado.toFixed(2);
}

// Agregar eventos de clic a los botones de cálculo
calculate120DaysButton.addEventListener('click', function() {
  var result = calculateProfitability(120);
  displayResult(result);
});

calculate1YearButton.addEventListener('click', function() {
  var result = calculateProfitability(365);
  displayResult(result);
});

calculate2YearsButton.addEventListener('click', function() {
  var result = calculateProfitability(365 * 2);
  displayResult(result);
});

calculate3YearsButton.addEventListener('click', function() {
  var result = calculateProfitability(365 * 3);
  displayResult(result);
});

calculate5YearsButton.addEventListener('click', function() {
  var result = calculateProfitability(365 * 5);
  displayResult(result);
});

// Función para mostrar el resultado
function displayResult(result) {
    var resultElement = document.getElementById('result');
    resultElement.textContent = 'Obtendrías ' + result + ' €';
}

          
          


        // Obtener todos los botones
        var buttons = document.querySelectorAll('.calc-button');

        // Agregar evento de clic a cada botón
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Remover clases activas de todos los botones
                buttons.forEach(function(btn) {
                    btn.classList.remove('bg-amber-100', 'text-amber-500');
                    btn.classList.add('text-gray-500');
                });
                
                // Agregar clases activas al botón clicado
                button.classList.remove('text-gray-500');
                button.classList.add('bg-amber-100', 'text-amber-500');
            });
        });
