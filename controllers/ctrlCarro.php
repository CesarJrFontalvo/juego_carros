<?php 

require('../models/carro.php');

function mostrarCarro_Conductor($id){

    $modelo = new carro(null,null,$id) ;
    $resultado = $modelo->mostrar();
    return $resultado[0]['id'];
}