<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Carrera</title>

    <?php

    require('../db/Conectar.php');
    require('../controllers/ctrlJugador.php');
    require('../controllers/ctrlConductor.php');
    require('../controllers/ctrlCarril.php');
    require('../controllers/ctrlPodio.php');
    $terminar = 0;
    $terminar += terminarJuego($_GET['idPodio']);

    $carrera = mostrarCarrera();

    ?>
</head>

<body class = "body-juego">
    <div class = "container">

   
    <h2>Gana el primero en llegar a 2000 metros!</h2>
    <table class="table table-info ">
        <thead>
            <tr>
                <th scope="col">Jugador</th>
                <th scope="col">Color del auto</th>
                <th scope="col">Carril</th>
                <th scope="col">Metros recorridos</th>
                <th scope="col">Click en el dado</th>
                <th scope="col">Avanzar</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($carrera as $fila) {
            ?>
                <form action="../controllers/ctrlCarril.php" method="post">
                    <tr>
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['color'] ?></td>
                        <td><?php echo $fila['id'] ?></td>
                        <td><?php echo $fila['desplazamiento'] ?></td>

                        <?php
                        if ($terminar != 0) {
                            if (($carrera[0]['km'] * 1000) > $fila['desplazamiento']) {
                                if ($fila['turno'] == 1) {
                        ?>
                                    <td>
                                        <button type="button" name="btnLanzar" class="btn btn-warning lanzar" onclick="lanzar(<?php echo $fila['id'] ?>,'btnAvanzar');deshabilitar('btnLanzar<?php echo $fila['id'] ?>');" id="btnLanzar<?php echo $fila['id'] ?>">
                                            <input type="hidden" id="txtRecorrido<?php echo $fila['id'] ?>" name="txtRecorrido<?php echo $fila['id'] ?>">
                                            <input type="hidden" value="<?php echo $fila['id'] ?>" name="txtIdCarril">
                                            <input type="hidden" value="<?php echo $fila['id_Jugador'] ?>" name="txtIdJugador">
                                            <input type="hidden" value="<?php echo ($carrera[0]['km'] * 1000) ?>" name="txtMeta">
                                            <input type="hidden" value="<?php echo $_GET['idPodio'] ?>" name="txtIdPodio">

                                            <i class="bi bi-dice-6 dado">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-dice-6" viewBox="0 0 16 16">
                                                    <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z" />
                                                    <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                </svg>
                                            </i>
                                            <i class="bi bi-dice-6-fill">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-dice-6-fill" viewBox="0 0 16 16">
                                                    <path d="M3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3zm1 5.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm8 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm1.5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM12 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM4 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                </svg>
                                            </i>
                                        </button>

                                    </td>

                                    <td>

                                        <button type="submit" class="btn btn-outline-danger" name="btnAvanzar" disabled="true" id="btnAvanzar<?php echo $fila['id'] ?>">Avanzar</button>

                                    </td>
                        <?php
                                }
                            }
                        }
                        ?>

                    </tr>

                </form>

            <?php
            }
            ?>

        </tbody>
    </table>

    <?php

    if ($terminar == 0) {
    ?>
        <div>

            <a href="./ganadores.php?idPodio=<?php echo $_GET['idPodio'] ?>">

                <h2>Terminar juego</h2>

            </a>

        </div>

    <?php
    }

    ?>
    <div class="puntaje">
        <div class="numeroDado">
            <h2>Sacaste</h2>
            <h2 name="txtDado" id="txtDado"></h2>


        </div>

        <div class="numeroDado">
            <h2>Avanzas</h2>
            <h2 name="txtAvanzar" id="txtAvanzar"></h2>
        </div>
    </div>

   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="../js/dado.js"></script>

    </div>
</body>

</html>
