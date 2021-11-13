<?php

include_once("tateti.php");
include_once("modulos145.php");
include_once("modulo7.php");
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
    $opcion = validarOpcion(1, 7) ; //Puedo poner como parametros formales directamente los numeros entre el rango que me pide?? 
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

/**
 * Inicia el menu una vez v
 * alidado la opcion
 * @param int $opcionMenu - Opcion del menu validada
 * @return void
 */
/* function iniciarMenu($opcionMenu){
} */

/* $numeroMenu = seleccionarOpciones ();
iniciarMenu($numeroMenu); */ // Lo invoco para probar si anda, Despues BORRAR!!!

/* Bien pensado Mili!! */