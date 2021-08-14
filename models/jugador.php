<?php 



class jugador {

    private $conexionDB;
    private $id;
    private $nombre;
    private $primerLugar;
    private $estaJugando;

    public function __construct($id, $nombre, $primerLugar, $estaJugando){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->nombre = $nombre;
        $this->primerLugar = $primerLugar;
        $this->estaJugando = $estaJugando;
    }

    public function Mostrar($condicion) {

        try {

            $sql = "SELECT * FROM jugador WHERE $condicion";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function ranking() {

        try {

            $sql = "SELECT * FROM jugador ORDER BY primerLugar DESC";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function MostrarJugando() {

        try {

            $sql = "SELECT * FROM jugador WHERE estaJugando = 1";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    
    public function turno() {

        try {

            $sql = "UPDATE jugador SET turno = 1 WHERE estaJugando = 1 LIMIT 1";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function MostrarJugadoresCarrera() {

        try {

            $sql = "SELECT jugador.id AS id_Jugador, jugador.nombre, carro.color, carril.id,carril.desplazamiento,pista.km, pista.carriles, jugador.turno FROM jugador 
            INNER JOIN conductor ON jugador.id = conductor.id_jugador
            INNER JOIN carro ON carro.id_conductor = conductor.id
            INNER JOIN carril ON carro.id = carril.id_carro
            INNER JOIN pista ON pista.id = carril.id_pista WHERE jugador.estaJugando = 1";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function actualizarNombre() {

        try {

            $sql = "  UPDATE jugador SET nombre = '" .$this->getNombre(). "' WHERE id = " .$this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function cumplirTurno() {

        try {

            $sql = "UPDATE jugador SET turno = 0 WHERE id = " . $this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function otorgarTurno() {

        try {
            $sql = "UPDATE jugador
            INNER JOIN conductor ON (jugador.id = conductor.id_jugador) 
            INNER JOIN carro ON (carro.id_conductor = conductor.id)
            INNER JOIN carril ON (carro.id = carril.id_carro)
            INNER JOIN pista ON (pista.id = carril.id_pista)
            SET jugador.turno = 1 
            WHERE estaJugando = 1 AND (pista.km * 1000) > carril.desplazamiento";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function turnosDisponibles() {

        try {

            $sql = "SELECT COUNT(*) AS cantidad FROM jugador WHERE turno = 0 AND estaJugando = 1";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function actualizarEstado($condicion, $estado) {

        try {

            $sql = "  UPDATE jugador SET estaJugando = " .$estado. " WHERE " . $condicion;
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function reiniciar() {

        try {

            $sql = "UPDATE jugador SET  
            estaJugando=0, 
            turno=0";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function sumarVictoria() {

        try {

            $sql = "UPDATE jugador SET primerLugar = primerLugar + 1  WHERE id = " .$this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    
    public function getPrimerLugar()
    {
        return $this->primerLugar;
    }

    public function setPrimerLugar($primerLugar)
    {
        $this->primerLugar = $primerLugar;

    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getEstaJugando()
    {
        return $this->estaJugando;
    }

    public function setEstaJugando($estaJugando)
    {
        $this->estaJugando = $estaJugando;

    }
}
