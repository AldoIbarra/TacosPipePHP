<?php
//include "../models/valoracionesModel.php";
require_once '../backend/bd_conexion.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        {
            $conexion=BD::crearInstancia();
            $data = json_decode(file_get_contents('php://input'), true);

            if(isset($_SERVER['HTTP_ACTION']) && $_SERVER['HTTP_ACTION'] == 'LastPedido'){
                if(!isset($_GET['idUsuario'])){
                    http_response_code(400);
                    echo json_encode(array("status" => "error", "message" => "algun dato vacio"));
                    exit;
                }
                $idUsuario= intval($_GET['idUsuario']);

                $resultadoFuncion = obtenerUltimoPedido($idUsuario,$conexion);

                if ($resultadoFuncion==null){
                    http_response_code(400);
                    echo json_encode(array("status" => "error", "message" => "error"));
                    exit;
                 
                }else{
                    http_response_code(200);
                    echo json_encode($resultadoFuncion);
                    exit;
                 }

            }else{
                
                if(!isset($_GET['idUsuario'])){
                    http_response_code(400);
                    echo json_encode(array("status" => "error", "message" => "algun dato vacio"));
                    exit;
                }
                $idUsuario= intval($_GET['idUsuario']);
                $resultadoFuncion = obtenerPedidos($idUsuario, $conexion);

                if ($resultadoFuncion==null){
                    http_response_code(400);
                    echo json_encode(array("status" => "error", "message" => "error"));
                    exit;
                 
                }else{
                    http_response_code(200);
                    echo json_encode($resultadoFuncion);
                    exit;
                 }

            }

            break;
        }
    
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

function obtenerUltimoPedido($idUsuario, $conexion){
    
    
    try{
        $sqlInsert="select * from pedidos where idUsuarioPedido = :idUsuario order by fechaPedido desc limit 1;";
        $consultaInsert= $conexion->prepare($sqlInsert);
        $consultaInsert ->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $consultaInsert->execute();
        
        $productos = $consultaInsert->fetch(PDO::FETCH_ASSOC);
    
        if(!$productos) {
           return null;
        }else{
            return $productos;
        }

        
    
    }catch(PDOException $e){
        
            return null;
    }
}

function obtenerPedidos($idUsuario, $conexion){
    
    
    try{
        $sqlInsert="select id, totalPedido, tipoPedido from pedidos where idUsuarioPedido = :idUsuario order by fechaPedido desc limit 3; ";
        $consultaInsert= $conexion->prepare($sqlInsert);
        $consultaInsert ->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $consultaInsert->execute();
        
        $pedidos = $consultaInsert->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($pedidos);
    
        if(!$pedidos) {
           return null;
        }else{
        
           
            foreach ($pedidos as $indice => $pedido) {
                $sqlQuery="SELECT ventas.articulosTotales, productos.nombre, productos.imagen, productos.costo, productos.costo * ventas.articulosTotales as subtotal
                FROM ventas
                JOIN productos ON ventas.idProductoVenta = productos.id
                WHERE ventas.idPedido = :idPedido";
                 $consultaInsert= $conexion->prepare($sqlQuery);
                 $consultaInsert->execute(['idPedido'=> $pedido['id']]);
                 $pedidoConsulta=$consultaInsert->fetchAll(PDO::FETCH_ASSOC);
                $pedidos[$indice]['productos'] = $pedidoConsulta;
            }
            return $pedidos;

        }

        
    
    }catch(PDOException $e){
            echo "entre al catch";
            return null;
    }
}


?>