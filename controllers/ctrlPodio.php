<?php 

require('../models/podio.php');

function ingresarPodio($puesto, $id_Jugador, $id_Podio){

    $modelo = new podio($id_Podio,null,null,null) ;

    return $modelo->asignarPuesto($puesto, $id_Jugador);
    
}

function crearPodio(){

    $modelo = new podio(null,null,null,null) ;

    return $modelo->crear();
    
}

function lastIdPodio(){

    $modelo = new podio(null,null,null,null) ;

    return $modelo->lastId();
}

function traerPodio($id_Podio, $puesto){

    $modelo = new podio($id_Podio,null,null,null);

    $resultado = $modelo->puestoVacio($puesto);

    return $resultado;
}

function asignarPodio($id_Podio, $id_Jugador){
    $puestos = array('jugadorPrimero','jugadorSegundo','jugadorTercero');

    $i = 0;
    do{
        $disponible = traerPodio($id_Podio,$puestos[$i]);
        if ($disponible[0]['cantidad'] == 1) {
            ingresarPodio($puestos[$i], $id_Jugador, $id_Podio);
        }
        $i++;
    }while($disponible[0]['cantidad'] == 0);

}

function terminarJuego($id_Podio){
    $puestos = array('jugadorPrimero','jugadorSegundo','jugadorTercero');
    $count = 0;

    for($i = 0; $i<3; $i++){
        $cantidad = traerPodio($id_Podio,$puestos[$i]);
        $count += (int) $cantidad[0]['cantidad'];
    }

    return $count;

}

function ganadoresPodio($id_Podio){

    $modelo = new podio($id_Podio,null,null,null);

    $resultado = $modelo->ganadores();

    return $resultado;
}

