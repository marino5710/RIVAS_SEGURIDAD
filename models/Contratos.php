<?php
require_once 'Conexion.php';

class Contratos extends Conexion
{
    public $con_id;
    public $con_cli_id;
    public $con_serv_id;
    public $con_fecha_inicio;
    public $con_fecha_fin;
    public $con_estado;
    public $con_situacion;

    public function __construct($args = [])
    {
        $this->con_id = $args['con_id'] ?? NULL;
        $this->con_cli_id = $args['con_cli_id'] ?? '';
        $this->con_serv_id = $args['con_serv_id'] ?? '';
        $this->con_fecha_inicio = $args['con_fecha_inicio'] ?? '';
        $this->con_fecha_fin = $args['con_fecha_fin'] ?? '';
        $this->con_estado = $args['con_estado'] ?? '';
        $this->con_situacion = $args['con_situacion'] ?? NULL;

    }


    // INSERTAR
    public function guardar()
    {
        $sql = "INSERT INTO Contratos (con_cli_id, con_serv_id, con_fecha_inicio, con_fecha_fin, con_estado) values ('$this->con_cli_id', '$this->con_serv_id', '$this->con_fecha_inicio', '$this->con_fecha_fin', '$this->con_estado')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }



    public function buscar()
    {

        // $sql = "SELECT contratos.*, clientes.*, servicios.* FROM contratos INNER JOIN clientes ON con_cli_id = cli_id INNER JOIN servicios ON con_serv_id = serv_id WHERE cli_situacion = 1;";
        $sql = "SELECT 
    ctr.con_id,
    c.cli_nombre_empresa,
    s.serv_nombre,
    ctr.con_fecha_inicio,
    ctr.con_fecha_fin,
    ctr.con_estado,
    ctr.con_situacion
FROM 
    Contratos ctr
INNER JOIN 
    Clientes c ON ctr.con_cli_id = c.cli_id
INNER JOIN 
    Servicios s ON ctr.con_serv_id = s.serv_id
WHERE 
    c.cli_situacion = 1;
";


        if ($this->con_cli_id != '') {
            $sql .= " and con_cli_id like '%$this->con_cli_id%' ";
        }

        if ($this->con_serv_id != '') {
            $sql .= " and con_serv_id like '%$this->con_serv_id%' ";
        }

        if ($this->con_fecha_inicio != '') {
            $sql .= " and con_fecha_inicio like '%$this->con_fecha_inicio%' ";
        }

        if ($this->con_fecha_fin != '') {
            $sql .= " and con_fecha_fin like '%$this->con_fecha_fin%' ";
        }

        if ($this->con_estado != '') {
            $sql .= " and con_estado like '%$this->con_estado%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }



    public function modificar()
    {
        $sql = "UPDATE Contratos SET con_cli_id = '$this->con_cli_id', con_serv_id = '$this->con_serv_id', con_fecha_inicio = '$this->con_fecha_inicio', con_fecha_fin = '$this->con_fecha_fin', con_estado = '$this->con_estado' WHERE con_id = $this->con_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE Contratos SET con_situacion = 0 WHERE con_id = $this->con_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    // public function mostrarServicios()
    // {
    //     $sql = "SELECT * FROM Servicios where serv_situacion = 1";
    //     $resultado = self::servir($sql);
    //     return $resultado;
    // }

}