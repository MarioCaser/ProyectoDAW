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

    document.getElementById("auto").addEventListener('change', function() {
        if (this.checked){
            document.getElementById("fechaReembolso").innerHTML = document.getElementById("fechaFin").innerHTML;
            document.getElementById("fechaReembolsoTexto").innerHTML = "Nueva suscripción";
        }
        else{
            document.getElementById("fechaReembolso").innerHTML = `${utcMidnight.getHours().toString().padStart(2, '0')}:${utcMidnight.getMinutes().toString().padStart(2, '0')} ${utcMidnight.getDate().toString().padStart(2, '0')}-${(utcMidnight.getMonth()+1).toString().padStart(2, '0')}-${utcMidnight.getFullYear()}`;
            document.getElementById("fechaReembolsoTexto").innerHTML = "Fecha reembolso";
        }
    });
    document.getElementById("oculto").value = grupo[i][grupo[i].length - 1]["id"];
    document.getElementById("saldoDisponible").innerHTML = saldos[grupo[i][0]["currency"]] + " " + grupo[i][0]["currency"].toUpperCase() + " disponible";

    capa.style.display = 'block';
    ventana.style.display = 'block';
}