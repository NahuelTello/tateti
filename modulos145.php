<?php
include_once ("tateti.php");
/**
 *  Historial precargado de partidas de tateti
 * @return array 
 */
function cargarJuegos ()
{
    $juegosPrecargados [0] = ["jugadorX" => "TOMI", "jugadorO" => "JUAN", "puntosX" => 5, "puntosO" => 0];
    $juegosPrecargados [1] = ["jugadorX" => "JUAN", "jugadorO" => "ANTO", "puntosX" => 1, "puntosO" => 1];
    $juegosPrecargados [2] = ["jugadorX" => "GONZI", "jugadorO" => "DEDU", "puntosX" => 0, "puntosO" => 4];
    $juegosPrecargados [3] = ["jugadorX" => "GALA", "jugadorO" => "NICO", "puntosX" => 0, "puntosO" => 5];
    $juegosPrecargados [4] = ["jugadorX" => "NICO", "jugadorO" => "TOMI", "puntosX" => 1, "puntosO" => 1];
    $juegosPrecargados [5] = ["jugadorX" => "MARI", "jugadorO" => "ALEJO", "puntosX" => 3, "puntosO" => 0];
    $juegosPrecargados [6] = ["jugadorX" => "ALEJO", "jugadorO" => "MARI", "puntosX" => 1, "puntosO" => 1];
    $juegosPrecargados [7] = ["jugadorX" => "FINN", "jugadorO" => "FACU", "puntosX" => 4, "puntosO" => 0];
    $juegosPrecargados [8] = ["jugadorX" => "FACU", "jugadorO" => "GONZI", "puntosX" => 1, "puntosO" => 1];
    $juegosPrecargados [9] = ["jugadorX" => "ANTO", "jugadorO" => "GALA", "puntosX" => 2, "puntosO" => 0];
    return $juegosPrecargados;
}

/**
 * Agrega la última partida al historial de juegos de tateti
 * @param array $juego
 * @param array $historialJuegos
 * @return array
 */

 
function agregarJuego ($historialJuegos, $juego)
//string $jugadorX, $jugadorO
//int $puntosX, $puntosO, $nroIndice
{
   array_push($historialJuegos, $juego);
   return $historialJuegos;
}



/**
 * muestra los datos de determinada partida de tateti.
 * @param int $nroPartida
 */
function mostrarJuego ($historialJuegos)
{
    echo "Ingrese el número de partida que desea ver";
    $nroPartida = trim(fgets(STDIN));
    if ($historialJuegos[$nroPartida]["puntosX"] == $historialJuegos[$nroPartida]["puntosO"]){
        $resultado = "empate";
    }else if ($historialJuegos[$nroPartida]["puntosX"] < $historialJuegos[$nroPartida]["puntosO"]){
        $resultado = "ganó O";
    }else{
        $resultado = "ganó X";
    }
    echo "****************************************";
    echo "Juego TATETI: ". $nroPartida." (". $resultado. ")";
    echo "Jugador X: ". $historialJuegos[$nroPartida]["jugadorX"]. " obtuvo ". $historialJuegos[$nroPartida]["puntosX"]. " puntos.";
    echo "jugador O: ". $historialJuegos[$nroPartida]["jugadorO"]. " obtuvo ". $historialJuegos[$nroPartida]["puntosO"]. " puntos.";
    echo "****************************************";
}



function buscaPrimerVictoria ($historialJuegos, $jugadorBuscado){
    $i = 0;
    $corte = false;
    $indice = -1;
    $cantPartidas = count ($historialJuegos);
    while (($i < $cantPartidas) && ($corte)){
        if (($jugadorBuscado == $historialJuegos [$i]["JugadorX"]){
           if (($historialJuegos [$i]["PuntosX"] ) > ($historialJuegos [$i]["JugadorO"])){
                $indice = $i;
            }
        } elseif ($jugadorBuscado == $historialJuegos [$i] ["JugadorO"]){
           if ($historialJuegos [$i]["PuntosO"] > $historialJuegos [$i] ["JugadorX"]){
               $indice = $i;
           }
        } else {
            $i = $i + 1;
        }
    }
    return $indice;
}
