<?php 

class podio{

    private $conexionDB;
    private $id;
    private $jugadorPrimero;
    private $jugadorSegundo;
    private $jugadorTercero;
    

    public function __construct($id, $jugadorPrimero, $jugadorSegundo, $jugadorTercero){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->jugadorPrimero = $jugadorPrimero;
        $this->jugadorSegundo = $jugadorSegundo;
        $this->jugadorTercero = $jugadorTercero;
    }

    public function crear() {

        try {

            $sql = "INSERT INTO `podio` (`id`, `jugadorPrimero`, `jugadorSegundo`, `jugadorTercero`) VALUES (NULL, NULL, NULL, NULL); ";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function lastId() {

        try {

            $sql = "SELECT LAST_INSERT_ID() AS id FROM podio;";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function Mostrar() {

        try {

            $sql = "SELECT * FROM podio";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function puestoVacio($puesto) {

        try {

            $sql = "SELECT COUNT(*) AS cantidad FROM podio WHERE id =". $this->getId()."   AND $puesto IS NULL";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function asignarPuesto($puesto, $id_Jugador) {

        try {

            $sql = "UPDATE podio SET $puesto = $id_Jugador WHERE id = " . $this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function ganadores() {

        try {

            $sql = "SELECT * FROM podio WHERE id = " .$this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function getJugadorTercero()
    {
        return $this->jugadorTercero;
    }

    public function setJugadorTercero($jugadorTercero)
    {
        $this->jugadorTercero = $jugadorTercero;

    }

    public function getJugadorSegundo()
    {
        return $this->jugadorSegundo;
    }

    public function setJugadorSegundo($jugadorSegundo)
    {
        $this->jugadorSegundo = $jugadorSegundo;

    }

    public function getJugadorPrimero()
    {
        return $this->jugadorPrimero;
    }

    public function setJugadorPrimero($jugadorPrimero)
    {
        $this->jugadorPrimero = $jugadorPrimero;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }
}
