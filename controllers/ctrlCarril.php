<?php

require('../models/carril.php');

function asignarCarril_Carro($id_Carril, $id_Carro)
{

    $modelo = new carril($id_Carril, $id_Carro, null, null);

    $modelo->asignacion();
}

function mostrarCarriles($id_pista)
{

    $modelo = new carril(null, null, null, $id_pista);

    return $modelo->mostrar();
}

function cantidad_Carriles($id_Carril)
{

    $modelo = new carril($id_Carril, null, null, null);

    return $modelo->cantidadCarriles();
}

function actualizarDesplazamiento($id, $desplazamiento, $id_Jugador,$meta,$id_Podio)
{

    require('../db/Conectar.php');
    verificarDesplazamiento($id, $desplazamiento, $id_Jugador,$meta,$id_Podio);
    turnosActual($id_Jugador,$id,$id_Podio);

    header("Location: ../views/juego.php?idPodio=".$id_Podio);
}

function verificarDesplazamiento($id, $desplazamiento, $id_Jugador,$meta,$id_Podio)
{

    $modelo = new carril($id, null, null, null);
    $resultado = $modelo->buscar();

    if(($resultado[0]['desplazamiento'] + $desplazamiento)>$meta){
        
        require('../controllers/ctrlPodio.php');
    }else if(($resultado[0]['desplazamiento'] + $desplazamiento) == $meta){
        
        $modelo->setDesplazamiento($desplazamiento);
        $modelo->sumarDesplazamiento();
        require('../controllers/ctrlPodio.php');
        asignarPodio($id_Podio, $id_Jugador);
    }else{
        $modelo->setDesplazamiento($desplazamiento);
        $modelo->sumarDesplazamiento();
        require('../controllers/ctrlPodio.php');
    }
}

function turnosActual($id,$id_Carril,$id_Podio)
{
    require('../controllers/ctrlJugador.php');

    quitarTurno($id);
    $carriles = cantidad_Carriles($id_Carril);
    $turnos = turnos();
    echo $carriles[0]['carriles'];
    if ($turnos[0]['cantidad'] > ($carriles[0]['carriles']-1)) {
        asignarTurno($id_Podio);

    }
}

function estaSeleccionado_Carril()
{
    $modelo = new carril(null, null, null, null);

    return $modelo->seleccionado();
}

function reiniciarCarril()
{
    $modelo = new carril(null, null, null, null);
    $modelo->reiniciar();
}

if (isset($_POST['btnAvanzar'])) {
    actualizarDesplazamiento($_POST['txtIdCarril'], $_POST['txtRecorrido' . $_POST['txtIdCarril']],$_POST['txtIdJugador'],$_POST['txtMeta'],$_POST['txtIdPodio']);
}
