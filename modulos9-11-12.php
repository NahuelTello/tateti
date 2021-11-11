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


include_once("modulos145.php"); //Inclui el modulo que hizo Marti, asi lo puedo invocar mas abajo para probarlo. Cuando lo pasemos al programaApellidos lo borramos ya q no va a hacer falta
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
        if (($simbolo == "X") && ($coleccionJuegos[$i] ["puntosX"] > $coleccionJuegos[$i] ["puntosO"])){
            $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }elseif (($simbolo == "O") && ($coleccionJuegos[$i] ["puntosX"] < $coleccionJuegos[$i] ["puntosO"])) {
                $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }    
    }
    return $juegosGanadosSimbolo ;
}
//Estas 3 lineas de abajo las hice para probar el modulo, ¡¡¡BORRAR DESPUES!!!
$coleccJuegos = cargarJuegos() ; //Aca invoco al modulo que hizo Marti, para ver el historial de juegos
$juegosGanados = victoriasDeSimbolos($coleccJuegos, $simboloFinal ) ;
echo "La cant de victorias del simbolo ". $simboloFinal . " es: " . $juegosGanados ;

/**
 * Función 11 -> "Explicacion 3"
 * Implementar una función sin retorno que, dada una colección de juegos, 
 * muestre la colección de juegos ordenado por el nombre del jugador cuyo símbolo es O.
 * @param array $ coleccionDeJuegos
 */
function ordenaJugadoresO ( $coleccionDeJuegos) {
    
}