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
        //La funcion predefinida "strtoupper" que utilizamos abajo, devuelve el string ingresado con todos los caracteres en mayuscula
        $simbolo = strtoupper(trim(fgets(STDIN))); 
        $simboloAux = "" ; //Lo inicilizo con "" ya que si ingresa un simbolo invalido va a tirar el cartel de 'variable indefinida'
        if (($simbolo == "X") || ($simbolo == "O")) {
            $simboloAux = $simbolo;
        }else {
            echo "El simbolo " . $simbolo . " no es correcto. Ingrese uno valido. \n" ;
        }
    } while ($simbolo <> $simboloAux);
    return $simbolo ;
}
$simboloFinal = seleccionarSimbolo() ; //Lo invoque para probar si funcionaba, ¡¡¡BORRAR DESPUES!!!


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
        if (($simbolo == "X") && ($coleccionJuegos[$i] ["puntosX"]  >  $coleccionJuegos[$i] ["puntosO"])){
            $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }elseif (($simbolo == "O") && ($coleccionJuegos[$i] ["puntosX"]  <  $coleccionJuegos[$i] ["puntosO"])) {
                $juegosGanadosSimbolo = $juegosGanadosSimbolo + 1;
        }    
    }
    return $juegosGanadosSimbolo ;
}
//Estas 3 lineas de abajo las hice para probar el modulo, ¡¡¡BORRAR DESPUES!!!
$coleccJuegos = cargarJuegos() ; //Aca invoco al modulo que hizo Marti, para ver el historial de juegos
$juegosGanados = victoriasDeSimbolos($coleccJuegos, $simboloFinal ) ;
echo "La cant de victorias del simbolo ". $simboloFinal . " es: " . $juegosGanados . "\n" ;

/**
 * Función 11 -> "Explicacion 3"
 * Implementar una función SIN RETORNO que, dada una colección de juegos, 
 * muestre la colección de juegos ordenado por el nombre del jugador cuyo símbolo es O.
 * @param array $coleccionDeJuegos
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

$odenDeO = ordenaJugadoresO(cargarJuegos()) ; //Lo invoque de esta manera para ver como lo imprimia por pantalla. ¡¡¡DESPUES BORRAR!!!

//Creo que funciona bien, Si hay algun error deberia saltar cuando lo invoquemos desde el programa principals