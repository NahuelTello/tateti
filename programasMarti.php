<?php
include_once ("tateti.php");
/**
 *  Historial precargado de partidas de tateti
 * @return array 
 */
function cargarJuegos ()
{
    $historialJuegos [0] = ["jugadorX" => "TOMI", "jugadorO" => "JUAN", "puntosX" => 5, "puntosO" => 0];
    $historialJuegos [1] = ["jugadorX" => "JUAN", "jugadorO" => "ANTO", "puntosX" => 1, "puntosO" => 1];
    $historialJuegos [2] = ["jugadorX" => "GONZI", "jugadorO" => "DEDU", "puntosX" => 0, "puntosO" => 4];
    $historialJuegos [3] = ["jugadorX" => "GALA", "jugadorO" => "NICO", "puntosX" => 0, "puntosO" => 5];
    $historialJuegos [4] = ["jugadorX" => "NICO", "jugadorO" => "TOMI", "puntosX" => 1, "puntosO" => 1];
    $historialJuegos [5] = ["jugadorX" => "MARI", "jugadorO" => "ALEJO", "puntosX" => 3, "puntosO" => 0];
    $historialJuegos [6] = ["jugadorX" => "ALEJO", "jugadorO" => "MARI", "puntosX" => 1, "puntosO" => 1];
    $historialJuegos [7] = ["jugadorX" => "FINN", "jugadorO" => "FACU", "puntosX" => 4, "puntosO" => 0];
    $historialJuegos [8] = ["jugadorX" => "FACU", "jugadorO" => "GONZI", "puntosX" => 1, "puntosO" => 1];
    $historialJuegos [9] = ["jugadorX" => "ANTO", "jugadorO" => "GALA", "puntosX" => 2, "puntosO" => 0];
    return $historialJuegos;
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
    $nroIndice = count($historialJuegos) ;
    $historialJuegos [$nroIndice] ["jugadorX"] = $juego ["jugadorCruz"];
    $historialJuegos [$nroIndice] ["jugadorO"] = $juego ["jugadorCirculo"];
    $historialJuegos [$nroIndice] ["puntosX"] = $juego ["puntosCruz"];
    $historialJuegos [$nroIndice] ["puntosO"] = $juego ["puntosCirculo"];
    return $historialJuegos;
 }


/**
 * muestra los datos de determinada partida de tateti.
 * @param int $nroPartida
 */
function mostrarJuego ($nroPartida)
{
    $historialJuegos = cargarJuegos();
    echo "Juego TATETI: ". $nroPartida." (";
    //encontrar manera para que figure si es empate, o si gano X o gano O.  
}

//CORREGIR MODULOS
//PIENSA PIENSA PIENSAAAAA