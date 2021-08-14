<?php 

require('../models/juego.php');

function mostrarPartidas_Juego(){

    $modelo = new juego(null,null,null) ;

    return $modelo->mostrarPartidas();
    
}

function crearJuego($id_pista, $id_podio){

    $modelo = new juego(null,$id_pista,$id_podio) ;

    $modelo->crear();
    
}




