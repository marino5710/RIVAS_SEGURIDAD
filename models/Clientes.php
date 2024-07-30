<?php
require_once 'Conexion.php';

class Clientes extends Conexion
{
    public $cli_id;
    public $cli_nombre_empresa;
    public $cli_nombre_contacto;
    public $cli_telefono;
    public $cli_correo;
    public $cli_direccion;
    public $cli_tipo;
    public $cli_situacion;

    public function __construct($args = [])
    {
        $this->cli_id = $args['cli_id'] ?? NULL;
        $this->cli_nombre_empresa = $args['cli_nombre_empresa'] ?? '';
        $this->cli_nombre_contacto = $args['cli_nombre_contacto'] ?? '';
        $this->cli_telefono = $args['cli_telefono'] ?? '';
        $this->cli_correo = $args['cli_correo'] ?? '';
        $this->cli_direccion = $args['cli_direccion'] ?? '';
        $this->cli_tipo = $args['cli_tipo'] ?? '';
        $this->cli_situacion = $args['cli_situacion'] ?? NULL;

    }
    // INSERTAR
    public function guardar()
    {
        $sql = "INSERT INTO Clientes (cli_nombre_empresa, cli_nombre_contacto, cli_telefono, cli_correo, cli_direccion, cli_tipo) values ('$this->cli_nombre_empresa', '$this->cli_nombre_contacto', '$this->cli_telefono', '$this->cli_correo', '$this->cli_direccion', '$this->cli_tipo')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }



    public function buscar()
    {

        $sql = "SELECT * FROM Clientes where cli_situacion = 1 ";
        

        if ($this->cli_nombre_empresa != '') {
            $sql .= " and cli_nombre_empresa like '%$this->cli_nombre_empresa%' ";
        }

        if ($this->cli_nombre_contacto != '') {
            $sql .= " and cli_nombre_contacto like '%$this->cli_nombre_contacto%' ";
        }

        if ($this->cli_telefono != '') {
            $sql .= " and cli_telefono like '%$this->cli_telefono%' ";
        }

        if ($this->cli_correo != '') {
            $sql .= " and cli_correo like '%$this->cli_correo%' ";
        }

        if ($this->cli_direccion != '') {
            $sql .= " and cli_direccion like '%$this->cli_direccion%' ";
        }

        if ($this->cli_tipo != '') {
            $sql .= " and cli_tipo like '%$this->cli_tipo%' ";
        }
        
        $resultado = self::servir($sql);
        return $resultado;
    }



    public function modificar()
    {
        $sql = "UPDATE Clientes SET cli_nombre_empresa = '$this->cli_nombre_empresa', cli_nombre_contacto = '$this->cli_nombre_contacto', cli_telefono = '$this->cli_telefono', cli_correo = '$this->cli_correo', cli_direccion = '$this->cli_direccion', cli_tipo = '$this->cli_tipo' WHERE cli_id = $this->cli_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE Clientes SET cli_situacion = 0 WHERE cli_id = $this->cli_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function mostrarClientes()
    {
        $sql = "SELECT * FROM Clientes where cli_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;
    }

}