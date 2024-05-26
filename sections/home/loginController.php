<?php include_once '../../backend/bd_conexion.php';


if (session_status() == PHP_SESSION_NONE) {
    // No hay una sesión activa, así que la iniciamos
    session_start();
}

$conexion=BD::crearInstancia();

$isFill=(!isset($_COOKIE['correo']))?false:true;


if($_SERVER['REQUEST_METHOD']=='GET' && $isFill  && (!isset($_SESSION['usuario_id']))){

    $correo = $_COOKIE["correo"];
    $contrasena = $_COOKIE["contrasena"];
    
    matchLoginCookie($conexion, $correo, $contrasena);

}
 

/*if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $correo=(isset($_POST['correo']))?htmlspecialchars($_POST['correo']):null;
    $contrasena=(isset($_POST['contrasena']))?$_POST['contrasena']:null;
    $isRecordar=(isset($_POST['checkSesion']));
    var_dump($isRecordar);
    
    if(empty($correo) || empty($contrasena)){
        echo "debe llenar los campos";
        return;
    }

    matchLogin($correo, $contrasena, $conexion, $isRecordar);

}

function matchLogin($correo, $contrasena, $conexion, $isRecordar){
    $sql="call getUser(:correo)";
    $sentencia = $conexion-> prepare($sql);
    $sentencia -> execute(['correo'=>$correo]);

    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
   

    if(!$usuario) {
       return false;
    }  

    if($contrasena == $usuario["contrasena"]){
        
        $_SESSION['usuario_id']=$usuario["id"];
        
        //$_SESSION['correo']=$usuarios["CORREO"];
        $_SESSION['usuario_nombre']=$usuario["nombre"];
        $_SESSION['usuario_carrito']=$usuario["carritoID"];
        /*echo'<script type="text/javascript">
        alert("'.$_SESSION['usuario_tipo'].'");
        </script>';*/
        //echo $_SESSION['usuario_nombre'];
        //echo $_SESSION['usuario_id'];
        //header('Location: index.php');
        //echo'<script>
        //window.location.href="home.php";
        //</script>';
       /* if($isRecordar){
            setcookie('correo',$correo,time()+3600, "/");
            setcookie('contrasena',$contrasena,time()+3600, "/");            
        }
        
    }else{
        
        echo "Error en la contraseña o correo";
        //print_r($usuarios["CONTRASENA"] . "serve");
        //print_r($contrasena . "input");
        return;
    }

    //echo "todo bien";
    return true;
}*/

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

?> 