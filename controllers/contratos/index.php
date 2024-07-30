<?php
require '../../models/Contratos.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
$tipo = $_REQUEST['tipo'];


// echo json_encode($_GET);
// exit;
try {
    switch ($metodo) {
        case 'POST':
             $_POST['con_fecha_inicio'] = date('m/d/Y', strtotime($_POST['con_fecha_inicio'])) ;
             $_POST['con_fecha_fin'] = date('m/d/Y', strtotime($_POST['con_fecha_fin']));
            // echo json_encode($_POST);
            // exit;
            $contrato = new Contratos($_POST);
            switch ($tipo) {
                case '1':

                    $ejecucion = $contrato->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                case '2':

                    $ejecucion = $contrato->modificar();
                    $mensaje = "Modificado correctamente";
                    break;

                case '3':

                    $ejecucion = $contrato->eliminar();
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
            $_GET['con_fecha_inicio'] = date('m/d/Y', strtotime($_GET['con_fecha_inicio'])) ?  '' :  date('m/d/Y', strtotime($_GET['con_fecha_inicio'])) ;
            $_GET['con_fecha_fin'] = date('m/d/Y', strtotime($_GET['con_fecha_fin'])) ?  '' :  date('m/d/Y', strtotime($_GET['emp_fecha_ingreso'])) ;
            $contrato = new Contratos($_GET);
            $contratos = $contrato->buscar();
            echo json_encode($contratos);
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
