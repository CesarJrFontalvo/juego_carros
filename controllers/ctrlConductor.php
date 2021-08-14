<?php 

require('../models/conductor.php');

function asignarCarro_Jugador($id_Jugador, $id_Conductor, $estado){

    $modelo = new conductor($id_Conductor,null,$id_Jugador,$estado) ;

    $modelo->actualizarEstado($id_Jugador);
    
}

function mostrarConductor_Carro(){

    $modelo = new conductor(null,null,null,null) ;

    return $modelo->mostrar('');
    
}

function estaSeleccionado_Conductor()
{
    $modelo = new conductor(null, null, null, null);

    return $modelo->seleccionado();
}

function reiniciarConductor()
{
    $modelo = new conductor(null, null, null, null);

    $modelo->reiniciar();
}