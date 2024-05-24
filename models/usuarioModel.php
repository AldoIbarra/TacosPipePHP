<?php
include_once '../backend/bd_conexion.php';

if (session_status() == PHP_SESSION_NONE) {
    // No hay una sesión activa, así que la iniciamos
    session_start();
}
class UsuarioClass{

    public static $conexion;

    public static function inicializarConexion() {
        self::$conexion = BD::crearInstancia();
    }

    static  function matchLogin($correo, $contrasena, $isRecordar){
        self::inicializarConexion();

        try{
        $sql="call getUser(:correo)";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute(['correo'=>$correo]);
    
        $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
        
    
        if(!$usuario) {
           return array(false, "error en correo");
        }  
    
        if($contrasena === $usuario["contrasena"]){
            
            $_SESSION['usuario_id']=$usuario["id"];
            $_SESSION['usuario_nombre']=$usuario["nombre"];
            $_SESSION['usuario_carrito']=$usuario["carritoID"];
            
            if($isRecordar){
                setcookie('correo',$correo,time()+3600, "/");
                setcookie('contrasena',$contrasena,time()+3600, "/");            
            }
            return array(true,"sesion iniciada con exito");
        }else{
            
            return array(false, "error en contraseña");
        }
        }catch(PDOException $e){
        return array(false, "Error al insertar usuario: " . $e->getMessage());
     }
    }

    static function registrarUsuario($correo, $contrasena, $nombre, $telefono, $direccion){
        self::inicializarConexion();
        
        try{
        $sqlInsert="insert into usuarios (correo, contrasena, nombre, telefono, direccion) values (:correo, :contrasena, :nombre, :telefono, :direccion);";
        $consultaInsert= self::$conexion->prepare($sqlInsert);
        $consultaInsert->execute(array(
        ':correo'=> $correo,
        ':contrasena'=>$contrasena,
        ':nombre'=>$nombre,
        ':telefono'=>$telefono,
        ':direccion'=>$direccion
        ));

       
        setcookie('correo',$correo,time()+3600, "/");
        setcookie('contrasena',$contrasena,time()+3600, "/");
        return array(true,"insertado con exito");
        
        }catch(PDOException $e){
            if ($e->errorInfo[1] == 1062) {
                $cadena = "El correo electrónico ya está en uso.";
                return array(false, $cadena);
            } else {
                // Otro tipo de error
                return array(false, "Error al insertar usuario: " . $e->getMessage());
            }
        }
    }

    static function editarUsuario($id, $correo, $contrasena, $nombre, $telefono, $direccion){
        self::inicializarConexion();
        $usuario = UsuarioClass::buscarUsuarioByID($id);
        
    
        if($usuario==null) {
           return array(false,"error en id");
        }

        $sqlUpdate="update usuarios set correo = :correo, contrasena = :contrasena, nombre= :nombre, telefono= :telefono, direccion= :direccion ";
        $sentencia2 = self::$conexion-> prepare($sqlUpdate);
        $sentencia2 -> execute(['correo'=>$correo],
                                ['contrasena'=>$contrasena],
                                ['nombre'=>$nombre],
                                ['telefono'=>$telefono],
                                ['direccion'=>$direccion]);

        return array(true,"actualizado con exito");
                                
    }

    static function eliminarUsuario($id){
        self::inicializarConexion();
        $usuario = UsuarioClass::buscarUsuarioByID($id);
        
    
        if($usuario==null) {
           return array(false, "error en id");
        }

        $sqlUpdate="update usuarios set activo = false where id = :id";
        $sentencia2 = self::$conexion-> prepare($sqlUpdate);
        $sentencia2 -> execute(['id'=>$id]);

        setcookie('correo','',-1, '/');
            setcookie('contrasena','',-1, '/');
            //echo '<script>alert("You have been logged out.")</script>;'
            if(session_status()==PHP_SESSION_NONE){
                session_start();
            }
            session_destroy();

        return array(true, "eliminado exitoso");
                                
    }

    static function buscarUsuarioByID($id){
        
        self::inicializarConexion();
        $sql="select * from usuarios where id=:id";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute(['id'=>$id]);
    
        $usuario = $sentencia->fetch();
        
    
        if(!$usuario) {
           return null;
        }else{
            return $usuario;
        }
    }

    static function matchLoginCookie($correo, $contrasena){
        $sql="call getUser(:correo)";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute(['correo'=>$correo]);
    
        $usuario = $sentencia->fetch();
    
        if(!$usuario) {
            echo "error en correo";
            return;
        }
    
        if($contrasena == $usuario["contrasena"]){
            
            $_SESSION['usuario_id']=$usuario["id"];
            $_SESSION['usuario_nombre']=$usuario["nombre"];
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

}

?>