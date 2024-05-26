<?php
//include "../models/valoracionesModel.php";
require_once '../backend/bd_conexion.php';

switch ($_SERVER['REQUEST_METHOD']) {
    
    case 'POST':
        {
            /*ejemplo json[{"articulosTotales":"3", "idProducto":"3"},{"articulosTotales":"5", "idProducto":"1"}]*/
            $data = json_decode(file_get_contents('php://input'), true);

                extract($data);
                
                if(empty($idCarrito) || empty($idUsuario) || empty($tipoPedido)){
                    http_response_code(400);
                    echo json_encode(array("status" => "error", "message" => "algun dato vacio"));
                    exit;
                }
                $conexion=BD::crearInstancia();
                
                
                $resultadoFuncion = registrarProducto($idCarrito,$idUsuario, $tipoPedido,$conexion);

               if ($resultadoFuncion[0]){
                http_response_code(200);
                echo json_encode(array("status" => "success", "message" => $resultadoFuncion[1]));
               }else{
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => $resultadoFuncion[1]));
                exit;
                }

               break;
            }
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method Not Allowed"));
        break;
}

function registrarProducto($idCarrito,$idUsuario, $tipoPedido,$conexion){
    
    
    try{
        $sqlInsert="call crearPedido(:idCarrito,:idUsuario,:tipoPedido);";
        $consultaInsert= $conexion->prepare($sqlInsert);
        $consultaInsert->execute([
                                ':idCarrito'=>$idCarrito,
                                ':idUsuario'=>$idUsuario,
                                ':tipoPedido'=>$tipoPedido
        ]);
        

        return array(true,"insertado con exito");
    
    }catch(PDOException $e){
        
            return array(false, "Error al agregar comentario: " . $e->getMessage());
    }
}


?>