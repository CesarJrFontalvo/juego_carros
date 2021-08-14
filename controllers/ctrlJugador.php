<?php

require('../models/jugador.php');

function mostrarJugadores()
{

    $modelo = new jugador(null, null, null, null);

    return $modelo->Mostrar('1');
}

function mostrarRankingJugadores()
{

    $modelo = new jugador(null, null, null, null);

    return $modelo->ranking();
}

function mostrarJugador($id)
{

    $modelo = new jugador(null, null, null, null);

    return $modelo->Mostrar(' id = ' . $id);
}

function mostrarActuales()
{

    $modelo = new jugador(null, null, null, null);

    return $modelo->MostrarJugando();
}

function actualizarNombreJugador($id, $nombre)
{

    $modelo = new jugador($id, $nombre, null, null);

    return $modelo->actualizarNombre();
}

function jugadoresAleatorios($carriles)
{

    $x = 0;
    $valores = array();
    while ($x < $carriles) {
        $num_aleatorio = rand(1, 6);
        if (!in_array($num_aleatorio, $valores)) {
            array_push($valores, $num_aleatorio);
            $x++;
        }
    }

    return $valores;
}

function mostrarJugadoresAleatorios($carriles)
{

    $modelo = new jugador(null, null, null, null);
    $modelo->actualizarEstado('1', 0);

    $jugadores = jugadoresAleatorios($carriles);
    $condicion = '';
    for ($i = 0; $i < sizeof($jugadores); $i++) {
        if ($i == 0) {
            $condicion = 'id = ' . $jugadores[$i];
        } else {
            $condicion .= ' OR id = ' . $jugadores[$i];
        }
    }
    $modelo->actualizarEstado($condicion, 1);
    return $modelo->Mostrar($condicion);
}

function mostrarCarrera()
{

    $modelo = new jugador(null, null, null, null);

    return $modelo->MostrarJugadoresCarrera();
}

function quitarTurno($id)
{

    $modelo = new jugador($id, null, null, null);

    $modelo->cumplirTurno();
}

function asignarTurno($id_Podio)
{
    $modelo = new jugador(null, null, null, null);

    $modelo->otorgarTurno();
    header("Location: ../views/juego.php?idPodio=" . $id_Podio);
}

function turnos()
{

    $modelo = new jugador(null, null, null, null);

    return $modelo->turnosDisponibles();
}

function reiniciarJugador()
{

    $modelo = new jugador(null, null, null, null);
    $modelo->reiniciar();
}

function victoria($id){

    $modelo = new jugador($id, null, null, null);
    $modelo->sumarVictoria();

}

if (isset($_POST['btnJugar'])) {
    require('../db/Conectar.php');
    require('../controllers/ctrlPodio.php');
    require('../controllers/ctrlJuego.php');

    
    crearPodio();
    $id_Podio = lastIdPodio();
    crearJuego($_POST['txtIdPista'],$id_Podio[0]['id']);
    asignarTurno($id_Podio[0]['id']);
}
