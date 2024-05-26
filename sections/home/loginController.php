<?php include_once '../../backend/bd_conexion.php';


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
function buscarUsuarioByCorreo($correo,){
        
    $conexion=BD::crearInstancia();
    $sql="select * from usuarios where correo= :correo:";
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