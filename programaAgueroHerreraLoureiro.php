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

///////////////////////////// FUNCION 11 /////////////////////////////////////////
// Función de comparación
/**
 * Funcion de comparacion para la utilización de la funcion predefinida uasort en el modulo ordenaPartidas
 * @param array $partida1
 * @param array $partida2
 * @return int
 */
function cmp($partida1, $partida2) {
    // $int $orden
    if ($partida1["jugador"] == $partida2["jugador"]){
        if ($partida1["palabraWordix"] == $partida2["palabraWordix"]){
            $orden = 0;
        } elseif ($partida1["palabraWordix"] < $partida2["palabraWordix"]){
            $orden = -1;
        } else {
            $orden = 1;
        }
    } elseif ($partida1["jugador"] < $partida2["jugador"]){
        $orden = -1;
    } else {
        $orden = 1;
    }
    return $orden;
}
/**
 * Muestra coleccion de partidas de manera ordenada
 * @param array $coleccionPartidasOP
 */
function ordenaPartidas ($coleccionPartidasOP){
    uasort($coleccionPartidasOP, "cmp");
    print_r($coleccionPartidasOP);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// int $opcion, $nArregloPalabras, $numeroElegidoPP, $nArregloPartidasPP, $iPP (case 1)
// int $numeroAleatorioPP (case 2)
// int $numeroPartidaPP (case 3)
// int $primeraGanada (case 4)
// int $porcentajeVictorias (case 5)

// string $nombreJugadorPP, $palabraElegida (case 1)
// string $palabraAleatoria (case 2)

// array $partidaJugada (case 1)
// array $resumenFinalJugador (case 5)

//Inicialización de variables:
//a) Precarga de la estructura de las partidas
$coleccionPartidasPP = cargarPartidas ();
//b) Precarga de la estructura de las palabras
$coleccionPalabrasPP = cargarColeccionPalabras();

//Proceso:
 
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1:
            $nombreJugadorPP = solicitarJugador();
            $nArregloPalabras = count($coleccionPalabrasPP);
            echo "Elige un número para seleccionar la palabra con la que vas a jugar: ";
            $numeroElegidoPP = solicitarNumeroEntre(1, $nArregloPalabras);
            $numeroElegidoPP = ($numeroElegidoPP-1);
            $palabraElegida = $coleccionPalabrasPP[$numeroElegidoPP];
            $nArregloPartidasPP = count($coleccionPartidasPP);
            $iPP = 0;
            while ($iPP < $nArregloPartidasPP){
                if (($palabraElegida == $coleccionPartidasPP[$iPP]["palabraWordix"]) && ($nombreJugadorPP == $coleccionPartidasPP[$iPP]["jugador"])){
                    echo "El jugador " . $nombreJugadorPP . " ya ha jugado con esta palabra. Ingrese otro número: ";
                    $numeroElegidoPP = solicitarNumeroEntre(1, $nArregloPalabras);
                    $numeroElegidoPP = ($numeroElegidoPP-1);
                    $palabraElegida = $coleccionPalabrasPP[$numeroElegidoPP];
                    $iPP = 0;
                } else {
                    $iPP = $iPP + 1;
                }
            }
            $partidaJugada = jugarWordix($palabraElegida, $nombreJugadorPP);
            array_push($coleccionPartidasPP, $partidaJugada);
            break;
        case 2:
            $nombreJugadorPP = solicitarJugador();
            $nArregloPalabras = count($coleccionPalabrasPP);
            $numeroAleatorioPP = rand(1, $nArregloPalabras);
            $numeroAleatorioPP = $numeroAleatorioPP-1;
            $palabraAleatoria = $coleccionPalabrasPP[$numeroAleatorioPP];
            $nArregloPartidasPP = count($coleccionPartidasPP);
            $iPP = 0;
            while ($iPP < $nArregloPartidasPP){
                if (($palabraAleatoria == $coleccionPartidasPP[$iPP]["palabraWordix"]) && ($nombreJugadorPP == $coleccionPartidasPP[$iPP]["jugador"])){
                    $numeroAleatorioPP = rand(1, $nArregloPalabras);
                    $numeroAleatorioPP = ($numeroAleatorioPP-1);
                    $palabraAleatoria = $coleccionPalabrasPP[$numeroAleatorioPP];
                    $iPP = 0;
                } else {
                    $iPP = $iPP + 1;
                }
            }
            $partidaJugada = jugarWordix($palabraAleatoria, $nombreJugadorPP);
            array_push($coleccionPartidasPP, $partidaJugada);
            break;
        case 3:
            $nArregloPartidasPP = count($coleccionPartidasPP);
            echo "¿Qué partida desea mostrar? Ingrese un número entre 1 y " . $nArregloPartidasPP . ": ";
            $numeroPartidaPP = solicitarNumeroEntre(1, $nArregloPartidasPP);
            imprimirResultado($numeroPartidaPP, $coleccionPartidasPP);
            break;
        case 4:
            echo "Para poder ver la primera partida ganada, ";
            $nombreJugadorPP = solicitarJugador();
            $primeraGanada = indicePrimeraGanada($coleccionPartidasPP, $nombreJugadorPP);
            if ($primeraGanada == -2){
                echo "No existe el jugador \n";
            } elseif ($primeraGanada == -1){
                echo "El jugador " . $nombreJugadorPP . " no ganó ninguna partida \n";
            } else {
                $primeraGanada = $primeraGanada + 1;
                imprimirResultado($primeraGanada, $coleccionPartidasPP);
            }
            break;
        case 5:
            echo "Para ver las estadisticas del jugador, ";
            $nombreJugadorPP = solicitarJugador();
            $resumenFinalJugador = retornaResumenJugador($coleccionPartidasPP, $nombreJugadorPP);
            if ($resumenFinalJugador["partidas"] == 0){
                echo "El jugador no ha jugado ninguna partida";
            } else {
            echo "**********************************\n";
            echo "Jugador: " . $resumenFinalJugador["jugador"] . "\n";
            echo "Partidas: " . $resumenFinalJugador["partidas"] . "\n";
            echo "Puntaje Total: " . $resumenFinalJugador["puntaje"] . "\n";
            echo "Victorias: " . $resumenFinalJugador["victorias"] . "\n";
            $porcentajeVictorias = (int)(($resumenFinalJugador["victorias"]*100)/$resumenFinalJugador["partidas"]);
            echo "Porcentaje Victorias: " . $porcentajeVictorias . "%\n";
            echo "Adivinadas: \n";
            echo "    Intento 1: " . $resumenFinalJugador["intento1"] . "\n";
            echo "    Intento 2: " . $resumenFinalJugador["intento2"] . "\n";
            echo "    Intento 3: " . $resumenFinalJugador["intento3"] . "\n";
            echo "    Intento 4: " . $resumenFinalJugador["intento4"] . "\n";
            echo "    Intento 5: " . $resumenFinalJugador["intento5"] . "\n";
            echo "    Intento 6: " . $resumenFinalJugador["intento6"] . "\n";
            echo "**********************************\n";
            }
            break;
        case 6:
            ordenaPartidas($coleccionPartidasPP);
            break;
        case 7:
            
            break;
        case 8:
            
            break;
    }
} while ($opcion != 8);