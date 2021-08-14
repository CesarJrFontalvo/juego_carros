<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    

    <title>Carrera</title>

    <?php
    require('../db/Conectar.php');
    require('../controllers/ctrlJugador.php');
    require('../controllers/ctrlConductor.php');
    require('../controllers/ctrlCarril.php');
    require('../controllers/ctrlPista.php');

    $conductores = mostrarConductor_Carro();
    $carriles = mostrarCarriles($_GET['idPista']);
    $cantidadCarriles = carrilesPista($_GET['idPista']);
    $carrilesSeleccionados = estaSeleccionado_Carril();
    $conductoresSeleccionados = estaSeleccionado_Conductor();

    if (isset($_GET['carriles'])) {
        $lista = mostrarJugadoresAleatorios($_GET['carriles']);
    } else {
        $lista = mostrarActuales();
    }
    ?>

</head>

<body class="body-lista">
    <div class = "container">
    <h1 class="conten">Jugadores permitidos</h1>
    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad de veces en primer lugar</th>
                <th scope="col">Elegir</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($lista as $fila_Jugador) { ?>

                <tr>
                    <th scope="row"><?php echo $fila_Jugador['id'] ?></th>
                    <td><?php echo $fila_Jugador['nombre'] ?></td>
                    <td><?php echo $fila_Jugador['primerLugar'] ?></td>
                    <td>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $fila_Jugador['id'] ?>">
                            Configurar
                        </button>

                        <!-- Modal -->
                        <form action="../controllers/registroConfiguracion.php" method="post">
                            <div class="modal fade" id="exampleModal<?php echo $fila_Jugador['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $fila_Jugador['nombre'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Cambiar nombre
                                            <input class="form-control" type="text" name="txtNombre" value="<?php echo $fila_Jugador['nombre'] ?>">

                                            Seleccionar conductor con su vehículo
                                            <select class="form-control" name="sltConductor" id="">
                                                <option value="0">Seleccione</option>
                                                <?php foreach ($conductores as $fila) { ?>
                                                    <option value="<?php echo $fila['id'] ?>"><?php echo $fila['nombre'] ?> - Auto <?php echo $fila['color'] ?></option>
                                                <?php } ?>
                                            </select>

                                            Seleccionar el carril
                                            <select class="form-control" name="sltCarril" id="">
                                                <option value="0">Seleccione</option>
                                                <?php foreach ($carriles as $fila) { ?>
                                                    <option value="<?php echo $fila['id'] ?>"><?php echo $fila['id'] ?></option>
                                                <?php } ?>
                                            </select>

                                            <input class="form-control" type="hidden" name="txtIdJugador" value="<?php echo $fila_Jugador['id'] ?>">

                                            <input class="form-control" type="hidden" name="txtIdPista" value="<?php echo $_GET['idPista'] ?>">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>



    <?php

    if ($carrilesSeleccionados[0]['cantidad'] == $cantidadCarriles[0]['carriles'] && $conductoresSeleccionados[0]['cantidad'] == $cantidadCarriles[0]['carriles']) {

    ?>
        <div class="col text-center">
        <form action="../controllers/ctrlJugador.php" method="post">
            <button type="submit" class="btn btn-success" name="btnJugar"><h4>Empezar a jugar</h4></button>
            <input type="hidden" name="txtIdPista" value="<?php echo $_GET['idPista'] ?>">
        </form>
        </div>
    <?php

    } else {  
    echo"<h3 class='conten3'>Debes seleccionar al conductor con su auto, al igual que el carril a correr
     <br> en el botón configurar, para empezar el juego.</h3>";
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</div>

</body>

</html>