<?php
include_once '../backend/bd_conexion.php';
session_start();

class ProductoClass{

    public static $conexion;

    public static function inicializarConexion() {
        self::$conexion = BD::crearInstancia();
    }

    static function buscarAllProductos(){
        
        self::inicializarConexion();
        $sql="select* from productos where activo = 1";
        
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute([]);        
    
        $productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
        if(!$productos) {
           return null;
        }else{
            return $productos;
        }
    }

    static function buscarByCategoria($categoria){
        
        self::inicializarConexion();
        $sql="select* from productos where activo = 1 and categoria = :categoria";
        
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute([':categoria'=> $categoria]);
        
        $productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
        if(!$productos) {
           return null;
        }else{
            return $productos;
        }
    }

}
?>