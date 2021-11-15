<?php
include_once("modulos145.php");
include_once("tateti.php");
/**
 * Implementar una función que dada la colección de juegos y el nombre de un jugador, retorne el resumen del jugador utilizando la estructura b) de la sección EXPLICACIÓN 2.
 */

/**
 * Dada una coleccion de juegos y el nombre del jugador
 * retorna el resumen del jugador
 * 
 * @param array $arrayJuegos
 * @param Strgin $nombreJugador
 * @return array
 */
function resumenJugador ($arrayJuegos, $nombreJugador){

    // String $resJugador, int $cantGanadas, $cantPerdidas, $cantEmpatadas, $sumaTotalPtos
    $resJugador = " ";
    $cantGanadas = 0;
    $cantPerdidas = 0;
    $cantEmpatadas = 0;
    $sumaTotalPtos = 0;


    foreach ($arrayJuegos as $indice => $elemento) {
        if (($nombreJugador == $arrayJuegos[$elemento] ["jugadorX"])) { //Buscamos el nombre del jugador si es X
            $resJugador = $arrayJuegos[$elemento]["jugadorX"]; //Lo guardamos en una variable
            if ( $arrayJuegos[$elemento]["puntosX"] > $arrayJuegos[$elemento]["puntosO"]) { //Si sus puntos son mas que el de O es porque gano
                $cantGanadas = $cantGanadas + 1;
            } elseif($arrayJuegos[$elemento]["puntosX"] < $arrayJuegos[$elemento]["puntosO"]) { //Si sus puntos son menos que el de O es porque perdio
                $cantPerdidas = $cantPerdidas + 1;
            } else { //Sino porque empato con O
                $cantEmpatadas = $cantEmpatadas + 1; // Si no gano y ni perdio, entonces empato
            }

        } elseif ($nombreJugador == $arrayJuegos[$elemento] ["jugadorO"]) { //Buscamos el nombre del jugador si es O
            $resJugador = $arrayJuegos[$elemento]["jugadoro"];
            if ( $arrayJuegos[$elemento]["puntosO"] > $arrayJuegos[$elemento]["puntosx"]) { //Si sus puntos son mas que el de X es porque gano
                $cantGanadas = $cantGanadas + 1;
            }elseif($arrayJuegos[$elemento]["puntosO"] < $arrayJuegos[$elemento]["puntosX"]) { // Si sus puntos son menos que el de X es porque perdio
                $cantPerdidas = $cantPerdidas + 1;
            } else {
                $cantEmpatadas = $cantEmpatadas + 1; // Si no gano y ni perdio, entonces empato
            }
        }
        
    }
    $resumenJugadorTotal = [
        "nameJugador" => $resJugador, 
        "cantGanadas" => $cantGanadas, 
        "cantPerdidas" => $cantPerdidas, 
        "cantEmpates" => $cantEmpatadas, 
        "totalPts" => $sumaTotalPtos 
    ];

    return $resumenJugadorTotal;
}