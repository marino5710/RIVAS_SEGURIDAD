<?php
require_once 'Conexion.php';

class Servicios extends Conexion
{
    public $serv_id;
    public $serv_nombre;
    public $serv_descripcion;
    public $serv_precio;
    public $serv_tipo;
    public $serv_situacion;

    public function __construct($args = [])
    {
        $this->serv_id = $args['serv_id'] ?? NULL;
        $this->serv_nombre = $args['serv_nombre'] ?? '';
        $this->serv_descripcion = $args['serv_descripcion'] ?? '';
        $this->serv_precio = $args['serv_precio'] ?? '';
        $this->serv_tipo = $args['serv_tipo'] ?? '';
        $this->serv_situacion = $args['serv_situacion'] ?? '';

    }

    public function mostrarServicios()
    {
        $sql = "SELECT * FROM Servicios where serv_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;
    }

}