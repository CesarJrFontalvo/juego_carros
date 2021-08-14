<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <link rel="stylesheet" href="estilos.css">
    <title>Carrera</title>

    <?php
    require('./db/Conectar.php');
    require('./controllers/ctrlPista.php');

    $pistas = mostrarPistas();

    ?>

</head>
<body>
    
<div class = "container">
    <h1>Seleccionar pista</h1>
    <table class="table  table-danger">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Km</th>
                <th scope="col">Carriles</th>
                <th scope="col">Nombre pista</th>
                <th scope="col">Seleccionar pista</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($pistas as $fila) { ?>

                <tr>
                    <th scope="row"><?php echo $fila['id'] ?></th>
                    <td><?php echo $fila['km'] ?></td>
                    <td><?php echo $fila['carriles'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>
                    <td>

                        <a href="./listaJugadores.php?carriles=<?php echo $fila['carriles'] ?>&idPista=<?php echo $fila['id'] ?>&nombre=<?php echo $fila['nombre'] ?>">Seleccionar</a>

                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <div class="container">
        <form action="podio.php">
            <button type="submit" class="btn btn-warning">Clasificación</button>
        </form>
    </div>
    <br>
    <div class="container">
        <form action="partidasJugadas.php">
            <button type="submit" class="btn btn-warning">Partidas jugadas</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 

    </div>

</body>
</html>