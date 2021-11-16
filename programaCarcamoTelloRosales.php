<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Tello Parra, Matias Nahuel. FAI 2904 . TUDW . matias.tello@est.fi.uncoma.edu.ar . NahuelTello*/
/* Cárcamo, Milagros Sofia - FAI 2987  - TUDW  - milagros.carcamo@est.fi.uncoma.edu.ar  - milicarcamo */
/* Rosales, Martina Milagros - FAI 2752 - TUDW - martina.rosales@est.fi.uncoma.edu.ar - MartinaRosalesF */

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/************ PARTE NAHUEL ************/
/**
 * funcion 2 <-- Explicacion 3
 * Muestra las opciones del menú de pantalla, donde se le solicita al usuario
 * una opcion valida y retorne el numero de la opcion. La ultima opcion del 
 * menu debe ser "Salir"
 * @return int
 */
function seleccionarOpcion() { //Ingresamos la opcion del menu
    //INT $opcion 
    echo "\n  Menú de opciones \n
    1) Jugar al tateti \n
    2) Mostrar un juego \n
    3) Mostrar el primer juego ganador \n
    4) Mostrar porcentaje de Juegos ganados \n
    5) Mostrar resumen de jugador \n
    6) Mostrar listado de juegos Ordenado por jugador O\n
    7) Salir \n";
    echo "Ingrese una opcion entre 1 y 7: " ;
    $opcion = validarOpcion(1, 7); //Puedo poner como parametros formales directamente los numeros entre el rango que me pide?? 
    /* Creo que esta bien asi, ya mandar directamente esos parametros asi despues los podes ingresar manualmente */
    return $opcion ;
}

/**
 * Funcion 3 --> Explicacion 3
 * Solicita al usuario un numero entre un rango de valores. Si el numero ingresado
 * no es valido, la funcion se encarga de volver a pedirlo. Retorna un numero valido.
 * @param int $numMin . El num min seria 1
 * @param int $numMax . El num Max seria 7
 */
function validarOpcion ($numMin, $numMax) {
    //echo "Ingrese una opcion, entre 1 y 7: " ;
    $opcionValida = solicitarNumeroEntre($numMin, $numMax) ; //Invoco la funcion del programa "tateti" y me ahorro de hacer un if con la condicion de los rangos
    return $opcionValida ;
}

/**
 * Busca la primer victoria de un jugador
 * @param array $historialJuegos
 * @param String $jugadorBuscado
 * @return int
 */
function buscaPrimerVictoria ($historialJuegos, $jugadorBuscado){
    // int $i, $indice, $cantPartidas
    // boolean $corte
    $i = 0;
    $corte = true;
    $indice = -1;
    $cantPartidas = count ($historialJuegos);
    while (($i < $cantPartidas) && ($corte)){
        if ($jugadorBuscado == $historialJuegos[$i]["jugadorX"]) {
            if ($historialJuegos[$i]["puntosX"] > $historialJuegos[$i]["puntosO"]) {
                $indice = $i;
                $corte = false;
            }
        } elseif ($jugadorBuscado == $historialJuegos[$i]["jugadorO"]) {
            if ($historialJuegos[$i]["puntosO"] > $historialJuegos[$i]["puntosX"]) {
                $indice = $i;
                $corte = false;
            }
        }
        $i++;
    }
    return $indice;
}

/**
 * Dada una coleccion de juegos y el nombre del jugador
 * retorna el resumen del jugador
 * 
 * @param array $historialJuegos
 * @param String $nombreJugador
 * @return 
 */
function resumenJugador ($historialJuegos, $nombreJugador){
    //int $juegosGanados, $juegosPerdidos, $juegosEmpatados, $puntosAcumulados
    // array $resJugador coleccion asociativa
    $juegosGanados = 0;
    $juegosPerdidos = 0;
    $juegosEmpatados = 0;
    $puntosAcumulados = 0;

    foreach ($historialJuegos as $indice => $elemento) {
        if (($historialJuegos[$indice]["jugadorX"] == $nombreJugador) ||($historialJuegos[$indice]["jugadorO"] == $nombreJugador) ) {
        
            if ( ( $historialJuegos[$indice]["puntosX"] > $historialJuegos[$indice]["puntosO"] ) ) {
                $juegosGanados = $juegosGanados + 1;
                $puntosAcumulados = $historialJuegos [$indice]["puntosX"];
                $puntosAcumulados = $puntosAcumulados + PTOS_GANADOR;
            } elseif (( $historialJuegos[$indice]["puntosX"] < $historialJuegos[$indice]["puntosO"] ) ) {
                $juegosPerdidos = $juegosPerdidos + 1;
                $puntosAcumulados = $puntosAcumulados + PTOS_PERDEDOR;
            } else {
                $juegosEmpatados = $juegosEmpatados + 1;
                $puntosAcumulados = $puntosAcumulados + PTOS_EMPATE;
            }
        }
    }

    $resJugador = [
        "nombre" => $nombreJugador,
        "juegosGanados" => $juegosGanados,
        "juegosPerdidos" => $juegosPerdidos,
        "juegosEmpatados" => $juegosEmpatados,
        "puntosAcumulados" => $puntosAcumulados
    ];
    /* 
    echo " *********************************** \n";
    echo " Jugador: " .$resJugador["nombre"]."\n";
    echo " Gano: ".$resJugador["juegosGanados"]." juegos\n";
    echo " Perdio: ".$resJugador["juegosPerdidos"]." juegos\n";
    echo " Empato: ".$resJugador["juegosEmpatados"]." juegos\n";
    echo " Total de puntos acumulados: ".$resJugador["puntosAcumulados"]." puntos"."\n";
    echo " *********************************** \n"; */
    return $resJugador;
    
}

/**
 * Verifica si existe un juego cargado y retorna true o false
 * 
 * @param array $historialJuegos
 * @return boolean
 */
function existeJuego($historialJuegos){
    $existe = false;
    foreach ($historialJuegos as $indice) {
        
    }
}
/************ PARTE NAHUEL ************/

/************ PARTE MARTINA ************/
/**
 * Función 1 <-- Explicación 3
 *  Historial precargado de partidas de tateti.
 *  Los datos de las partidas inventadas se almacenaron en un arreglo multidimensional indexado,
 * que contiene múltiples arreglos asociativos. 
 * @return array 
 */
function cargarJuegos (){
    $juegosPrecargados [0] = ["jugadorX" => "TOMI", "jugadorO" => "JUAN", "puntosX" => 5, "puntosO" => 0];
    $juegosPrecargados [1] = ["jugadorX" => "JUAN", "jugadorO" => "ANTO", "puntosX" => 1, "puntosO" => 1];
    $juegosPrecargados [2] = ["jugadorX" => "GONZI", "jugadorO" => "DEDU", "puntosX" => 0, "puntosO" => 4];
    $juegosPrecargados [3] = ["jugadorX" => "GALA", "jugadorO" => "NICO", "puntosX" => 0, "puntosO" => 5];
    $juegosPrecargados [4] = ["jugadorX" => "NICO", "jugadorO" => "TOMI", "puntosX" => 1, "puntosO" => 1];
    $juegosPrecargados [5] = ["jugadorX" => "MARI", "jugadorO" => "ALEJO", "puntosX" => 3, "puntosO" => 0];
    $juegosPrecargados [6] = ["jugadorX" => "ALEJO", "jugadorO" => "MARI", "puntosX" => 1, "puntosO" => 1];
    $juegosPrecargados [7] = ["jugadorX" => "FINN", "jugadorO" => "FACU", "puntosX" => 4, "puntosO" => 0];
    $juegosPrecargados [8] = ["jugadorX" => "FACU", "jugadorO" => "GONZI", "puntosX" => 1, "puntosO" => 1];
    $juegosPrecargados [9] = ["jugadorX" => "ANTO", "jugadorO" => "GALA", "puntosX" => 2, "puntosO" => 0];
    $juegosPrecargados [10] = ["jugadorX" => "JUAN", "jugadorO" => "GALA", "puntosX" => 4, "puntosO" => 0];
    return $juegosPrecargados;
}

/**
 * Función 5 <-- Explicación 3
 * Agrega la última partida al historial de juegos de tateti
 * @param array $juego
 * @param array $historialJuegos
 * @return array
 */
function agregarJuego ($historialJuegos, $juego){
    array_push($historialJuegos, $juego);
    //utilizamos la función array_push: recibe dos elementos ($arreglo, $variable),
    //y agrega al arreglo ingresado, la variable ingresada en la función.
    return $historialJuegos;
}

/**
 * Función 4 <-- Explicación 3
 * muestra los datos de determinada partida de tateti.
 * @param int $nroPartida
 * @param array $historialJuegos //Seria historialJuegos
 */
function mostrarJuego($historialJuegos, $nroPartida){
    // string $resultado
    if ($historialJuegos[$nroPartida]["puntosX"] == $historialJuegos[$nroPartida]["puntosO"]){
        $resultado = "empate";
    }else if ($historialJuegos[$nroPartida]["puntosX"] < $historialJuegos[$nroPartida]["puntosO"]){
        $resultado = "ganó O";
    }else{
        $resultado = "ganó X";
    }
    echo "**************************************** \n";
    echo "Juego TATETI: ". $nroPartida." (". $resultado. ") \n";
    echo "Jugador X: ". $historialJuegos[$nroPartida]["jugadorX"]. " obtuvo ". $historialJuegos[$nroPartida]["puntosX"]. " puntos.\n";
    echo "jugador O: ". $historialJuegos[$nroPartida]["jugadorO"]. " obtuvo ". $historialJuegos[$nroPartida]["puntosO"]. " puntos.\n";
    echo "**************************************** \n";
}

/** 
 * Calcula el porcentaje de victorias respecto al total de partidas jugadas
 * @param int $victorias
 * @param float $porcentaje
 * @return float
 */
function porcentajeVictorias($historialJuegos){
    $victorias = cantidadVictorias($historialJuegos);
    $porcentaje = ($victorias*100)/count($historialJuegos);
    return $porcentaje;
}

/**
 * Contea la cantidad de veces que se ganó una partida
 * respecto al total de partidas de tateti jugadas.
 * @param int $victorias
 * @return int
 */
function cantidadVictorias ($historialJuegos){
    $victorias = 0;

    foreach ($historialJuegos as $indice => $elemento) {
        if ($historialJuegos [$indice]["puntosX"]  == $historialJuegos [$indice]["puntosO"]){
            $victorias = $victorias;
        } else {
            $victorias ++ ;
        }
    }
    return $victorias;
}

/************ PARTE MARTINA ************/

/************ PARTE MILAGROS ************/

/**
 * Funcion del inciso 8 --> "Explicacion 3"
 * Solicita al usuario un símbolo X o O y retorna el símbolo elegido.
 * La función debe validar el datos ingresado por el usuario (Utilice funciones predefinidas de string).
 * @return STRING
 */
function seleccionarSimbolo () {
    //STRING $simbolo, $simboloAux
    do {
        echo "Ingrese el simbolo con el que desea jugar (X / O): " ;
        //La funcion predefinida "strtoupper" que utilizamos abajo, devuelve el string ingresado con todos los caracteres en mayuscula
        $simbolo = strtoupper(trim(fgets(STDIN))); 
        $simboloAux = "" ; //Lo inicilizo con "" ya que si ingresa un simbolo invalido va a tirar el cartel de 'variable indefinida'
        if (($simbolo == "X") || ($simbolo == "O")) {
            $simboloAux = $simbolo;
        }else {
            echo "El simbolo " . $simbolo . " no es correcto. Ingrese uno valido. \n" ;
        }
    } while ($simbolo <> $simboloAux);
    return $simbolo ;
}



/**
 * Funcion 10 --> "Explicacion 3"
 * Dada una colección de juegos y un símbolo (X o O) retorna la cantidad de juegos ganados por el símbolo ingresado por parámetro.
 * @param array $coleccionJuegos
 * @param STRING $simbolo
 * @return int
 */
function victoriasDeSimbolos ($coleccionJuegos, $simbolo) {
    //INT $juegosGanadosSimbolo, $i, $cantElementosArray
    $cantElementosArray = count($coleccionJuegos) ;
    $juegosGanadosSimbolo = 0 ; // Cuenta de la cant de juegos ganados por el simbolo ingresado
    for ($i=0; $i < $cantElementosArray ; $i++) {
        if (($simbolo == "X") && ($coleccionJuegos[$i] ["puntosX"]  >  $coleccionJuegos[$i] ["puntosO"])){
            $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }elseif (($simbolo == "O") && ($coleccionJuegos[$i] ["puntosX"]  <  $coleccionJuegos[$i] ["puntosO"])) {
                $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }    
    }
    return $juegosGanadosSimbolo ;
}


/**
 * Función 11 -> "Explicacion 3"
 * Implementar una función SIN RETORNO que, dada una colección de juegos, 
 * muestre la colección de juegos ordenado por el nombre del jugador cuyo símbolo es O.
 * @param array $coleccionDeJuegos
 * 
 */
function ordenaJugadoresO ( $coleccionDeJuegos) {
    
    //Explicaciones de las funciones utilizadas: 
    /*Funcion predefinida: uasort --> Ordena un array con una función de comparación definida por el usuario y mantiene la asociación de índices, 
    devuelve true en caso de éxito o false en caso de error. Si dos miembros se comparan como iguales, su orden relativo en el array ordenado será indefinido. */
    /*Funcion predefinida: print_r --> Imprime información legible sobre una variable. Si se le da un valor string, int o float, 
    el valor en sí mismo será impreso. Si le dan un array, los valores serán presentados en un formato que muestra las claves y los elementos. */

    uasort($coleccionDeJuegos, 'cmp') ;
    print_r($coleccionDeJuegos) ;
}


/**
 * Esta funcion se va a utilizar para poder comparar los string de la funcion de arriba 
 * 'ordenaJugadoresO' y asi poder ordenar los elementos que contiene el array
 * @param array $a
 * @param array $b
 * @return INT 
 */
function cmp ($a, $b) {
    //INT $resultadoComparacion

    //Explicacion de la funcion utilizada:
    /* La funcion predefinida: strcmp --> Hace una comparación de string a nivel binario, esta comparación considera mayúsculas y minúsculas.
    Devuelve 0 si el 1° string es menor que el 2° string; 0 si el 1° string es mayor que el 2° string y 0 si son iguales. */

    $resultadoComparacion = strcmp($a ["jugadorO"], $b ["jugadorO"]) ;
    return $resultadoComparacion ;
}

/************ PARTE MILAGROS ************/


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$arrayGames = cargarJuegos();
//$arregloTateti = [];
//Proceso:

//$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);

// *********************** MENU ***************** //
do{
    $numeroMenu = seleccionarOpcion ();
    $opcion = $numeroMenu;
    switch ($opcion) {
        case 1:
            //jugar();
            $partida = jugar();
            imprimirResultado($partida);
            $arrayGames = agregarJuego($arrayGames, $partida);
            break;
        case 2:
            echo "Ingrese el número de partida que desea ver: ";
            $numeroPartida = trim(fgets(STDIN));
            mostrarJuego($arrayGames, $numeroPartida);
            break;
        case 3:
            echo "Ingrese el nombre del jugador que desea buscar: ";
            $jugador = strtoupper(trim(fgets(STDIN))); 
            $res = buscaPrimerVictoria($arrayGames,$jugador);
            echo $res."\n";
            if ($res > -1) {
                echo "**************************************** \n";
                echo "Juego TATETI: ". $res." (". $res+1 .")\n";
                echo "Jugador X: ". $arrayGames[$res]["jugadorX"]. " obtuvo ". $arrayGames[$res]["puntosX"]. " puntos.\n";
                echo "jugador O: ". $arrayGames[$res]["jugadorO"]. " obtuvo ". $arrayGames[$res]["puntosO"]. " puntos.\n";
                echo "**************************************** \n";
            } else {
                echo "El jugador ". $jugador. " no gano ningun juego";
            }
            
            break;
        case 4:
            //Mostrar porcentaje de Juegos ganados 
            $porcentajeJuegosGanados = porcentajeVictorias($arrayGames);
            echo "El porcentaje de victorias es ". $porcentajeJuegosGanados. "%";
            break;
        case 5:
            //Mostrar resumen de jugador
            echo "Ingrese el nombre del jugador: ";
            $nombreJugador = strtoupper(trim(fgets(STDIN))); 
            $resumen = resumenJugador($arrayGames, $nombreJugador);
            echo " *********************************** \n";
            echo " Jugador: " .$resumen["nombre"]."\n";
            echo " Gano: ".$resumen["juegosGanados"]." juegos\n";
            echo " Perdio: ".$resumen["juegosPerdidos"]." juegos\n";
            echo " Empato: ".$resumen["juegosEmpatados"]." juegos\n";
            echo " Total de puntos acumulados: ".$resumen["puntosAcumulados"]." puntos"."\n";
            echo " *********************************** \n";
            break;
        case 6:
            $odenDeO = ordenaJugadoresO($arrayGames);
            break;
        case 7:
<<<<<<< HEAD

            //Salir
            break;
    }
    echo "¿Desea volver a ver el menú? (si = 1/ no = 7 (salir).\n";

            echo "¡Gracias por jugar! \n";
            //Salir
            break;
    }
    echo "\n ¿Desea volver a ver el menú? (si = 1/ no = 7 (salir).";

    $opcion = trim(fgets(STDIN));
    if ($opcion = 7){
        echo "¡Gracias por jugar! :D";
    }
} while ($opcion != 7);
=======
            echo "Gracias por jugar!";
            break;
        }
        echo "¿Desea volver a ver el menú? (si = 1/ no = 7 (salir).\n";
        $opcion = trim(fgets(STDIN));
    }while ($opcion != 7);
>>>>>>> 77bf275435a3e92bcdc075593c4349bd972173f7


