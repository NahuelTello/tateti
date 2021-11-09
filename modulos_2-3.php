<?php
/**
 * Muestra las opciones del menú de pantalla, donde se le solicita al usuario
 * una opcion valida y retorne el numero de la opcion. La ultima opcion del 
 * menu debe ser "Salir"
 * 
 * @param int $opcion
 * @return int
 */

function seleccionarOpcion($opcion){
    echo "***** Menú de opciones ***** \n
    1) Jugar al tateti \n
    2) Mostrar un juego \n
    3) Mostrar el primer juego ganador \n
    4) Mostrar porcentaje de Juegos ganados \n
    5) Mostrar resumen de jugador \n
    6) Mostrar listado de juegos Ordenado por juegador O\n
    7) Salir \n";
    switch ($opcion) {
        case 1:
            echo "1) Jugar al tateti \n";
            break;
        case 2:
            echo "2) Mostrar un juego \n";# code...
            break;
        case 3:
            echo "3) Mostrar el primer juego ganador \n";
            # code...
            break;
        case 4:
            echo "4) Mostrar porcentaje de Juegos ganados \n";
            # code...
            break;
        case 5:
            echo "5) Mostrar resumen de jugador \n";
            # code...
            break;
        case 6:
            echo "6) Mostrar listado de juegos Ordenado por juegador O \n";
            # code...
            break;
        case 7:
            echo "7) Salir \n";
            # code...
            break;
    }
    return $opcion;
}

/**
 * Solicita al usuario un numero entre un rango de valores. Si el numero ingresado
 * no es valido, la funcion se encarga de volver a pedirlo. Retorna un numero valido.
 * 
 * @param int $opcionValidar
 * @return int 
 */

function validarOpcion($opcionValidar){
    echo "Ingrese una opcion: ";
    $opcionValidar = trim(fgets(STDIN));
    if (($opcionValidar >= 1)&& ($opcionValidar < 7)) {
        $numeroValido = 0;
        do{
            seleccionarOpcion($opcionValidar);
            echo "Desea ingresar nuevamente? ";
            $respuesta = trim(fgets(STDIN));
        } while ($respuesta == "si");
        $numeroValido = $opcionValidar;
    }
    return $numeroValido;
}



