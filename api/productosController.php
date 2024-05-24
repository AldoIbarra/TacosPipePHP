<?php
include "../models/productosModel.php";


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        {
            
            //http://localhost/TacosPipePHP/api/productosController.php/?categoria=2
            if (isset($_GET['categoria'])) {
                $productosRespuesta = ProductoClass::buscarByCategoria($_GET['categoria']);
                if($productosRespuesta==null){
                    http_response_code(400);
                    echo json_encode(array("status" => "error", "message" => "ningun usuario encontrado"));
                    exit;
                }else{
                    http_response_code(200);
                    echo json_encode($productosRespuesta);
                    exit;
                }
            }else{
                $productosRespuesta = ProductoClass::buscarAllProductos();
                if($productosRespuesta==null){
                    http_response_code(400);
                    echo json_encode(array("status" => "error", "message" => "ningun usuario encontrado"));
                    exit;
                }else{
                    http_response_code(200);
                    echo json_encode($productosRespuesta);
                    exit;
                }
            }
            http_response_code(400);
            echo json_encode(array("status" => "error", "message" => "ningun usuario encontrado"));
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method Not Allowed"));
        break;
}

?>