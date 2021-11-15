<?php
include_once("modulos145.php");
/**
 * Dada una colección de juegos y el nombre de un jugador, retorna el indice del primer juego ganado por dicho jugador.
 * Si el jugador no gano ningun juego, la funcion debe retornar el valor -1.
 * 
 * @param array $coleccionJuegosBuscados
 * @param String $nombreJugadorBuscado
 * @return int
 */

function primerVictoria($coleccionJuegosBuscados,$nombreJugadorBuscado){
    /* int $i, $primerJuegoGanado, $longArreglo*/
    /* boolean $juegoEncontrado */

    $primerJuegoGanado = -1;
    $juegoEncontrado = true;
    $longArreglo = count($coleccionJuegosBuscados);
    $i=0;
    while ($juegoEncontrado && ($i < $longArreglo)) {
        if ($coleccionJuegosBuscados[$i]["jugadorX"]==$nombreJugadorBuscado) {
            if ($coleccionJuegosBuscados[$i]["puntosX"] > $coleccionJuegosBuscados[$i]["puntosO"]) {
                $primerJuegoGanado = $i;
                $juegoEncontrado = false;
            }
        } elseif ($coleccionJuegosBuscados[$i]["jugadorO"] == $nombreJugadorBuscado) {
            if ($coleccionJuegosBuscados[$i]["puntosO"] > $coleccionJuegosBuscados[$i]["puntosX"]) {
                $primerJuegoGanado = $i;
                $juegoEncontrado = false;
            }
        } /* else {
            $primerJuegoGanado = -1;
        } */
        $i++;
    }

    return $primerJuegoGanado;
}

//PRINCIPAL PRUEBA

