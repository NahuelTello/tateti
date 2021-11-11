<?php 

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
        $simbolo = strtoupper(trim(fgets(STDIN))); //Esta funcion predefinida "strtoupper" te devuelve el string ingresado con todos los caracteres en mayuscula
        $simboloAux = "" ; //Lo inicilizo con "" ya que si ingresa un simbolo invalido va a tirar el cartel de 'variable indefinida'
        if (($simbolo == "X") || ($simbolo == "O")) {
            $simboloAux = $simbolo;
        }else {
            echo "El simbolo " . $simbolo . " no es correcto. Ingrese uno valido. \n" ;
        }
    } while ($simbolo <> $simboloAux);
    return $simbolo ;
}
$simboloFinal = seleccionarSimbolo() ; //Lo invoque para probar si funcionaba, Borrar despues



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
        
    }
}
