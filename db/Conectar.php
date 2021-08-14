<?php

require ('config.php');

class Conectar {

    private $host;
    private $db;
    private $usuario;
    private $password;
    private $charset;

    public function __construct() {

        $this->host = SERVIDOR;
        $this->usuario = USER;
        $this->password = PASSWORD;
        $this->db = DB;
        $this->charset = CHARSET;
    }

    function conectar() {

        try {

            $conexion = "mysql:host=" . $this->host . ";db=" . $this->db . ";charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_PERSISTENT => true
            ];

            $pdo = new PDO($conexion, $this->usuario, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            ?>

            <script>

                alert('Hay problemas para realizar la conexión');
                window.location.href = '../index.php';

            </script>

            <?php

        }
    }

}
?>
