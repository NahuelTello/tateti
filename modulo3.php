<?php
include_once("tateti.php");
include_once("modulos145.php");
include_once("modulo7.php");
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