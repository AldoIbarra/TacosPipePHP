<?php
include_once '../backend/bd_conexion.php';


class ProductosCarritoClass{

    public static $conexion;

    public static function inicializarConexion() {
        self::$conexion = BD::crearInstancia();
    }

    static function registrarProducto($idCarrito, $cantidad, $productoID){
        self::inicializarConexion();
        
        try{
        $sqlInsert="call ActualizarInsertarCarrito(:idCarrito, :cantidad , :productoID )";
        $consultaInsert= self::$conexion->prepare($sqlInsert);
        $consultaInsert->execute([':productoID'=>$productoID,
                                  ':cantidad'=>$cantidad,
                                  ':idCarrito'=>$idCarrito]);
        return array(true,"insertado con exito");
        
        }catch(PDOException $e){
            if ($e->errorInfo[1] == 1062) {
                $cadena = "El producto ya esta en el carrito.";
                return array(false, $cadena);
            } else {
                return array(false, "Error al poner el producto en el carrito: " . $e->getMessage());
            }
        }
    }

    static function editarProducto($id,$cantidad){
        self::inicializarConexion();
        $producto = ProductosCarritoClass::buscarProductoByID($id);
        
    
        if($producto==null) {
           return array(false,"error en id");
        }
        try{
            $sqlUpdate="update productosCarrito set cantidad= :cantidad where idProdCarrito= :id;";
            $sentencia = self::$conexion-> prepare($sqlUpdate);
            $sentencia -> execute([ ':id'=>$id,
                                    ':cantidad'=>$cantidad
                                    ]);
            return array(true,"actualizado con exito");
        }catch(PDOException $e){
            return array(false, "Error al editar el producto del carrito: " . $e->getMessage());
        }
        

        return array(true,"actualizado con exito");
                                
    }

    static function eliminarProducto($id){
        self::inicializarConexion();
        $categoria = ProductosCarritoClass::buscarProductoByID($id);
        
    
        if($categoria==null) {
           return array(false, "error en id");
        }
        try{
        $sqlUpdate="update productosCarrito set activo = false where idProdCarrito = :id";
        $sentencia2 = self::$conexion-> prepare($sqlUpdate);
        $sentencia2 -> execute(['id'=>$id]);
            //echo '<script>alert("You have been logged out.")</script>;'
            return array(true, "eliminado exitoso");
        }catch(PDOException $e){
            return array(false, "Error al eliminar el producto del carrito: " . $e->getMessage());
        }
                                
    }

    static function buscarProductoByID($id){
        
        self::inicializarConexion();
        $sql="select * from productosCarrito where idProdCarrito=:id and activo = 1";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia -> execute(['id'=>$id]);
    
        $producto = $sentencia->fetch(PDO::FETCH_ASSOC);
        
    
        if(!$producto) {
           return null;
        }else{
            return $producto;
        }
    }

    static function buscarAllProductos($id){
        self::inicializarConexion();
        $sql="call GetProductosCarrito(:id)";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia ->bindValue(':id', $id, PDO::PARAM_INT);
        $sentencia -> execute();
        //$sentencia->bindValue(':pagina', $pagina, PDO::PARAM_INT);
        //$sentencia->execute();
        
    
        $productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
        if(!$productos) {
           return null;
        }else{
            return $productos;
        }
    }

    static function obtenerTotalCarrito($id){
        self::inicializarConexion();
        $sql="select totalCosto from carritos where id = :id ";
        $sentencia = self::$conexion-> prepare($sql);
        $sentencia ->bindValue(':id', $id, PDO::PARAM_INT);
        $sentencia -> execute();
        //$sentencia->bindValue(':pagina', $pagina, PDO::PARAM_INT);
        //$sentencia->execute();
        
    
        $productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
        if(!$productos) {
           return null;
        }else{
            return $productos;
        }
    }

}
?>