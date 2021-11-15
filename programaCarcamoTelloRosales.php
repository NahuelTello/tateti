<?php
include_once("tateti.php");
include_once("modulos145.php");
include_once("modulo7.php");
include_once("modulos2-3.php");
/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Tello Parra, Matias Nahuel. FAI 2904 . TUDW . matias.tello@est.fi.uncoma.edu.ar . NahuelTello*/
/* Cárcamo, Milagros Sofia - FAI 2987  - TUDW  - milagros.carcamo@est.fi.uncoma.edu.ar  - milicarcamo */




/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/








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
            cargarJuegos();
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
            /* $jugadorRes = resumenJugador(cargarJuegos(),$nombreJugador);
            print_r($jugadorRes); */
             echo " *********************************** \n";
                echo " Jugador: " . $nombreJugador;
                echo " Gano: ".$jugadorRes." juegos\n";
                echo " Perdio: ".$jugadorRes." juegos\n";
                echo " Total de puntos acumulados: ".$jugadorRes;
                echo " *********************************** \n";
            break;
        case 6:
            echo "6) Mostrar listado de juegos Ordenado por juegador O \n";
            //Lo hace mili
            break;
        case 7:
            echo "7) Salir \n";
            break;
    }
    $numeroMenu = seleccionarOpciones ();

} while ($opcion >= 1 && $opcion <= 7);