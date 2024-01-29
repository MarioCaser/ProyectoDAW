<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class futurosController extends Controller
{
    public function index(Request $request){

        $hayUsuario = false;
        $saldos = null;

        if (auth()->check()) {
            $hayUsuario = true;
            $usuario = auth()->user();
            $saldos = $usuario->saldos->pluck('balance', 'currency');
        }

        return view('futuros',['hayUsuario' => $hayUsuario,"saldos"=>$saldos]);
    }
}

/*











Array
(
    [NOMBRE] =&gt; ALBORADA
    [APELLIDO1] =&gt; MUÑOZ
    [APELLIDO2] =&gt; MORA
    [FEC_PETICION] =&gt; 25-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25611585G
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSEFA
    [APELLIDO1] =&gt; DELGADO
    [APELLIDO2] =&gt; SEVILLA
    [FEC_PETICION] =&gt; 25-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 75660363T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ALBANY DANIELA
    [APELLIDO1] =&gt; FLORES
    [APELLIDO2] =&gt; MARTINEZ
    [FEC_PETICION] =&gt; 25-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y7129201C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTHONY DANIEL
    [APELLIDO1] =&gt; FLORES
    [APELLIDO2] =&gt; MARTINEZ
    [FEC_PETICION] =&gt; 25-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y7129172Z
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; INMACULADA
    [APELLIDO1] =&gt; PEREZ
    [APELLIDO2] =&gt; GARCIA
    [FEC_PETICION] =&gt; 25-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25320107M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE MANUEL
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; SANCHEZ
    [FEC_PETICION] =&gt; 26-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25348044C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA TERESA
    [APELLIDO1] =&gt; DEL ARCA
    [APELLIDO2] =&gt; ROMERO
    [FEC_PETICION] =&gt; 26-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25315595R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; SUSANA
    [APELLIDO1] =&gt; MARTINEZ
    [APELLIDO2] =&gt; ARIZA
    [FEC_PETICION] =&gt; 26-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 52581936A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DOLORES
    [APELLIDO1] =&gt; VELASCO
    [APELLIDO2] =&gt; SALAZAR
    [FEC_PETICION] =&gt; 26-FEB-21
    [FEC_CITA] =&gt; 03-MAR-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 33887599C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; CLEMENTE
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; irenemg030280s@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25320355T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JESUS
    [APELLIDO1] =&gt; PEDRAZA
    [APELLIDO2] =&gt; ARCAS
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25330688Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; RAQUEL
    [APELLIDO1] =&gt; LOPEZ
    [APELLIDO2] =&gt; CASTILLA
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74906291Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; GARCIA
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25307257N
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CECILIA
    [APELLIDO1] =&gt; ORTIZ
    [APELLIDO2] =&gt; SILES
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74917803H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DOLORES
    [APELLIDO1] =&gt; MONTIEL
    [APELLIDO2] =&gt; GALVEZ
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74906446T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANA CLELIA
    [APELLIDO1] =&gt; DE LA ROCHA
    [APELLIDO2] =&gt; ALANIZ
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y5114166S
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARGARITA
    [APELLIDO1] =&gt; SOMOSIERRA
    [APELLIDO2] =&gt; ATANET
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25282163B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; GEMA
    [APELLIDO1] =&gt; FERNANDEZ
    [APELLIDO2] =&gt; PEREZ
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25351467Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN ANTONIO
    [APELLIDO1] =&gt; SANTOLALLA
    [APELLIDO2] =&gt; JIMENEZ
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25310052R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE
    [APELLIDO1] =&gt; CUADRADO
    [APELLIDO2] =&gt; CASTILLA
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25292962T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; NOEMI
    [APELLIDO1] =&gt; MORALES
    [APELLIDO2] =&gt; CARMONA
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25341219A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; MUÑOZ
    [APELLIDO2] =&gt; ROMAN
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 14-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25264932F
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSEFA
    [APELLIDO1] =&gt; MONTAÑEZ
    [APELLIDO2] =&gt; GONZALEZ
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 24883482N
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA
    [APELLIDO1] =&gt; CARBONERO
    [APELLIDO2] =&gt; PEREZ
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25306430J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; RUBEN
    [APELLIDO1] =&gt; CRUCES
    [APELLIDO2] =&gt; FUENTES
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25351904Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; PEDRO JOSE
    [APELLIDO1] =&gt; LUNA
    [APELLIDO2] =&gt; BONILLA
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 30995930A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LORENA
    [APELLIDO1] =&gt; FERNANDEZ
    [APELLIDO2] =&gt; RODRIGUEZ
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; irenemg030280s@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25350194P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; VICTOR MANUEL
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; ORTIZ
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25345241T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MUHAMMAD LATIF
    [APELLIDO1] =&gt; BUTT
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y3361895E
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MANUEL
    [APELLIDO1] =&gt; OROZCO
    [APELLIDO2] =&gt; GONZALEZ
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25309165B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; EVA MARIA
    [APELLIDO1] =&gt; CEBRIAN
    [APELLIDO2] =&gt; LEON
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25335736V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; PAULA
    [APELLIDO1] =&gt; ROBLEDO
    [APELLIDO2] =&gt; NAVARRO
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25621322N
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; TRINIDAD MARIA
    [APELLIDO1] =&gt; NAVARRO
    [APELLIDO2] =&gt; PENA
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25322926H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA LUISA
    [APELLIDO1] =&gt; BRUNO
    [APELLIDO2] =&gt; BONILLA
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 16-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25318532V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA CARMEN
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; RUIZ
    [FEC_PETICION] =&gt; 14-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25315430C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; SANTIAGO
    [APELLIDO1] =&gt; CHAMIZO
    [APELLIDO2] =&gt; PALOMO
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25620338V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CARMEN
    [APELLIDO1] =&gt; MOLINA
    [APELLIDO2] =&gt; VERDUGO
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25323104N
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MIGUEL
    [APELLIDO1] =&gt; MARTINEZ
    [APELLIDO2] =&gt; ROMAN
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25310705X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN ANTONIO
    [APELLIDO1] =&gt; ARJONA
    [APELLIDO2] =&gt; RODRIGUEZ
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 26301062X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CECILIA
    [APELLIDO1] =&gt; ORTIZ
    [APELLIDO2] =&gt; SILES
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74917803H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA JOSE
    [APELLIDO1] =&gt; CANO
    [APELLIDO2] =&gt; POZO
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 46232852T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA DEL CARMEN
    [APELLIDO1] =&gt; FRIAS
    [APELLIDO2] =&gt; BECERRA
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25328176R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARTHA ISABEL
    [APELLIDO1] =&gt; ZAPATA
    [APELLIDO2] =&gt; GARCIA
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 26301064N
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; NICHOLAS MARK
    [APELLIDO1] =&gt; GOMEZ
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X8169070E
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LIZZY MARIAH
    [APELLIDO1] =&gt; JEHAN
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X8169054Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN ANTONIO
    [APELLIDO1] =&gt; ARRABAL
    [APELLIDO2] =&gt; CABELLO
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25299444L
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE
    [APELLIDO1] =&gt; CUESTA
    [APELLIDO2] =&gt; SILES
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 18-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25315242Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Begoña 
    [APELLIDO1] =&gt; Acosta 
    [APELLIDO2] =&gt; Díaz
    [FEC_PETICION] =&gt; 11-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; acostadiazb@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 49076598A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MOISES DIEGO
    [APELLIDO1] =&gt; DIAZ
    [APELLIDO2] =&gt; RODRIGUEZ
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74907771Z
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO JAVIER
    [APELLIDO1] =&gt; RUIZ
    [APELLIDO2] =&gt; MARTIN
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25347063M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ENCARNACION
    [APELLIDO1] =&gt; RUIZ
    [APELLIDO2] =&gt; MORENO
    [FEC_PETICION] =&gt; 17-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; margaritamancerastrujillo@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25319191D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN JOSE
    [APELLIDO1] =&gt; CARRASCO
    [APELLIDO2] =&gt; MUÑOZ
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; Isboso@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25307397Z
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN
    [APELLIDO1] =&gt; MORALES
    [APELLIDO2] =&gt; CONDE
    [FEC_PETICION] =&gt; 17-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25322342D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN MANUEL
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; RUIZ
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25337790R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; CLAVIJO
    [FEC_PETICION] =&gt; 17-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25313203R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MILAGROS
    [APELLIDO1] =&gt; RUIZ
    [APELLIDO2] =&gt; GONZALEZ
    [FEC_PETICION] =&gt; 21-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25329691K
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; JIMENEZ
    [APELLIDO2] =&gt; JIMENEZ
    [FEC_PETICION] =&gt; 17-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74914431G
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARGARITA
    [APELLIDO1] =&gt; LOZANO
    [APELLIDO2] =&gt; HURTADO
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25302848L
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANDREW ERIC
    [APELLIDO1] =&gt; DOWNING
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y7656751L
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CAROL ANN
    [APELLIDO1] =&gt; HOPE
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 21-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y7656695D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIO
    [APELLIDO1] =&gt; SERRANO
    [APELLIDO2] =&gt; GALEOTE
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25612204W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Jennifer 
    [APELLIDO1] =&gt; Canton 
    [APELLIDO2] =&gt; Fernandez
    [FEC_PETICION] =&gt; 15-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; jenifercanton111288@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 75482836X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LAURA
    [APELLIDO1] =&gt; VILCHEZ
    [APELLIDO2] =&gt; ROMERO
    [FEC_PETICION] =&gt; 23-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25349811Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; PEDRO 
    [APELLIDO1] =&gt; VARGAS 
    [APELLIDO2] =&gt; RODRIGUEZ
    [FEC_PETICION] =&gt; 16-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; sabrosursc@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25630349T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; TIRADO
    [APELLIDO2] =&gt; PALOMO
    [FEC_PETICION] =&gt; 21-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74772460N
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ISABEL
    [APELLIDO1] =&gt; RIOS
    [APELLIDO2] =&gt; TRILLO
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25302201Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE JUAN
    [APELLIDO1] =&gt; MORENO
    [APELLIDO2] =&gt; ROMERO
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25613970C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LUCIA
    [APELLIDO1] =&gt; TORRES
    [APELLIDO2] =&gt; TORRES
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25350817X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; RICARDO
    [APELLIDO1] =&gt; CORREDERA
    [APELLIDO2] =&gt; GOMEZ
    [FEC_PETICION] =&gt; 23-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74899375J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANGELA
    [APELLIDO1] =&gt; ESPEJO
    [APELLIDO2] =&gt; TORTOSA
    [FEC_PETICION] =&gt; 21-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25354245B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE ANTONIO
    [APELLIDO1] =&gt; MELERO
    [APELLIDO2] =&gt; MATAS
    [FEC_PETICION] =&gt; 21-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25350183C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LAURA
    [APELLIDO1] =&gt; PERDIGUERO
    [APELLIDO2] =&gt; MORENO
    [FEC_PETICION] =&gt; 21-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25621940D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIAN DANIEL
    [APELLIDO1] =&gt; BRAESCU
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 23-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X6332062R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Sonia 
    [APELLIDO1] =&gt; González 
    [APELLIDO2] =&gt; Pachón
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; soniaglezpachon@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25679694X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ISABEL MARIA 
    [APELLIDO1] =&gt; ATIENZA 
    [APELLIDO2] =&gt; VAZQUEZ
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; atienzavazquezi@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 26794074V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Juan Francisco 
    [APELLIDO1] =&gt; Orellana 
    [APELLIDO2] =&gt; Linares
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; juanfcorellana@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25328950Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CHRISTOPHER 
    [APELLIDO1] =&gt; PEEDELL
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 18-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; chrispeedell@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X8952424L
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CRISTOBAL 
    [APELLIDO1] =&gt; MUÑOZ  
    [APELLIDO2] =&gt; REINA
    [FEC_PETICION] =&gt; 21-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; gestoria@gestoriagalvez.es
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25342258H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN JESUS
    [APELLIDO1] =&gt; LARA
    [APELLIDO2] =&gt; SORIA
    [FEC_PETICION] =&gt; 21-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25349535Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LORENZO
    [APELLIDO1] =&gt; CORADO
    [APELLIDO2] =&gt; RODRIGUEZ
    [FEC_PETICION] =&gt; 22-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25308220D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FATIMA
    [APELLIDO1] =&gt; JIMENEZ
    [APELLIDO2] =&gt; MIRANDA
    [FEC_PETICION] =&gt; 22-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74908470T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; ESCRIBANO
    [APELLIDO2] =&gt; SORIANO
    [FEC_PETICION] =&gt; 22-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25319369A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; RAFAEL
    [APELLIDO1] =&gt; CANDENAS
    [APELLIDO2] =&gt; GONZALEZ
    [FEC_PETICION] =&gt; 22-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 24115618A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIO
    [APELLIDO1] =&gt; CORTES
    [APELLIDO2] =&gt; MERINO
    [FEC_PETICION] =&gt; 22-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 78961596C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE ANTONIO
    [APELLIDO1] =&gt; ROJO
    [APELLIDO2] =&gt; LOPEZ
    [FEC_PETICION] =&gt; 22-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 12653779F
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA DEL PILAR
    [APELLIDO1] =&gt; CORRALES
    [APELLIDO2] =&gt; FERNANDEZ
    [FEC_PETICION] =&gt; 23-DEC-20
    [FEC_CITA] =&gt; 28-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74919881A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA MADALENA
    [APELLIDO1] =&gt; OZORIO
    [APELLIDO2] =&gt; DE JESUS
    [FEC_PETICION] =&gt; 23-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 26301760H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ABDESLEM
    [APELLIDO1] =&gt; BEN BRAHIM
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 28-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X4511383W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MANUEL
    [APELLIDO1] =&gt; BENITEZ
    [APELLIDO2] =&gt; HIDALGO
    [FEC_PETICION] =&gt; 28-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25311182G
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LAURA
    [APELLIDO1] =&gt; VILCHEZ
    [APELLIDO2] =&gt; ROMERO
    [FEC_PETICION] =&gt; 28-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25349811Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JIANJIN
    [APELLIDO1] =&gt; YU
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 28-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y6140993F
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; BLANCA
    [APELLIDO1] =&gt; MORENO
    [APELLIDO2] =&gt; DE LUNA
    [FEC_PETICION] =&gt; 28-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74920735Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIO
    [APELLIDO1] =&gt; CABELLO
    [APELLIDO2] =&gt; NAVAS
    [FEC_PETICION] =&gt; 28-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25608002D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; SALVADOR
    [APELLIDO1] =&gt; TOLEDO
    [APELLIDO2] =&gt; MEDINA
    [FEC_PETICION] =&gt; 28-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25302044C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; SILVIA
    [APELLIDO1] =&gt; GALAN
    [APELLIDO2] =&gt; GONZALEZ
    [FEC_PETICION] =&gt; 29-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25336104V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; ESCRIBANO
    [APELLIDO2] =&gt; SORIANO
    [FEC_PETICION] =&gt; 29-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25319369A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE LUIS
    [APELLIDO1] =&gt; RUIZ
    [APELLIDO2] =&gt; CASADO
    [FEC_PETICION] =&gt; 29-DEC-20
    [FEC_CITA] =&gt; 30-DEC-20
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 77194977P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Iulian 
    [APELLIDO1] =&gt; Ion
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 22-DEC-20
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; saraarrebolaperez@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X7511272R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Jennifer 
    [APELLIDO1] =&gt; Canton 
    [APELLIDO2] =&gt; Fernandez
    [FEC_PETICION] =&gt; 23-DEC-20
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; jenifercanton111288@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 75482836X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOAQUIN
    [APELLIDO1] =&gt; TRUJILLO
    [APELLIDO2] =&gt; ANAYA
    [FEC_PETICION] =&gt; 29-DEC-20
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25619413N
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; IGNACIO
    [APELLIDO1] =&gt; ROMERO
    [APELLIDO2] =&gt; JAEN
    [FEC_PETICION] =&gt; 29-DEC-20
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25352987H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN LUIS
    [APELLIDO1] =&gt; ARCAS
    [APELLIDO2] =&gt; SEGURA
    [FEC_PETICION] =&gt; 29-DEC-20
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25326530B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DOLORES
    [APELLIDO1] =&gt; NARBONA
    [APELLIDO2] =&gt; BUENO
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25303344D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LIDIA
    [APELLIDO1] =&gt; NARBONA
    [APELLIDO2] =&gt; POVEDANO
    [FEC_PETICION] =&gt; 30-DEC-20
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25622125X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE
    [APELLIDO1] =&gt; LUQUE
    [APELLIDO2] =&gt; PINO
    [FEC_PETICION] =&gt; 30-DEC-20
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74909178H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE EDUARDO
    [APELLIDO1] =&gt; MORALES
    [APELLIDO2] =&gt; VILLAVICENCIO
    [FEC_PETICION] =&gt; 30-DEC-20
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y7494820P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; NORA
    [APELLIDO1] =&gt; DELGADO
    [APELLIDO2] =&gt; CONEJO
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74909256G
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIO
    [APELLIDO1] =&gt; MARTIN
    [APELLIDO2] =&gt; RUBIO
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 04-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25354028R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Valentina 
    [APELLIDO1] =&gt; Londoño 
    [APELLIDO2] =&gt; castrillon
    [FEC_PETICION] =&gt; 30-DEC-20
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; anapispireta@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y8139421B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Alberto 
    [APELLIDO1] =&gt; Deckler 
    [APELLIDO2] =&gt; Colomer
    [FEC_PETICION] =&gt; 30-DEC-20
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; albertodeckler@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 44588603K
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CONSTANTINO
    [APELLIDO1] =&gt; MURADAS
    [APELLIDO2] =&gt; CONEJO
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25301498A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA DOLORES
    [APELLIDO1] =&gt; LARA
    [APELLIDO2] =&gt; LUQUE
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74897010V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CONSTANTINO
    [APELLIDO1] =&gt; MURADAS
    [APELLIDO2] =&gt; LARA
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74916944X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; GARRIDO
    [APELLIDO2] =&gt; PAREJO
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74916045P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIO
    [APELLIDO1] =&gt; FERNANDEZ
    [APELLIDO2] =&gt; DIAZ
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74916890W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCA
    [APELLIDO1] =&gt; AYORA
    [APELLIDO2] =&gt; GRANADOS
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25333292B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN
    [APELLIDO1] =&gt; ZAMORA
    [APELLIDO2] =&gt; ORTIZ
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25706364T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN ALBERTO
    [APELLIDO1] =&gt; ZAMORA
    [APELLIDO2] =&gt; AYORA
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25348523Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DOLORES
    [APELLIDO1] =&gt; SALAS
    [APELLIDO2] =&gt; BARRANCO
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25750015C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE
    [APELLIDO1] =&gt; VEREDAS
    [APELLIDO2] =&gt; CANTOS
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 08-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25304092K
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Patricia 
    [APELLIDO1] =&gt; Salmeron 
    [APELLIDO2] =&gt; Triano
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; Ritablamar@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 49083743H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DOLORES
    [APELLIDO1] =&gt; CABALLERO
    [APELLIDO2] =&gt; SILLERO
    [FEC_PETICION] =&gt; 08-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25305460D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Melania 
    [APELLIDO1] =&gt; Gaona
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; melania_gaona@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25612051X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN MANUEL
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; GODOY
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25337286A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CARMEN MARIA
    [APELLIDO1] =&gt; AGUILERA
    [APELLIDO2] =&gt; MORENO
    [FEC_PETICION] =&gt; 07-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25336242V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; PABLO
    [APELLIDO1] =&gt; VILLALON
    [APELLIDO2] =&gt; ARTACHO
    [FEC_PETICION] =&gt; 07-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; greedom420@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25319028F
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ALFONSO
    [APELLIDO1] =&gt; ZURITA
    [APELLIDO2] =&gt; ROPERO
    [FEC_PETICION] =&gt; 07-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74915822S
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIO
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; GALVEZ
    [FEC_PETICION] =&gt; 07-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25312877C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; PAULA
    [APELLIDO1] =&gt; DEL RIO
    [APELLIDO2] =&gt; MUÑOZ
    [FEC_PETICION] =&gt; 07-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; moran-guerrero@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25353192Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOANA
    [APELLIDO1] =&gt; FRANCO
    [APELLIDO2] =&gt; MOYA
    [FEC_PETICION] =&gt; 07-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 77552534F
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; IVAN
    [APELLIDO1] =&gt; RODRIGUEZ
    [APELLIDO2] =&gt; HIDALGO
    [FEC_PETICION] =&gt; 08-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25341581C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Eduardo 
    [APELLIDO1] =&gt; mogaburo 
    [APELLIDO2] =&gt; navas
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; greedom420@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74934994M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANA CRISTINA
    [APELLIDO1] =&gt; GALAN
    [APELLIDO2] =&gt; GOMEZ
    [FEC_PETICION] =&gt; 08-JAN-21
    [FEC_CITA] =&gt; 11-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25621822Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO GABRIEL
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; SERRANO
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 52363005D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LUCIA
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; PERALVAREZ
    [FEC_PETICION] =&gt; 04-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 26302598M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANA
    [APELLIDO1] =&gt; ARTACHO
    [APELLIDO2] =&gt; VILCHEZ
    [FEC_PETICION] =&gt; 08-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25294452H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA
    [APELLIDO1] =&gt; ROMAN
    [APELLIDO2] =&gt; ESCRIBANO
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25311357H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANGELA
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; MARTINEZ
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25620302G
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MOHAMMED
    [APELLIDO1] =&gt; BYAR
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X8214532J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; NOUREDDINE
    [APELLIDO1] =&gt; BEKKAOUI
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X3542319C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; PABLO
    [APELLIDO1] =&gt; GALINDO
    [APELLIDO2] =&gt; MUÑOZ DE LEON
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25346426N
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA ESPERANZA
    [APELLIDO1] =&gt; MUÑOZ DE LEON
    [APELLIDO2] =&gt; SANTOS
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74900975A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MIGUEL ANGEL
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; ARCAS
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25327605M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA DEL CARMEN
    [APELLIDO1] =&gt; YAÑEZ
    [APELLIDO2] =&gt; VINARDELL
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 51373160S
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JAVIER
    [APELLIDO1] =&gt; ROYAN
    [APELLIDO2] =&gt; ALBA
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25343903L
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 13-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Carmen 
    [APELLIDO1] =&gt; Bujalance 
    [APELLIDO2] =&gt; Santolalla
    [FEC_PETICION] =&gt; 07-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; carmenbujalances@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25346072A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Mari carmen 
    [APELLIDO1] =&gt; Rodríguez 
    [APELLIDO2] =&gt; sanchez
    [FEC_PETICION] =&gt; 07-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; laymars52@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 33364715H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ABDELHAFID 
    [APELLIDO1] =&gt; OUCHAN
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 08-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; Said.99@hotmail.es
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y8306902Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIO 
    [APELLIDO1] =&gt; BENITEZ 
    [APELLIDO2] =&gt; GONZALEZ
    [FEC_PETICION] =&gt; 08-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; info@efitax.es
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74821941C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MELANNY
    [APELLIDO1] =&gt; ESCOBAR
    [APELLIDO2] =&gt; HERNANDEZ
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; AT951139
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE
    [APELLIDO1] =&gt; GALAN
    [APELLIDO2] =&gt; MARTIN
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25315840Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN MANUEL
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; GOMEZ
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25612978V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; LOPEZ
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25298610J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE
    [APELLIDO1] =&gt; LOPEZ
    [APELLIDO2] =&gt; MARTIN
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 15-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25301486Z
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JESUS 
    [APELLIDO1] =&gt; TOLEDO 
    [APELLIDO2] =&gt; LARREA
    [FEC_PETICION] =&gt; 11-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; tolaveterinario@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25330526M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MANUEL RAMON
    [APELLIDO1] =&gt; PARADAS
    [APELLIDO2] =&gt; CARMONA
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25303801Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; NATALIA
    [APELLIDO1] =&gt; FERNANDEZ
    [APELLIDO2] =&gt; JIMENEZ
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25334853P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ALFONSO
    [APELLIDO1] =&gt; GUERRERO
    [APELLIDO2] =&gt; MUÑOZ
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25310703P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CARMEN MARIA
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; RAMOS
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25611825Z
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; PABLO
    [APELLIDO1] =&gt; ALBA
    [APELLIDO2] =&gt; SANCHEZ
    [FEC_PETICION] =&gt; 13-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25611449Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA ANGELES
    [APELLIDO1] =&gt; ABELA
    [APELLIDO2] =&gt; MARTINEZ
    [FEC_PETICION] =&gt; 13-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74907670M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ALICIA
    [APELLIDO1] =&gt; PEREZ
    [APELLIDO2] =&gt; GUERRERO
    [FEC_PETICION] =&gt; 13-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 50640296T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCA
    [APELLIDO1] =&gt; SANCHEZ
    [APELLIDO2] =&gt; BARBERA
    [FEC_PETICION] =&gt; 13-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; carmenbujalances@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 24309224H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LUCIA MARIA
    [APELLIDO1] =&gt; TORRES
    [APELLIDO2] =&gt; HIGUERAS
    [FEC_PETICION] =&gt; 14-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25341327L
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO GABRIEL
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; SERRANO
    [FEC_PETICION] =&gt; 14-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 52363005D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LUCIA
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; PERALVAREZ
    [FEC_PETICION] =&gt; 14-JAN-21
    [FEC_CITA] =&gt; 18-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 26302598M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Valentina 
    [APELLIDO1] =&gt; Londoño 
    [APELLIDO2] =&gt; castrillon
    [FEC_PETICION] =&gt; 12-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; anapispireta@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y8139421B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DAVID
    [APELLIDO1] =&gt; ORTIZ
    [APELLIDO2] =&gt; PALOMO
    [FEC_PETICION] =&gt; 14-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; anapispireta@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25337708B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA DEL CARMEN
    [APELLIDO1] =&gt; YAÑEZ
    [APELLIDO2] =&gt; VINARDELL
    [FEC_PETICION] =&gt; 14-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 51373160S
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANA MARIA
    [APELLIDO1] =&gt; GALEOTE
    [APELLIDO2] =&gt; ORTIZ
    [FEC_PETICION] =&gt; 14-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74903787D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; LUIS MIGUEL
    [APELLIDO1] =&gt; FRANCIA
    [APELLIDO2] =&gt; MARTINEZ
    [FEC_PETICION] =&gt; 14-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 24155784B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA JOSE
    [APELLIDO1] =&gt; CAMPOS
    [APELLIDO2] =&gt; HERRERO
    [FEC_PETICION] =&gt; 15-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25317435R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; MARQUEZ
    [APELLIDO2] =&gt; JIMENEZ
    [FEC_PETICION] =&gt; 15-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25312314D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; RAFAEL
    [APELLIDO1] =&gt; PENA
    [APELLIDO2] =&gt; PEREZ
    [FEC_PETICION] =&gt; 15-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74910705G
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DOLORES
    [APELLIDO1] =&gt; PALOMINO
    [APELLIDO2] =&gt; MERCADO
    [FEC_PETICION] =&gt; 18-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25309294W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MIGUEL ANGEL
    [APELLIDO1] =&gt; ROSILLO
    [APELLIDO2] =&gt; NUEVO
    [FEC_PETICION] =&gt; 18-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25336207M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; NOUREDDINE
    [APELLIDO1] =&gt; BEKKAOUI
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 18-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X3542319C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO JOSE
    [APELLIDO1] =&gt; PRADOS
    [APELLIDO2] =&gt; CORADO
    [FEC_PETICION] =&gt; 18-JAN-21
    [FEC_CITA] =&gt; 20-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25316165L
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; RICARDO FERNANDO
    [APELLIDO1] =&gt; GIMENEZ
    [APELLIDO2] =&gt; JIMENEZ
    [FEC_PETICION] =&gt; 19-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 29104371X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MIGUEL ANGEL
    [APELLIDO1] =&gt; SANCHEZ
    [APELLIDO2] =&gt; CEBRIAN
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74918130T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIA
    [APELLIDO1] =&gt; DIAZ
    [APELLIDO2] =&gt; MARIN
    [FEC_PETICION] =&gt; 19-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74916760X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CARMEN
    [APELLIDO1] =&gt; MUÑOZ
    [APELLIDO2] =&gt; GALLARDO
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25326467V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOAQUIN
    [APELLIDO1] =&gt; CORRALES
    [APELLIDO2] =&gt; SANCHEZ
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25354653M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; EVA
    [APELLIDO1] =&gt; LEON
    [APELLIDO2] =&gt; CORDERO
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 78963200Z
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; RAMA
    [APELLIDO2] =&gt; LUQUE
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25292766B
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANGELO JOSE
    [APELLIDO1] =&gt; FARIAS
    [APELLIDO2] =&gt; VILLENA
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y5178398P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE
    [APELLIDO1] =&gt; ZURITA
    [APELLIDO2] =&gt; GARCIA
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25299272P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt;  
    [APELLIDO1] =&gt; 
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 
    [FEC_CITA] =&gt; 22-JAN-21
    [CORREO_ELECTRONICO] =&gt;  
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; SUSANA
    [APELLIDO1] =&gt; MARTINEZ
    [APELLIDO2] =&gt; ARIZA
    [FEC_PETICION] =&gt; 18-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 52581936A
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN ANTONIO
    [APELLIDO1] =&gt; CARRION
    [APELLIDO2] =&gt; SEGURA
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74907145D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCO
    [APELLIDO1] =&gt; TORREBLANCA
    [APELLIDO2] =&gt; ARTACHO
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25320633W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; IZABELLA
    [APELLIDO1] =&gt; GOMES
    [APELLIDO2] =&gt; RUIVO
    [FEC_PETICION] =&gt; 21-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y5211815Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Patrick 
    [APELLIDO1] =&gt; van steenwinkel
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 18-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; fiscal@gestoclick.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y7697986S
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Katrien 
    [APELLIDO1] =&gt; van dooren
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 18-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; fiscal@gestoclick.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; Y7698049D
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN CARLOS
    [APELLIDO1] =&gt; ALCAIDE
    [APELLIDO2] =&gt; GRANADOS
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25100028J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARINA
    [APELLIDO1] =&gt; PACHECO
    [APELLIDO2] =&gt; CASQUET
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25341681M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; EDUARDO
    [APELLIDO1] =&gt; HERRERO
    [APELLIDO2] =&gt; VIDAL
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25305786J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN SIXTO
    [APELLIDO1] =&gt; ROMERO
    [APELLIDO2] =&gt; MARQUEZ
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25320974K
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA VICTORIA
    [APELLIDO1] =&gt; ORTIZ
    [APELLIDO2] =&gt; JIMENEZ
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25319810F
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MANUEL JESUS
    [APELLIDO1] =&gt; BARON
    [APELLIDO2] =&gt; ORTIZ
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25622059J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; VIRGINIA ROCIO
    [APELLIDO1] =&gt; ESPINOSA
    [APELLIDO2] =&gt; CAMPOS
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 25-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25342923M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MANUEL 
    [APELLIDO1] =&gt; PEREZ 
    [APELLIDO2] =&gt; MARTIN
    [FEC_PETICION] =&gt; 19-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; ernestosoriano@icantequera.es
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25316529F
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Rafael 
    [APELLIDO1] =&gt; Moral 
    [APELLIDO2] =&gt; Marín
    [FEC_PETICION] =&gt; 19-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; rafaelcomanche247@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25332456ª
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; NOEMI 
    [APELLIDO1] =&gt; MORALES 
    [APELLIDO2] =&gt; CARMONA
    [FEC_PETICION] =&gt; 19-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; noemimoralescarmona71@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25341219ª
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Jamila 
    [APELLIDO1] =&gt; Mchiouar
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; mveramchiouar@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X5113650
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE 
    [APELLIDO1] =&gt; SEIJO
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; jomaseflo@outlook.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 01081808J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Natalia 
    [APELLIDO1] =&gt; Mezcua 
    [APELLIDO2] =&gt; Merino
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; nataliamezcuamerino@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 77662645V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; María 
    [APELLIDO1] =&gt; Melgares 
    [APELLIDO2] =&gt; Molina
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; mariamelgares13@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 53898736F
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Jose 
    [APELLIDO1] =&gt; zurita 
    [APELLIDO2] =&gt; garcia
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; j.zuritagarcia@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 22299272P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Pilar 
    [APELLIDO1] =&gt; Castillo 
    [APELLIDO2] =&gt; Verdugo
    [FEC_PETICION] =&gt; 20-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; pilarcastilloverdugo96@gmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 76880458Z
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MANUEL
    [APELLIDO1] =&gt; VALENCIA
    [APELLIDO2] =&gt; LARA
    [FEC_PETICION] =&gt; 25-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 44360673K
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DANIEL
    [APELLIDO1] =&gt; RUIZ
    [APELLIDO2] =&gt; GOMEZ
    [FEC_PETICION] =&gt; 25-JAN-21
    [FEC_CITA] =&gt; 27-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74914544W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; Marina 
    [APELLIDO1] =&gt; Casquet
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; marinapc85@hotmail.com
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25305280J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; RAFAEL
    [APELLIDO1] =&gt; PAEZ
    [APELLIDO2] =&gt; GOMEZ
    [FEC_PETICION] =&gt; 22-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74916626Z
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DAVID
    [APELLIDO1] =&gt; LOPEZ
    [APELLIDO2] =&gt; ROMERO
    [FEC_PETICION] =&gt; 25-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74913892V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MIGUEL ANGEL
    [APELLIDO1] =&gt; SANCHEZ
    [APELLIDO2] =&gt; CEBRIAN
    [FEC_PETICION] =&gt; 25-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 74918130T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSEFINA SOCORRO
    [APELLIDO1] =&gt; PEREZ
    [APELLIDO2] =&gt; CAMACHO
    [FEC_PETICION] =&gt; 25-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25328589T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JANER STEVEN
    [APELLIDO1] =&gt; HERNANDEZ
    [APELLIDO2] =&gt; VILLAQUIRAN
    [FEC_PETICION] =&gt; 25-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X8508760W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; FRANCISCA
    [APELLIDO1] =&gt; DIEZ DE LOS RIOS
    [APELLIDO2] =&gt; GARCIA
    [FEC_PETICION] =&gt; 26-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25315386E
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CARMEN
    [APELLIDO1] =&gt; GARCIA
    [APELLIDO2] =&gt; TORRES
    [FEC_PETICION] =&gt; 25-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25302213M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA JULIETA
    [APELLIDO1] =&gt; MALDONADO
    [APELLIDO2] =&gt; GONZALEZ
    [FEC_PETICION] =&gt; 26-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X7129047J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA DOLORES
    [APELLIDO1] =&gt; CABELLO
    [APELLIDO2] =&gt; AGUILAR
    [FEC_PETICION] =&gt; 26-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25325152J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA JOSE
    [APELLIDO1] =&gt; SANCHEZ
    [APELLIDO2] =&gt; SOTO
    [FEC_PETICION] =&gt; 26-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25333248J
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; XUEJING
    [APELLIDO1] =&gt; ZHOU
    [APELLIDO2] =&gt; 
    [FEC_PETICION] =&gt; 27-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X4163349G
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE
    [APELLIDO1] =&gt; GIMENEZ
    [APELLIDO2] =&gt; CUADRA
    [FEC_PETICION] =&gt; 27-JAN-21
    [FEC_CITA] =&gt; 29-JAN-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25612225T
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CELIA
    [APELLIDO1] =&gt; VEGAS
    [APELLIDO2] =&gt; MELERO
    [FEC_PETICION] =&gt; 27-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25352281W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; SERGIO
    [APELLIDO1] =&gt; PERAL
    [APELLIDO2] =&gt; MONTES
    [FEC_PETICION] =&gt; 27-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25352575C
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; CLAUDIA MARGARITA
    [APELLIDO1] =&gt; POLANIA
    [APELLIDO2] =&gt; RIVERA
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; X4437739G
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARTA
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; ROMAN
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25611945L
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA CRISTINA
    [APELLIDO1] =&gt; DE LA ROSA
    [APELLIDO2] =&gt; CEBALLOS
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25325094R
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ISABEL
    [APELLIDO1] =&gt; RIOS
    [APELLIDO2] =&gt; TRILLO
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25302201Q
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA JOSE
    [APELLIDO1] =&gt; AGUILAR
    [APELLIDO2] =&gt; MARMOL
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 50642128S
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JUAN
    [APELLIDO1] =&gt; PEREA
    [APELLIDO2] =&gt; GALLARDO
    [FEC_PETICION] =&gt; 29-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25320173W
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MANUEL
    [APELLIDO1] =&gt; MARTINEZ
    [APELLIDO2] =&gt; JIMENEZ
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25305929H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JORGE
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; CLAVIJO
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25613427Y
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; TOMAS
    [APELLIDO1] =&gt; PEREZ
    [APELLIDO2] =&gt; JUNCOSA
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 24764522P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MIGUEL ANGEL
    [APELLIDO1] =&gt; PEREZ
    [APELLIDO2] =&gt; MURIEL
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25608090M
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANTONIO CARLOS
    [APELLIDO1] =&gt; PALMA
    [APELLIDO2] =&gt; CARMONA
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 01-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25309701H
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MARIA DEL CARMEN
    [APELLIDO1] =&gt; PARADAS
    [APELLIDO2] =&gt; CABELLO
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 03-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25330575P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE ANGEL
    [APELLIDO1] =&gt; ORTUÑO
    [APELLIDO2] =&gt; RUIZ
    [FEC_PETICION] =&gt; 28-JAN-21
    [FEC_CITA] =&gt; 03-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25298683V
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; DANIEL
    [APELLIDO1] =&gt; GONZALEZ
    [APELLIDO2] =&gt; IÑIGUEZ
    [FEC_PETICION] =&gt; 29-JAN-21
    [FEC_CITA] =&gt; 03-FEB-21
    [CORREO_ELECTRONICO] =&gt; 
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25349741S
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ANA MARIA
    [APELLIDO1] =&gt; CUENCA
    [APELLIDO2] =&gt; URIBE
    [FEC_PETICION] =&gt; 29-JAN-21
    [FEC_CITA] =&gt; 03-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 26802161P
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; MIGUEL
    [APELLIDO1] =&gt; SANCHEZ
    [APELLIDO2] =&gt; PEREZ
    [FEC_PETICION] =&gt; 29-JAN-21
    [FEC_CITA] =&gt; 03-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25608221K
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; JOSE ANTONIO
    [APELLIDO1] =&gt; LUQUE
    [APELLIDO2] =&gt; VILLALON
    [FEC_PETICION] =&gt; 29-JAN-21
    [FEC_CITA] =&gt; 03-FEB-21
    [CORREO_ELECTRONICO] =&gt; no registrado
    [OBSERVACIONES] =&gt; 
    [DNI] =&gt; 25310187K
    [PRESENTADO] =&gt; D
)
Array
(
    [NOMBRE] =&gt; ROCIO
    [APELLIDO1] =&gt; PRADOS
    [APELLIDO2] =&gt; */