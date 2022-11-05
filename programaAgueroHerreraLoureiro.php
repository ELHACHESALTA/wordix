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
    $coleccionPartidas[0]=["palabraWordix"=>"QUESO", "jugador"=>"majo", "intentos"=>6, "puntaje"=>10];
    $coleccionPartidas[1]=["palabraWordix"=>"CASAS", "jugador"=>"julio", "intentos"=>3, "puntaje"=>14];
    $coleccionPartidas[2]=["palabraWordix"=>"MUJER", "jugador"=>"rudolf", "intentos"=>4, "puntaje"=>13];
    $coleccionPartidas[3]=["palabraWordix"=>"YUYOS", "jugador"=>"jazmin", "intentos"=>6, "puntaje"=>12];
    $coleccionPartidas[4]=["palabraWordix"=>"NAVES", "jugador"=>"julio", "intentos"=>4, "puntaje"=>13];
    $coleccionPartidas[5]=["palabraWordix"=>"PISOS", "jugador"=>"majo", "intentos"=>3, "puntaje"=>14];
    $coleccionPartidas[6]=["palabraWordix"=>"FUEGO", "jugador"=>"andres", "intentos"=>6, "puntaje"=>0];
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
