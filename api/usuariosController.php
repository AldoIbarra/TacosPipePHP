<?php
include "../models/usuarioModel.php";

$isFill=(isset($_COOKIE['correo']))?true:false;


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        {
            /*if((isset($_COOKIE['correo']))  && (!isset($_SESSION['usuario_id']))){

                $correo = $_COOKIE["correo"];
                $contrasena = $_COOKIE["contrasena"];
                
                UsuarioClass::matchLoginCookie($correo, $contrasena);

            }*/
            //http://localhost/massivedemo/api/UsuariosController.php/?id=1
            if (isset($_GET['id'])) {
                $usuarioRespuesta=UsuarioClass::buscarUsuarioByID($_GET['id']);
                if(UsuarioClass::buscarUsuarioByID($_GET['id'])==null){
                    http_response_code(400);
                    echo json_encode(array("status" => "error", "message" => "ningun usuario encontrado"));
                }else{
                    http_response_code(200);
                    echo json_encode($usuarioRespuesta);
                }
            }
        }
        break;
    case 'POST':
        {
            
            $data = json_decode(file_get_contents('php://input'), true);

            if(isset($_SERVER['HTTP_ACTION']) && $_SERVER['HTTP_ACTION'] == 'Login'){
               
                
                extract($data);
                
                
                if(empty($correo) || empty($contrasena)){
                    http_response_code(400);
                    echo json_encode(array("message" => "algun dato vacio", "error" => "empty"));
                    exit;
                }

                $resultadoFuncion = UsuarioClass::matchLogin($correo, $contrasena, $checkSesion);

                 if ($resultadoFuncion[0]){
                    http_response_code(200);
                    echo json_encode(array("message" => "login exitoso", "error" => $resultadoFuncion[1]));
                    exit;
                   }else{
                    http_response_code(400);
                    echo json_encode(array("message" => "ocurrio un error", "error" => $resultadoFuncion[1]));
                    exit;
                    }
             
            }else{
                //ejemplo json {"correo": "gato@animal.com","contrasena": "123","nombre": "CAT","telefono","direccion":"calle 123"}
                
                extract($data);

                if(empty($correo) || empty($contrasena) || empty($nombre) || empty($direccion)){
                    http_response_code(400);
                echo json_encode(array("status" => "error", "message" => "datos vacios"));
                }

                $resultadoFuncion = UsuarioClass::registrarUsuario($correo, $contrasena, $nombre, $telefono, $direccion);

               if ($resultadoFuncion[0]){
                http_response_code(200);
                echo json_encode(array("status" => "success", "message" => $resultadoFuncion[1]));
               }else{
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => $resultadoFuncion[1]));
                exit;
                }
               }
               break;
            }
    case 'PUT':
        {
            //ejemplo json {"id":"3","correo": "gato@animal.com","contrasena": "234","nombre": "CAT","direccion":"calle 123"}
            $data = json_decode(file_get_contents('php://input'), true);
            
            extract($data);

            if(empty($correo) || empty($contrasena) || empty($id) || empty($nombre) || empty($direccion)){
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => $resultadoFuncion[1]));
                exit;
            }

            $resultadoFuncion = UsuarioClass::editarUsuario($id, $correo, $contrasena, $nombre, $direccion, $telefono);
            if ($resultadoFuncion[0]){
                http_response_code(200);
                echo json_encode(array("status" => "success", "message" => $resultadoFuncion[1]));
               }else{
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => $resultadoFuncion[1]));
            }
            break;
        }
    case 'DELETE':
        {
            /*ejemplo json{"id":2}*/
            $data = json_decode(file_get_contents('php://input'), true);
            $id = (isset($data['id']))?($data['id']):null;
            
            if(empty($id)){
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => "id vacio"));
                exit;
            }

            $resultadoFuncion = UsuarioClass::eliminarUsuario($data['id']);
            if ($resultadoFuncion[0]){
                http_response_code(200);
                echo json_encode(array("status" => "success", "message" => $resultadoFuncion[1]));
               }else{
                http_response_code(400);
                echo json_encode(array("status" => "error", "message" => $resultadoFuncion[1]));
                }
            break;
        }
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method Not Allowed"));
        break;
}

?>