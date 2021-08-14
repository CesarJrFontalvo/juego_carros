<?php 

class carro{

    private $conexionDB;
    private $id;
    private $color;
    private $id_Conductor;

    public function __construct($id, $color, $id_Conductor){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->color = $color;
        $this->id_Conductor = $id_Conductor;
    }

    public function mostrar() {

        try {

            $sql = "SELECT * FROM carro WHERE id_conductor =  " . $this->getId_Conductor();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getId_Conductor()
    {
        return $this->id_Conductor;
    }

    public function setId_Conductor($id_Conductor)
    {
        $this->id_Conductor = $id_Conductor;

        return $this;
    }
}
