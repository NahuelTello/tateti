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
    6) Mostrar listado de juegos Ordenado por juegador O\n
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
    //
    //echo "Ingrese una opcion, entre 1 y 7: " ;
    $opcionValida = solicitarNumeroEntre($numMin, $numMax) ; //Invoco la funcion del programa "tateti" y me ahorro de hacer un if con la condicion de los rangos
    return $opcionValida ;
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
 * @param int $nroPartida
 */
function mostrarJuego ($historialJuegos){
    echo "Ingrese el número de partida que desea ver";
    $nroPartida = trim(fgets(STDIN));
    if ($historialJuegos[$nroPartida]["puntosX"] == $historialJuegos[$nroPartida]["puntosO"]){
        $resultado = "empate";
    }else if ($historialJuegos[$nroPartida]["puntosX"] < $historialJuegos[$nroPartida]["puntosO"]){
        $resultado = "ganó O";
    }else{
        $resultado = "ganó X";
    }
    echo "****************************************";
    echo "Juego TATETI: ". $nroPartida." (". $resultado. ")";
    echo "Jugador X: ". $historialJuegos[$nroPartida]["jugadorX"]. " obtuvo ". $historialJuegos[$nroPartida]["puntosX"]. " puntos.";
    echo "jugador O: ". $historialJuegos[$nroPartida]["jugadorO"]. " obtuvo ". $historialJuegos[$nroPartida]["puntosO"]. " puntos.";
    echo "****************************************";
}
/************ PARTE MARTINA ************/


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

//$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);



$numeroMenu = seleccionarOpciones ();
do {
    $opcion = $numeroMenu;

    
    switch ($opcion) {
        case 1:
            echo "1) Jugar al tateti \n";
            jugar();
            break;
        case 2:
            echo "2) Mostrar un juego \n";
            
            break;
        case 3:
            echo "3) Mostrar el primer juego ganador \n";
            echo "Ingrese el nombre del jugador a buscar: ";
            $namePlayer = trim(fgets(STDIN));
            $res = primerVictoria(cargarJuegos(),$namePlayer);
            if ($res == -1) {
                echo "El jugador ".$namePlayer." no gano ningun juego";
            } else {
                echo " *********************************** \n";
                echo " Juego TATETI: 2 (gano 0) \n";
                echo " Jugador X: ".$namePlayer." obtuvo ".$res." puntos\n";
                echo " Jugador O: ".$namePlayer." obtuvo ".$res." puntos\n";
                echo " *********************************** \n";
            }
            break;
        case 4:
            echo "4) Mostrar porcentaje de Juegos ganados \n";
            break;
        case 5:
            echo "5) Mostrar resumen de jugador \n";
            echo "Ingrese el nombre del jugador: ";
            $nombreJugador = trim(fgets(STDIN));
            $resumenJuego = resumenJugador($juegosTotales, $nombreJugador); //juegosTotales variable no definida, me hace falta sacar esa info
             echo " *********************************** \n";
                echo " Jugador: " . $resumenJuego["nameJugador"];
                echo " Gano: ".$resumenJuego["cantGanadas"]." juegos\n";
                echo " Perdio: ".$resumenJuego["cantPerdidas"]." juegos\n";
                echo " Total de puntos acumulados: ".$resumenJuego["totalPts"]." puntos"."\n";
                echo " *********************************** \n";
            break;
        case 6:
            echo "6) Mostrar listado de juegos Ordenado por juegador O \n";
            //Lo hace mili
            break;
        case 7:
            break;
    }
    $numeroMenu = seleccionarOpciones ();

} while ($opcion > 1 && $opcion < 7);