<?php
require_once 'Conexion.php';

class Empleados extends Conexion
{
    public $emp_id;
    public $emp_nombre;
    public $emp_apellido;
    public $emp_fecha_nacimiento;
    public $emp_telefono;
    public $emp_correo_electronico;
    public $emp_direccion;
    public $emp_puesto;
    public $emp_fecha_ingreso;
    public $emp_situacion;

    public function __construct($args = [])
    {
        $this->emp_id = $args['emp_id'] ?? NULL;
        $this->emp_nombre = $args['emp_nombre'] ?? '';
        $this->emp_apellido = $args['emp_apellido'] ?? '';
        $this->emp_fecha_nacimiento = $args['emp_fecha_nacimiento'] ?? '';
        $this->emp_telefono = $args['emp_telefono'] ?? '';
        $this->emp_correo_electronico = $args['emp_correo_electronico'] ?? '';
        $this->emp_direccion = $args['emp_direccion'] ?? '';
        $this->emp_puesto = $args['emp_puesto'] ?? '';
        $this->emp_fecha_ingreso = $args['emp_fecha_ingreso'] ?? '';
        $this->emp_situacion = $args['emp_situacion'] ?? NULL;

    }
    // INSERTAR
    public function guardar()
    {
        $sql = "INSERT INTO Empleados (emp_nombre, emp_apellido, emp_fecha_nacimiento, emp_telefono, emp_correo_electronico, emp_direccion, emp_puesto, emp_fecha_ingreso) values ('$this->emp_nombre', '$this->emp_apellido', '$this->emp_fecha_nacimiento', '$this->emp_telefono', '$this->emp_correo_electronico', '$this->emp_direccion' , '$this->emp_puesto', '$this->emp_fecha_ingreso' )";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    // $sql = "SELECT alumnos.*, grados.*, armas.*
    // FROM alumnos
    // INNER JOIN grados ON alumnos.alumno_grado = grados.grado_id
    // INNER JOIN armas ON alumnos.alumno_arma_o_servicio = armas.arma_id
    // WHERE alumnos.alumno_situacion = 1;";

    public function buscar()
    {

        $sql = "SELECT * FROM Empleados where emp_situacion = 1 ";
        

        if ($this->emp_nombre != '') {
            $sql .= " and emp_nombre like '%$this->emp_nombre%' ";
        }

        if ($this->emp_apellido != '') {
            $sql .= " and emp_apellido like '%$this->emp_apellido%' ";
        }

        if ($this->emp_fecha_nacimiento != '') {
            $sql .= " and emp_fecha_nacimiento like '%$this->emp_fecha_nacimiento%' ";
        }

        if ($this->emp_telefono != '') {
            $sql .= " and emp_telefono like '%$this->emp_telefono%' ";
        }

        if ($this->emp_correo_electronico != '') {
            $sql .= " and emp_correo_electronico like '%$this->emp_correo_electronico%' ";
        }

        if ($this->emp_direccion != '') {
            $sql .= " and emp_direccion like '%$this->emp_direccion%' ";
        }
        
        if ($this->emp_puesto != '') {
            $sql .= " and emp_puesto like '%$this->emp_puesto%' ";
        }

        if ($this->emp_fecha_ingreso != '') {
            $sql .= " and emp_fecha_ingreso like '%$this->emp_fecha_ingreso%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }



    public function modificar()
    {
        $sql = "UPDATE Empleados SET emp_nombre = '$this->emp_nombre', emp_apellido = '$this->emp_apellido', emp_fecha_nacimiento = '$this->emp_fecha_nacimiento', emp_telefono = '$this->emp_telefono', emp_correo_electronico = '$this->emp_correo_electronico', emp_direccion = '$this->emp_direccion', emp_puesto = '$this->emp_puesto', emp_fecha_ingreso = '$this->emp_fecha_ingreso' WHERE emp_id = $this->emp_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }



    public function eliminar()
    {
        $sql = "UPDATE Empleados SET emp_situacion = 0 WHERE emp_id = $this->emp_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function mostrarEmpleados()
    {
        $sql = "SELECT * FROM Empleados where emp_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;
    }

}