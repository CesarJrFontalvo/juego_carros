<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estiloss.css">
    <title>Carrera</title>

    <?php
    require('../db/Conectar.php');
    require('../controllers/ctrlJugador.php');
    require('../controllers/ctrlPodio.php');

    $ganadores = ganadoresPodio($_GET['idPodio']);
    victoria($ganadores[0]['jugadorPrimero']);
    $primer = mostrarJugador($ganadores[0]['jugadorPrimero']);
    $segundo = mostrarJugador($ganadores[0]['jugadorSegundo']);
    $tercero = mostrarJugador($ganadores[0]['jugadorTercero']);

    ?>

</head>

<body>
    <div class ="container">
    <h1>Elegir pista</h1>
    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">Puesto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad de veces en primer lugar</th>
            </tr>
        </thead>
        <tbody>

            <tr>

                <td>1</td>
                <td><?php echo $primer[0]['nombre'] ?></td>
                <td><?php echo $primer[0]['primerLugar'] ?></td>

            </tr>
            <tr>

                <td>2</td>
                <td><?php echo $segundo[0]['nombre'] ?></td>
                <td><?php echo $segundo[0]['primerLugar'] ?></td>

            </tr>
            <tr>

                <td>3</td>
                <td><?php echo $tercero[0]['nombre'] ?></td>
                <td><?php echo $tercero[0]['primerLugar'] ?></td>

            </tr>

        </tbody>
    </table>
    <div  class="col text-center">

        <form action="../controllers/reiniciarValores.php">

            <button class="btn btn-success"><h4>Volver al inicio</h4></button>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</div>
</body>

</html>