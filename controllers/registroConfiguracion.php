<?php 
require('../db/Conectar.php');
require('../controllers/ctrlJugador.php');
require('../controllers/ctrlConductor.php');
require('../controllers/ctrlCarril.php');
require('../controllers/ctrlCarro.php');

actualizarNombreJugador($_POST['txtIdJugador'],$_POST['txtNombre']);
asignarCarro_Jugador($_POST['txtIdJugador'],$_POST['sltConductor'], 1);
asignarCarril_Carro($_POST['sltCarril'],mostrarCarro_Conductor($_POST['sltConductor']));
mostrarCarro_Conductor($_POST['sltConductor']);

header("Location: ../views/listajugadores.php?idPista=" .$_POST['txtIdPista']);

