<?php 


require('../db/Conectar.php');
require('../controllers/ctrlJugador.php');
require('../controllers/ctrlConductor.php');
require('../controllers/ctrlCarril.php');

reiniciarCarril();
reiniciarConductor();
reiniciarJugador();

header("Location: ../views/elegirPista.php");
