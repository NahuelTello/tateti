<?php

include_once("tateti.php");

/**
 * Muestra las opciones del menú de pantalla, donde se le solicita al usuario
 * una opcion valida y retorne el numero de la opcion. La ultima opcion del 
 * menu debe ser "Salir"
 * @param no tiene
 * @return int
 */
function menu(){ //Ingresamos la opcion del menu
    echo "Menú de opciones\n
    1) Jugar al tateti \n
    2) Mostrar un juego \n
    3) Mostrar el primer juego ganador \n
    4) Mostrar porcentaje de Juegos ganados \n
    5) Mostrar resumen de jugador \n
    6) Mostrar listado de juegos Ordenado por juegador O\n
    7) Salir \n";
    echo "Ingrese una opcion: ";
    $opcion = trim(fgets(STDIN));
    return $opcion;
}
/**
 * Selecciona la opcion del menu
 * 
 * @param int $opcionMenu
 * @return int
 */

function seleccionarOpcion($opcionMenu){
    switch ($opcionMenu) {
        case 1:
            echo "1) Jugar al tateti \n";
            echo "Opcion seleccionada ".$opcionMenu ."\n";
            /**
             * 1) Jugar al tateti: se inicia un juego de tateti solicitando los nombres de los jugadores. 
             * Luego de finalizar, los datos del juego deben ser guardados en una estructura de datos de juegos 
             * (ver la sección EXPLICACION 2, de Estructura de datos del presente enunciado)
             */
            break;
        case 2:
            echo "2) Mostrar un juego \n";
            echo "Opcion seleccionada ".$opcionMenu ."\n";
            /**
             * 2) Mostrar un Juego: Se le solicita al usuario un número de juego y se muestra en pantalla con el siguiente formato:
             * Juego TATETI: <numero> (<empate| gano X | gano 0>)
             * Jugador X: <nombre> obtuvo <puntaje> puntos
             * Jugador 0: <nombre> obtuvo <puntaje> puntos
             * Si el número de juego no existe, el programa deberá indicar el error y volver a pedir un número de juego válido.
             */
            break;
        case 3:
            echo "3) Mostrar el primer juego ganador \n";
            /**
             * Mostrar el primer juego ganador: Se le solicita al usuario un nombre de jugador y se muestra en pantalla el primer juego ganado por dicho jugador. Por ejemplo si el usuario ingresa el nombre “Majo”
             * En caso que el jugador no ganó ningún juego, se debe indicar: “El jugador Majo no ganó ningún juego”.
             */
            break;
        case 4:
            echo "4) Mostrar porcentaje de Juegos ganados \n";
            /**
             * 4) Mostrar porcentaje de Juegos ganados: Se le solicita al usuario que elija uno de los símbolos (X o O), y se muestra qué porcentaje de todos los juegos ganados, el ganador es el símbolo elegido por el usuario.
             * Ejemplo: En total se jugaron 56 juegos de tatetí, de los cuales 16 son empates y 40 son juegos ganados (29 son ganados por X y 11 son ganados por O). Si el usuario elige el símbolo O, entonces el programa debe mostrar que O ganó el 27.50% de los juegos ganados
             */
            break;
        case 5:
            echo "5) Mostrar resumen de jugador \n";
            /**Mostrar resumen de Jugador: Se le solicita al usuario un nombre de jugador y se muestra en pantalla un resumen de los juegos ganados, los juegos perdidos, empates y acumulado de puntos. */
            break;
        case 6:
            echo "6) Mostrar listado de juegos Ordenado por juegador O \n";
            /**Mostrar listado de juegos Ordenado por jugador O: Se mostrará en pantalla la estructura ordenada alfabéticamente por jugador 0, utilizando la función predefinida uasort de php, y la función predefinida print_r. 
             * (En el código fuente documentar qué hace cada una de estas funciones predefinidas de php, utilizar el manual php.net). (Este es el único menú de opciones que debe utilizar la función print_r parar mostrar la estructura de datos) */
            break;
        case 7:
            echo "7) Salir \n";
            /**Sale del programa */
            break;
        default:
            echo "-------------------------------------------\n";
            echo "Opcion incorrecta! Intentalo nuevamente :) \n";
            echo "-------------------------------------------\n";
            break;
        }
        return $opcionMenu ;
    }
    

/**
 * Solicita al usuario un numero entre un rango de valores. Si el numero ingresado
 * no es valido, la funcion se encarga de volver a pedirlo. Retorna un numero valido.
 * 
 * @param int $numeroValidar
 * @return int 
 */

function validarOpcion($numeroValidar){
    $num = $numeroValidar;
    $res = false;
    do {
        if (($num >= 1) && ($num <= 7)) {
            $res = true;
        } else {
            $num = seleccionarOpcion(menu());
            $res = false;
        }
    } while ($res == true);
    /* echo "validado: ".$num; */
    return $num;
}
/* PRINCIPAL */
$opcionSeleccionada = seleccionarOpcion(menu());
validarOpcion($opcionSeleccionada);