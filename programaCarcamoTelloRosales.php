<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Tello Parra, Matias Nahuel. FAI 2904 . TUDW . matias.tello@est.fi.uncoma.edu.ar . NahuelTello*/
/* Cárcamo, Milagros Sofia - FAI 2987  - TUDW  - milagros.carcamo@est.fi.uncoma.edu.ar  - milicarcamo */




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
function seleccionarOpciones() { //Ingresamos la opcion del menu.... Debe llamarse seleccionarOpcion, le puse opciones xq me invoca al otro
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
 * Dada una colección de juegos y el nombre de un jugador, retorna el indice del primer juego ganado por dicho jugador.
 * Si el jugador no gano ningun juego, la funcion debe retornar el valor -1.
 * 
 * @param array $historialJuegos
 * @return nada
 */

function primerVictoria($historialJuegos, $nombreJugadorBuscado){
    /* int $i, $primerJuegoGanado*/
    /* boolean $encontrado */

    $primerJuegoGanado = -1;
    $i=0;
    $encontrado = true;
    while (($i < count($historialJuegos)) && $encontrado) {
        if (($historialJuegos[$i]["jugadorX"] == $nombreJugadorBuscado) || ($historialJuegos[$i]["jugadorO"] == $nombreJugadorBuscado)){
            if ($historialJuegos[$i]["puntosX"] > $historialJuegos[$i]["puntosO"]) {
                $primerJuegoGanado = $i;
                $res = "gano";
                $encontrado = false;

                echo "**************************************** \n";
                echo "Juego TATETI: ". $primerJuegoGanado." (". $res.")\n";
                echo "Jugador X: ". $historialJuegos[$i]["jugadorX"]. " obtuvo ". $historialJuegos[$i]["puntosX"]. " puntos.\n";
                echo "jugador O: ". $historialJuegos[$i]["jugadorO"]. " obtuvo ". $historialJuegos[$i]["puntosO"]. " puntos.\n";
                echo "**************************************** \n";
            }
        } elseif ($historialJuegos[$i]["puntosO"] > $historialJuegos[$i]["puntosX"]) {
            $primerJuegoGanado = $i;
            $encontrado = false;
            $res = "gano";
            
            echo "**************************************** \n";
            echo "Juego TATETI: ". $i." (". $res. ") \n";
            echo "Jugador X: ". $historialJuegos[$i]["jugadorX"]. " obtuvo ". $historialJuegos[$i]["puntosX"]. " puntos.\n";
            echo "jugador O: ". $historialJuegos[$i]["jugadorO"]. " obtuvo ". $historialJuegos[$i]["puntosO"]. " puntos.\n";
            echo "**************************************** \n";
        } else {
            echo "El jugador ".$nombreJugadorBuscado." no gano ningun juego \n";
            $encontrado = true;
        }
        $i++;
    }
    
    
    
}

/**
 * Implementar una función que dada la colección de juegos y el nombre de un jugador, retorne el resumen del jugador.
 */

/**
 * Dada una coleccion de juegos y el nombre del jugador
 * retorna el resumen del jugador
 * 
 * @param array $historialJuegos
 * @param Strgin $nombreJugador
 * @return no retorna
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
    
    echo " *********************************** \n";
    echo " Jugador: " .$resJugador["nombre"]."\n";
    echo " Gano: ".$resJugador["juegosGanados"]." juegos\n";
    echo " Perdio: ".$resJugador["juegosPerdidos"]." juegos\n";
    echo " Empato: ".$resJugador["juegosEmpatados"]." juegos\n";
    echo " Total de puntos acumulados: ".$resJugador["puntosAcumulados"]." puntos"."\n";
    echo " *********************************** \n";
    
}

/************ PARTE NAHUEL ************/

/************ PARTE MARTINA ************/
/**
 *  Historial precargado de partidas de tateti
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
    return $juegosPrecargados;
}

/**
 * Agrega la última partida al historial de juegos de tateti
 * @param array $juego
 * @param array $historialJuegos
 * @return array
 */
function agregarJuego ($historialJuegos, $juego){
    //string $jugadorX, $jugadorO
    //int $puntosX, $puntosO, $nroIndice
    array_push($historialJuegos, $juego);
    return $historialJuegos;
}

/**
 * muestra los datos de determinada partida de tateti.
 * @param array $historialJuegos //Seria historialJuegos
 */
function mostrarJuego($historialJuegos){
    echo "Ingrese el número de partida que desea ver: ";
    $nroPartida = trim(fgets(STDIN));
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
/* $simboloFinal = seleccionarSimbolo() ; //Lo invoque para probar si funcionaba, ¡¡¡BORRAR DESPUES!!! */


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
//Estas 3 lineas de abajo las hice para probar el modulo, ¡¡¡BORRAR DESPUES!!!
//$coleccJuegos = cargarJuegos() ; //Aca invoco al modulo que hizo Marti, para ver el historial de juegos
/* $juegosGanados = victoriasDeSimbolos($coleccJuegos, $simboloFinal ) ;
echo "La cant de victorias del simbolo ". $simboloFinal . " es: " . $juegosGanados . "\n" ; */

/**
 * Función 11 -> "Explicacion 3"
 * Implementar una función SIN RETORNO que, dada una colección de juegos, 
 * muestre la colección de juegos ordenado por el nombre del jugador cuyo símbolo es O.
 * @param array $coleccionDeJuegos
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

//$arregloTateti = [];
//Proceso:

//$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);

// *********************** MENU ***************** //
/* $numeroMenu = seleccionarOpciones (); */
do {
    $numeroMenu = seleccionarOpciones ();
    $opcion = $numeroMenu;
    switch ($opcion) {
        case 1:
            jugar();
            break;
        case 2:
            $coleccion = cargarJuegos();
            mostrarJuego($coleccion);
            break;
        case 3:
            echo "Ingrese el nombre del jugador que desea buscar: ";
            $jugador = trim(fgets(STDIN));
            $coleccionDeJuegos = cargarJuegos();
            primerVictoria($coleccionDeJuegos,$jugador);
            break;
        case 4:
            //echo "4) Mostrar porcentaje de Juegos ganados \n";
            break;
        case 5:
            //echo "5) Mostrar resumen de jugador \n";
            echo "Ingrese el nombre del jugador: ";
            $nombreJugador = trim(fgets(STDIN));
            $coleccionDeJuegos = cargarJuegos();
            resumenJugador($coleccionDeJuegos, $nombreJugador);
            break;
        case 6:
            $odenDeO = ordenaJugadoresO(cargarJuegos());
            break;
        case 7:
            //Salir
            break;
    }
} while ($opcion != 7);


