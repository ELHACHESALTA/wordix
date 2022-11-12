<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/*
| Apellido, Nombre                | Legajo   | Carrera | Mail                                  | GitHub             |
| Agüero Mendez, Guillermo Andres | FAI-3844 | TUDW    | guillermo.aguero@est.fi.uncoma.edu.ar | guillermoagueronqn |
| Herrera, Julio Federico         | FAI-4285 | TUDW    | julio.herrera@est.fi.uncoma.edu.ar    | ELHACHESALTA       |
| Loureiro, Jazmin Loureiro       | FAI-4228 | TUDW    | jazmin.loureiro@est.fi.uncoma.edu.ar  | Jazmin-Loureiro    | 
*/

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

///////////////////////////// FUNCION 1 /////////////////////////////////////////
/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PERRO", "OVNIS", "RUGBY", "BUCEO", "BUSCO"
    ];
    return ($coleccionPalabras);
}

///////////////////////////// FUNCION 2 /////////////////////////////////////////
/**
 * Obtiene una colección de partidas
 * @return array
 */
function cargarPartidas(){
    // array $coleccionPartidas
    $coleccionPartidas = [];
    $coleccionPartidas[0]=["palabraWordix"=>"QUESO", "jugador"=>"majo", "intentos"=>0, "puntaje"=>0];
    $coleccionPartidas[1]=["palabraWordix"=>"CASAS", "jugador"=>"julio", "intentos"=>3, "puntaje"=>14];
    $coleccionPartidas[2]=["palabraWordix"=>"MUJER", "jugador"=>"rudolf", "intentos"=>4, "puntaje"=>13];
    $coleccionPartidas[3]=["palabraWordix"=>"YUYOS", "jugador"=>"jazmin", "intentos"=>6, "puntaje"=>12];
    $coleccionPartidas[4]=["palabraWordix"=>"NAVES", "jugador"=>"julio", "intentos"=>4, "puntaje"=>13];
    $coleccionPartidas[5]=["palabraWordix"=>"PISOS", "jugador"=>"majo", "intentos"=>3, "puntaje"=>14];
    $coleccionPartidas[6]=["palabraWordix"=>"FUEGO", "jugador"=>"andres", "intentos"=>0, "puntaje"=>0];
    $coleccionPartidas[7]=["palabraWordix"=>"RASGO", "jugador"=>"jazmin", "intentos"=>1, "puntaje"=>16];
    $coleccionPartidas[8]=["palabraWordix"=>"GATOS", "jugador"=>"majo", "intentos"=>2, "puntaje"=>15];
    $coleccionPartidas[9]=["palabraWordix"=>"GOTAS", "jugador"=>"rudolf", "intentos"=>6, "puntaje"=>11];
    return $coleccionPartidas;
}

///////////////////////////// FUNCION 3 /////////////////////////////////////////
/**
 * Muestra el menu de opciones al jugador, le solicita una opcion valida y retorna la misma
 * @return int
 */
function seleccionarOpcion () {
    /* int $resultado */
    echo "***************************************************\n";
    echo "**************** Menú de opciones: ****************\n";
    echo "***************************************************";
    echo " 
    1) Jugar al Wordix con una palabra elegida 
    2) Jugar al Wordix con una palabra aleatoria
    3) Mostrar una partida 
    4) Mostrar la primer partida ganadora 
    5) Mostrar resumen de Jugador  
    6) Mostrar listado de partidas ordenadas por jugador y por palabra 
    7) Agregar una palabra de 5 letras a Wordix  
    8) Salir 
    ¿Qué desea hacer? Seleccione una opcion: ";
    $resultado = solicitarNumeroEntre (1, 8);
    return $resultado;
}

///////////////////////////// FUNCION 4 /////////////////////////////////////////
    //Reusamos la función del código fuente leerPalabra5Letras()

///////////////////////////// FUNCION 5 /////////////////////////////////////////
    //Reusamos la función del código fuente solicitarNumeroEntre()

///////////////////////////// FUNCION 6 /////////////////////////////////////////
    /**
     * Muestra los datos de una partida seleccionada
     * @param int $numeroPartidaIR
     * @param array $coleccionPartidasIR
     */
    function imprimirResultado($numeroPartidaIR, $coleccionPartidasIR) {
        $numeroPartidaIR = $numeroPartidaIR - 1;
        echo "**********************************\n";
        echo "Partida WORDIX " . $numeroPartidaIR . ": palabra " . $coleccionPartidasIR[$numeroPartidaIR]["palabraWordix"] . "\n";
        echo "Jugador: " . $coleccionPartidasIR[$numeroPartidaIR]["jugador"] . "\n";
        echo "Puntaje: " . $coleccionPartidasIR[$numeroPartidaIR]["puntaje"] . " puntos" . "\n";
        if ($coleccionPartidasIR[$numeroPartidaIR]["intentos"] != 0) {
            echo "Intento: Adivinó la palabra en " . $coleccionPartidasIR[$numeroPartidaIR]["intentos"] . " intentos\n";
        } else {
            echo "Intento: No adivinó la palabra\n";
        }
        echo "**********************************\n";
    }

///////////////////////////// FUNCION 7 /////////////////////////////////////////
/**
 * Se modifica la estructura de palabras al agregarse una nueva palabra
 * @param array $coleccionPalabrasAP
 * @param string $palabraAP
 * @return array
 */
function agregarPalabra($coleccionPalabrasAP, $palabraAP){
    array_push($coleccionPalabrasAP, $palabraAP);
    return $coleccionPalabrasAP;
}

///////////////////////////// FUNCION 8 /////////////////////////////////////////
/**
 * Retorna el indice de la primera partida ganada por un jugador, si jugó pero nunca ganó retorna -1 y si no jugó retorna -2
 * @param array $coleccionPartidasIPG
 * @param string $nombreJugadorIPG
 * @return int
 */
function indicePrimeraGanada ($coleccionPartidasIPG, $nombreJugadorIPG){
    // int $n, $i, $indiceFinal
    $n = count($coleccionPartidasIPG);
    $i = 0;
    $indiceFinal = -2;
    while (($i < $n) && ($indiceFinal==-2 || $indiceFinal==-1)){
        if ($coleccionPartidasIPG[$i]["jugador"]==$nombreJugadorIPG){
            if ($coleccionPartidasIPG[$i]["puntaje"] > 0){
                $indiceFinal = $i;
            } elseif ($coleccionPartidasIPG[$i]["puntaje"] == 0){
                $indiceFinal = -1;
            }
        }
        $i = $i+1;
    }
    return $indiceFinal;
}

///////////////////////////// FUNCION 9 /////////////////////////////////////////
/**
 * Retorna el resumen de un jugador a partir de una coleccion de partidas y del nombre del jugador
 * @param array $coleccionPartidasRRJ
 * @param string $nombreJugadorRRJ
 * @return array
 */
function retornaResumenJugador ($coleccionPartidasRRJ, $nombreJugadorRRJ){
    // array $resumenJugador
    // int $n, $i, $partidasTotales, $puntajeTotal, $victoriasTotales, $intento1Total, $intento2Total
    // int $intento3Total, $intento4Total, $intento5Total, $intento6Total
    $partidasTotales = 0;
    $puntajeTotal = 0;
    $victoriasTotales = 0;
    $intento1Total = 0;
    $intento2Total = 0;
    $intento3Total = 0;
    $intento4Total = 0;
    $intento5Total = 0;
    $intento6Total = 0;
    $resumenJugador = [];
    $n = count($coleccionPartidasRRJ);
    for ($i=0; $i < $n; $i++){
        if($coleccionPartidasRRJ[$i]["jugador"] == $nombreJugadorRRJ){
            $partidasTotales = $partidasTotales + 1;
            $puntajeTotal = $puntajeTotal + $coleccionPartidasRRJ[$i]["puntaje"];
            if ($coleccionPartidasRRJ[$i]["puntaje"] > 0){
                $victoriasTotales = $victoriasTotales + 1;
            }
            switch ($coleccionPartidasRRJ[$i]["intentos"]){
                case 1:
                    $intento1Total++;
                    break;
                case 2:
                    $intento2Total++;
                    break;
                case 3:
                    $intento3Total++;
                    break;
                case 4:
                    $intento4Total++;
                    break;
                case 5:
                    $intento5Total++;
                    break;
                case 6:
                    $intento6Total++;
                    break;
            }
        }
    }
    $resumenJugador["jugador"] = $nombreJugadorRRJ;
    $resumenJugador["partidas"] = $partidasTotales;
    $resumenJugador["puntaje"] = $puntajeTotal;
    $resumenJugador["victorias"] = $victoriasTotales;
    $resumenJugador["intento1"] = $intento1Total;
    $resumenJugador["intento2"] = $intento2Total;
    $resumenJugador["intento3"] = $intento3Total;
    $resumenJugador["intento4"] = $intento4Total;
    $resumenJugador["intento5"] = $intento5Total;
    $resumenJugador["intento6"] = $intento6Total;
    return $resumenJugador;
}

///////////////////////////// FUNCION 10 /////////////////////////////////////////
/**
 * Retorna el nombre del usuario en minusculas
 * @return string
 */
function solicitarJugador (){
    // string $nombreIngresado, $primerLetra, $nombreFinal
    echo "Ingrese el nombre de un jugador: ";
    $nombreIngresado = trim(fgets(STDIN));
    $primerLetra = $nombreIngresado[0];
    while (!(ctype_alpha($primerLetra))){
        echo "Debe ingresar un nombre de jugador que empiece con letra: ";
        $nombreIngresado = trim(fgets(STDIN));
        $primerLetra = $nombreIngresado[0];
    }
    $nombreFinal = strtolower($nombreIngresado);
    return $nombreFinal;
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:
$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/

