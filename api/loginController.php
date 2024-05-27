<?php 
include 'C:\xampp\htdocs\TacosPipePHP\backend\bd_conexion.php';


if (session_status() == PHP_SESSION_NONE) {
    
    session_start();
}

$conexion=BD::crearInstancia();

$isFill=(!isset($_COOKIE['correo']))?false:true;


if($_SERVER['REQUEST_METHOD']=='GET' && $isFill  && (!isset($_SESSION['usuario_id']))){

    $correo = $_COOKIE["correo"];
    $contrasena = $_COOKIE["contrasena"];
    
    matchLoginCookie($conexion, $correo, $contrasena);

}

if($_SERVER['REQUEST_METHOD']=='POST'){

    $email = $_POST['email'];

    $data = json_decode(file_get_contents('php://input'), true);
                
    $resultadoFuncion = buscarUsuarioByCorreo($email);

    if ($resultadoFuncion){
        http_response_code(200);
        $json_response = ["success" => true];
        echo json_encode($json_response);
    }else{
        http_response_code(400);
        $json_response = ["error" => true];
        echo json_encode($json_response);
    }
    exit;

}
 

function matchLoginCookie($conexion, $correo, $contrasena){
    $sql="call getUser(:correo)";
    $sentencia = $conexion-> prepare($sql);
    $sentencia -> execute(['correo'=>$correo]);
    

    $usuario = $sentencia->fetch();
    

    if(!$usuario) {
        echo "error en correo";
        return false;
    }

    if($contrasena == $usuario["contrasena"]){
        
        $_SESSION['usuario_id']=$usuario["id"];
        $_SESSION['usuario_nombre']=$usuario["nombre"];
        $_SESSION['usuario_carrito']=$usuario["carritoID"];
        $_SESSION['usuario_direccion']=$usuario["direccion"];

        setcookie('correo',$correo,time()+3600,"/");
        setcookie('contrasena',$contrasena,time()+3600,"/");

        /*echo '<script>
        alert("Bienvenido de nuevo");
        window.location.href="../dashboard/dashboard.php"
        </script>';*/

    }else{
        echo "Error en la contraseña o correo";
    }
}

//funcion agregada buscar por correo
function buscarUsuarioByCorreo($correo){
        
    $conexion=BD::crearInstancia();
    $sql="select * from usuarios where correo= :correo;";
    $sentencia = $conexion-> prepare($sql);
    $sentencia -> execute([':correo'=>$correo]);

    $usuario = $sentencia->fetch();
    

    if(!$usuario) {
       return false;
    }else{
        return true;
    }
}

?> 