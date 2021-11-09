<?php
/**
 * Muestra las opciones del menú de pantalla, donde se le solicita al usuario
 * una opcion valida y retorne el numero de la opcion. La ultima opcion del 
 * menu debe ser "Salir"
 * 
 * @param no tiene
 * @return int
 */

function seleccionarOpcion(){
    echo "***** Menú de opciones ***** \n
    1) Jugar al tateti \n
    2) Mostrar un juego \n
    3) Mostrar el primer juego ganador \n
    4) Mostrar porcentaje de Juegos ganados \n
    5) Mostrar resumen de jugador \n
    6) Mostrar listado de juegos Ordenado por juegador O\n
    7) Salir \n";
    echo "Ingrese una opcion: ";
    $opcion = trim(fgets(STDIN));
    $opcionValidada = validarOpcion($opcion);
    switch ($opcionValidada) {
        case 1:
            echo "1) Jugar al tateti \n";
            break;
        case 2:
            echo "2) Mostrar un juego \n";
            break;
        case 3:
            echo "3) Mostrar el primer juego ganador \n";
            break;
        case 4:
            echo "4) Mostrar porcentaje de Juegos ganados \n";
            break;
        case 5:
            echo "5) Mostrar resumen de jugador \n";
            break;
        case 6:
            echo "6) Mostrar listado de juegos Ordenado por juegador O \n";
            break;
        case 7:
            echo "7) Salir \n";
            break;
        }
        return $opcionValidada;
    }
    
    

/**
 * Solicita al usuario un numero entre un rango de valores. Si el numero ingresado
 * no es valido, la funcion se encarga de volver a pedirlo. Retorna un numero valido.
 * 
 * @param int $opcionValidar
 * @return int 
 */

function validarOpcion($opcionValidar){
    
    
    
}

seleccionarOpcion();