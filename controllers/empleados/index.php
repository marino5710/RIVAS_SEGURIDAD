<?php
require '../../models/Empleados.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$tipo = $_REQUEST['tipo'];


// echo json_encode($_GET);
// exit;
try {
    switch ($metodo) {
        case 'POST':
             $_POST['emp_fecha_ingreso'] = date('m/d/Y', strtotime($_POST['emp_fecha_ingreso'])) ;
             $_POST['emp_fecha_nacimiento'] = date('m/d/Y', strtotime($_POST['emp_fecha_nacimiento']));
            // echo json_encode($_POST);
            // exit;
            $empleado = new Empleados($_POST);
            switch ($tipo) {
                case '1':

                    $ejecucion = $empleado->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                case '2':

                    $ejecucion = $empleado->modificar();
                    $mensaje = "Modificado correctamente";
                    break;

                case '3':

                    $ejecucion = $empleado->eliminar();
                    $mensaje = "Eliminado correctamente";
                    break;

                default:

                    break;
            }

            http_response_code(200);
            echo json_encode([
                "mensaje" => $mensaje,
                "codigo" => 1,

            ]);
            break;

        case 'GET':
            http_response_code(200);
            $_GET['emp_fecha_ingreso'] = date('m/d/Y', strtotime($_GET['emp_fecha_ingreso'])) ?  '' :  date('m/d/Y', strtotime($_GET['emp_fecha_ingreso'])) ;
            $_GET['emp_fecha_nacimiento'] = date('m/d/Y', strtotime($_GET['emp_fecha_nacimiento'])) ?  '' :  date('m/d/Y', strtotime($_GET['emp_fecha_ingreso'])) ;
            $empleado = new Empleados($_GET);
            $empleados = $empleado->buscar();
            echo json_encode($empleados);
            break;

        default:
            http_response_code(405);
            echo json_encode([
                "mensaje" => "Método no permitido",
                "codigo" => 9,
            ]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}

exit;
