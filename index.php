<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Carrera</title>
</head>

<body>

    <p>
    <h3>El juego funciona de la siguiente manera</h3>
    </p>
    <ol>
        <li>Se escoge la pista, las cuales tienen distinta cantidad de carriles.</li>
        <li>Al escoger la pista, para hacer el juego más interesante, el sistema escogerá jugadores aleatoriamente de los que ya hay creados (la cantidad de jugadores escogidos dependerá de la cantidad de carriles de la pista), a los cuales se les puede modificar el nombre.</li>
        <li>Después de esto, habrá una lista de candidatos, a los cuales habrá que asignarles el conductor, auto y carril</li>
        <li>Cuando todos hayan elegidos sus items, se le da clic al botón que dice "Empezar a jugar"</li>
        <li>Después de esto, habrá una tabla con los respectivos jugadores, los cuales tiene el botón para obtener el puntaje del dado hasta para avanzar</li>
        <li>Al darle al botón "Lanzar", se activará el botón de "Avanzar" para poder lograr el movimiento</li>
        <li>Solo hay 3 puesto, al lograrse los 3 puestos, se terminará el juego</li>
    </ol>

    <div class="container">
        <form action="./views/elegirPista.php">
            <button type="submit" class="btn btn-primary">¡Empezar!</button>
        </form>
    </div>
    <br>
    <div class="container">
        <form action="./views/podio.php">
            <button type="submit" class="btn btn-secondary">Ranking</button>
        </form>
    </div>
    <br>
    <div class="container">
        <form action="./views/partidasJugadas.php">
            <button type="submit" class="btn btn-warning">Partidas jugadas</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>