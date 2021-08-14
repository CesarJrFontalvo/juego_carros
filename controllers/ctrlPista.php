<?php 

require('../models/pista.php');

function mostrarPistas(){

    $modelo = new pista(null,null,null,null) ;

    return $modelo->Mostrar('');
    
}

function carrilesPista($id){

    $modelo = new pista(null,null,null,null) ;

    return $modelo->Mostrar('WHERE id = '.$id);
    
}

