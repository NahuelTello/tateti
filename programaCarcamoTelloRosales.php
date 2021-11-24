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

/************ PARTE TELLO ************/
/**
 * funcion 2 <-- Explicacion 3
 * Muestra las opciones del menú de pantalla, donde se le solicita al usuario
 * una opcion valida y retorne el numero de la opcion. La ultima opcion del 
 * menu debe ser "Salir"
 * @return int
 */
function seleccionarOpcion() { 
    //int $opcion 
    echo "\n  Menú de opciones \n
    1) Jugar al tateti \n
    2) Mostrar un juego \n
    3) Mostrar el primer juego ganador \n
    4) Mostrar porcentaje de Juegos ganados \n
    5) Mostrar resumen de jugador \n
    6) Mostrar listado de juegos Ordenado por jugador O\n
    7) Salir \n";
    echo "Ingrese una opcion entre 1 y 7: " ;
    $opcion = validarOpcion(1, 7); 
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
    $opcionValida = solicitarNumeroEntre($numMin, $numMax) ; 
    //Invoco la funcion del programa "tateti" y me ahorro de hacer un if con la condicion de los rangos
    return $opcionValida ;
}

/**
 * Busca la primer victoria de un jugador ingresado por el usuario
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
    //Se utiliza un recorrido parcial, que se corta cuando se encuentra una partida ganada por el jugador seleccionado.
    while (($i < $cantPartidas) && ($corte)){
        //Se averigua si el jugador utilizó la X.
        if ($jugadorBuscado == $historialJuegos[$i]["jugadorX"]) {
            if ($historialJuegos[$i]["puntosX"] > $historialJuegos[$i]["puntosO"]) {
                //Se encontró la victoria, entonces se almacena el índice de la partida en la variable $indice
                $indice = $i;
                $corte = false;
            } else {
                //No se halló una victoria, así que se le suma 1 al contador $i y la repetitiva continúa
                $i++;
            }
            //Se averigua si el jugador utilizó el O.
        } elseif ($jugadorBuscado == $historialJuegos[$i]["jugadorO"]) {
            if ($historialJuegos[$i]["puntosO"] > $historialJuegos[$i]["puntosX"]) {
                //Se encontró la victoria, entonces se almacena el índice de la partida en la variable $indice
                $indice = $i;
                $corte = false;
            }else{
                //No se halló una victoria, así que se le suma 1 al contador $i y la repetitiva continúa
                $i++;
            }
        }else {
            //No se halló al jugador en esta partida, por lo tanto se le suma 1 al contador $i y la repetitiva sigue
        $i++;
        }
    }
    //Se retorna la variable con un índice de una partida, o con el valor -1 en caso de no haberse encontrado ninguna victoria.
    return $indice;
}

/**
 * Dada una coleccion de juegos y el nombre del jugador
 * retorna el resumen del jugador
 * 
 * @param array $historialJuegos
 * @param String $nombreJugador
 * @return array
 */
function resumenJugador ($historialJuegos, $nombreJugador){
    //int $juegosGanados, $juegosPerdidos, $juegosEmpatados, $puntosAcumulados
    // array $resJugador coleccion asociativa
    $juegosGanados = 0;
    $juegosPerdidos = 0;
    $juegosEmpatados = 0;
    $puntosAcumulados = 0;
    //Se utiliza un recorrido exhaustivo para encontrar cada partida en la que el jugador seleccionado participó
    foreach ($historialJuegos as $indice => $elemento) {
        //Se verifica si el jugador utilizó la X
        if ($historialJuegos[$indice]["jugadorX"] == $nombreJugador){
            //Según el resultado de la partida, se le suma cierta cantidad de puntos.
            if  ($historialJuegos[$indice]["puntosX"] > $historialJuegos[$indice]["puntosO"] ){
                 //Victoria del jugador X
                $juegosGanados = $juegosGanados + 1;
                $puntosAcumulados = $puntosAcumulados + $historialJuegos [$indice]["puntosX"];
            } elseif (( $historialJuegos[$indice]["puntosX"] < $historialJuegos[$indice]["puntosO"] ) ) {
                //Derrota del jugador X
                $juegosPerdidos = $juegosPerdidos + 1;
                $puntosAcumulados = $puntosAcumulados; 
            } else {
                //Empate
                $juegosEmpatados = $juegosEmpatados + 1;
                $puntosAcumulados = $puntosAcumulados + 1;
            }
            //Si el jugador no eligió la X, entonces usó el O
        }elseif ($historialJuegos[$indice]["jugadorO"] == $nombreJugador){
            if ( ( $historialJuegos[$indice]["puntosO"] > $historialJuegos[$indice]["puntosX"] ) ) {
                //Victoria de O
                $juegosGanados = $juegosGanados + 1;
                $puntosAcumulados = $puntosAcumulados + $historialJuegos [$indice]["puntosO"];
            } elseif (( $historialJuegos[$indice]["puntosO"] < $historialJuegos[$indice]["puntosX"] ) ) {
                //Derrota de O
                $juegosPerdidos = $juegosPerdidos + 1;
                $puntosAcumulados = $puntosAcumulados; 
            } else {
                //Empate
                $juegosEmpatados = $juegosEmpatados + 1;
                $puntosAcumulados = $puntosAcumulados + 1;
            }
        }
    }
    //Se arma el arreglo con la información de las partidas jugadas por el jugador seleccionado.
    $resJugador = [
        "nombre" => $nombreJugador,
        "juegosGanados" => $juegosGanados,
        "juegosPerdidos" => $juegosPerdidos,
        "juegosEmpatados" => $juegosEmpatados,
        "puntosAcumulados" => $puntosAcumulados
    ];
    //Se retorna dicho arreglo
    return $resJugador;
    
}

/************ PARTE TELLO ************/

/************ PARTE ROSALES ************/
/**
 * Función 1 <-- Explicación 3
 *  Historial precargado de partidas de tateti.
 * Los datos de las partidas inventadas se almacenaron en un arreglo multidimensional indexado,
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
    $juegosPrecargados [9] = ["jugadorX" => "ANTO", "jugadorO" => "GALA", "puntosX" => 0, "puntosO" => 2];
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
    //Se utiliza la función count para conseguir el número de elementos almacenados en el arreglo $historialJuegos
    $nro =  count($historialJuegos);
    //Dicho número se utiliza para agregar un arreglo más al arreglo multidimensional $historialJuegos 
    $historialJuegos[$nro]["jugadorX"] = $juego ["jugadorCruz"];
    $historialJuegos[$nro]["jugadorO"] = $juego ["jugadorCirculo"]; 
    $historialJuegos[$nro]["puntosX"] = $juego ["puntosCruz"]; 
    $historialJuegos[$nro]["puntosO"] = $juego ["puntosCirculo"];
    return $historialJuegos;
}

/**
 * Función 4 <-- Explicación 3
 * muestra los datos de determinada partida de tateti.
 * @param int $nroPartida
 * @param array $historialJuegos 
 */
function mostrarJuego($historialJuegos, $numero){
    // STRING $resultado
        // mediante una alternativa se averigua si ganó X, ganó O, o fue empate.
        if ($historialJuegos[$numero]["puntosX"] == $historialJuegos[$numero]["puntosO"]){
            $resultado = "empate";
        }else if ($historialJuegos[$numero]["puntosX"] < $historialJuegos[$numero]["puntosO"]){
            $resultado = "ganó O";
        }else{
            $resultado = "ganó X";
        }
        // se imprimen en pantalla los datos de la partida ingresada por el usuario
        echo "**************************************** \n";
        echo "Juego TATETI: ". ($numero + 1)." (". $resultado. ") \n";
        echo "Jugador X: ". $historialJuegos[$numero]["jugadorX"]. " obtuvo ". $historialJuegos[$numero]["puntosX"]. " puntos.\n";
        echo "jugador O: ". $historialJuegos[$numero]["jugadorO"]. " obtuvo ". $historialJuegos[$numero]["puntosO"]. " puntos.\n";
        echo "**************************************** \n";
}


/** 
 * Función agregada, se usa en la opción 4 del menú.
 * Calcula el porcentaje de victorias de un símbolo ingresado por el usuario
 * respecto al total de partidas jugadas.
 * @param array $historialJuegos
 * @param string $simbolo
 * @return float
 */
function porcentajeVictorias($historialJuegos, $simbolo){ 
    // INT $victoriasSimbolo $victoriasTotales FLOAT $porcentaje
    //Se invoca a la función que contea las victorias por símbolo, y luego a la que contea las victorias totales.
    $victoriasSimbolo = victoriasDeSimbolos($historialJuegos, $simbolo);
    $victoriasTotales = cantidadVictorias($historialJuegos) ;
    $porcentaje = ($victoriasSimbolo*100) / ($victoriasTotales);
    return $porcentaje;
}

/**
 * Función 9 <-- Explicación 3
 * Contea la cantidad de veces que se ganó una partida
 * respecto al total de partidas de tateti jugadas.
 * @param array $historialJuegos
 * @return int
 */
function cantidadVictorias ($historialJuegos){
    //INT $victorias
    $victorias = 0;
// Se utiliza una repetitiva foreach para realizar un recorrido exhaustivo en el arreglo
    foreach ($historialJuegos as $indice => $elemento) {
        if ($historialJuegos [$indice]["puntosX"]  == $historialJuegos [$indice]["puntosO"]){
            //Si el número almacenado en "puntosX" es igual al número en "puntosO", entonces es empate, no se suman victorias
            $victorias = $victorias;
        } else {
            //Caso contrario, se suma una victoria al contador.
            $victorias ++ ;
        }
    }
    return $victorias;
}

/************ PARTE ROSALES ************/

/************ PARTE CÁRCAMO ************/

/**
 * Funcion del inciso 8 --> "Explicacion 3"
 * Solicita al usuario un símbolo X o O y retorna el símbolo elegido.
 * La función debe validar el datos ingresado por el usuario (Utilice funciones predefinidas de string).
 * @return STRING
 */
function seleccionarSimbolo () {
    //STRING $simbolo, $simboloAux
    do {
        
        //La funcion predefinida "strtoupper" que utilizamos abajo, devuelve el string ingresado con todos los caracteres en mayuscula
        $simbolo = strtoupper(trim(fgets(STDIN))); 
        $simboloAux = "" ; //Lo inicializo con "" ya que si ingresa un simbolo invalido va a tirar el cartel de 'variable indefinida'
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

/************ PARTE CÁRCAMO ************/


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/** 
 * array $arregloPartidas, $partida, $resumen
 * int $opcion, $numeroPartida, $numVictoria, $cantidadPartidas
 * float $porcentajeJuegosGanados
 * String $jugador, $nombreJugador, $simbolo
 * array $arregloPartidas, $partida, $resumen, $odenDeO
 * int $numeroOpcion, $opcion, $numeroPartida, $numVictoria, $cantidadPartidas, $rangoMaximo
 * float $porcentajeJuegosGanados
 * String $jugador, $nombreJugador, $simbolo, $nombreJugador,

*/

//Inicialización del arreglo con el historial de partidas:
$arregloPartidas = cargarJuegos();
//Proceso:

// *********************** MENU ***************** //
//Se utiliza una repetitiva indefinida interactiva, que realiza un ciclo como mínimo
do{
    //Se invoca a la función que imprime el menú de opciones en pantalla.
    $opcion = seleccionarOpcion ();
    $cantidadPartidas = count ($arregloPartidas);
    switch ($opcion) {
        case 1:
            //Opción jugar: se imprime el número de la partida en pantalla y se invoca a la función que ejecuta el juego del tateti
            echo "PARTIDA NUMERO ". ($cantidadPartidas + 1)."\n";
            $partida = jugar();
            //Se invoca la función que imprime en pantalla el resultado de la partida 
            imprimirResultado($partida);
            //Se cargan los datos de la nueva partida al historial del juego
            $arregloPartidas = agregarJuego($arregloPartidas, $partida);
            print_r($arregloPartidas); //para ver si se carga la partida, despues BORRAR

            break;
        case 2:
            //Mostrar un juego.
            echo "Ingrese el número de partida que desea ver: \n";
            $numeroPartida = trim(fgets(STDIN));
            //Se verifica que la partida exista
            if ($numeroPartida > 0 && $numeroPartida <= $cantidadPartidas){
                //y se invoca a la función que imprime en pantalla los datos de la partida seleccionada.
                mostrarJuego($arregloPartidas, $numeroPartida-1);
            }else{
                echo "Esa partida no existe. \n";
            }
            break;
        case 3:
            //Mostrar el primer juego ganador.
            echo "Ingrese el nombre del jugador que desea buscar: \n";
            //Se transforma el string a mayúsculas y se invoca la función que busca la primer victoria del jugador seleccionado
            $jugador = strtoupper(trim(fgets(STDIN)));
            $numVictoria = buscaPrimerVictoria($arregloPartidas,$jugador);
            //Según el retorno de la función utilizada
            if ($numVictoria > -1) {
                //Se encontró una victoria y se retornó un índice perteneciente al array $arregloPartidas
                mostrarJuego($arregloPartidas, $numVictoria);
            } else {
                //No se encontró ningunca victoria y se retornó un -1
                echo "El jugador ". $jugador. " no gano ningun juego.\n";
            }
            
            break;
        case 4:
            //Mostrar porcentaje de Juegos ganados según símbolo
            echo "Ingrese el símbolo (X / O), cuyo porcentaje de victorias desea calcular: \n";
            //Se invoca una función que verifica la validez del símbolo ingresado y convierte a mayúscula el string
            $simbolo = seleccionarSimbolo() ;
            //Se invoca a la función que calcula el porcentaje de victorias del símbolo seleccionado respecto a las victorias totales
            $porcentajeJuegosGanados = porcentajeVictorias($arregloPartidas, $simbolo);
            echo "El porcentaje de victorias del simbolo ". $simbolo . " es ". $porcentajeJuegosGanados. "%\n";
            break;
        case 5:
            //Mostrar resumen de jugador
            echo "Ingrese el nombre del jugador: \n";
            //Se convierte a mayúsculas el string
            $nombreJugador = strtoupper(trim(fgets(STDIN))); 
            //Se invoca a la función que selecciona y almacena los datos del jugador seleccionado 
            $resumen = resumenJugador($arregloPartidas, $nombreJugador);
            //Se imprimen en pantalla los datos almacenados en el arreglo retornado por la función
            echo " *********************************** \n";
            echo " Jugador: " .$resumen["nombre"]."\n";
            echo " Gano: ".$resumen["juegosGanados"]." juegos\n";
            echo " Perdio: ".$resumen["juegosPerdidos"]." juegos\n";
            echo " Empato: ".$resumen["juegosEmpatados"]." juegos\n";
            echo " Total de puntos acumulados: ".$resumen["puntosAcumulados"]." puntos"."\n";
            echo " *********************************** \n";
            break;
        case 6:
            // Mostrar listado de juegos Ordenado por jugador.
            //Se invoca una función que ordena alfabéticamente las partidas respecto a los jugadores que utilizaron el O
            //y se imprime en pantalla el arreglo reorganizado.
            ordenaJugadoresO($arregloPartidas);
            break; 
        }
        if ($opcion <> 7){
            //Se verifica si se desea continuar
        echo "¿Desea volver a ver el menú? (presione ENTER para continuar, presione 7 para salir)\n"; 
        $opcion = trim(fgets(STDIN));
        }
        //La condición de corte es 7: Salir.
    }while ($opcion != 7);
    echo "Gracias por jugar! \n";
    echo "---------------------------------------------------------------------------------- \n";
    //Fin del programa


