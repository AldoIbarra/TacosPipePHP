<?php include_once './backend/bd_conexion.php';
$conexion=BD::crearInstancia(); 

switch($_SERVER["REQUEST_METHOD"]){
    case "POST":
        //print_r($_POST);
        $correo=(isset($_POST['correo']))?$_POST['correo']:null;
        $contrasena=(isset($_POST['password']))?$_POST['password']:null;
        $nombre= (isset($_POST['nombre']))?$_POST['nombre']:null;
        $telefono= (isset($_POST['telefono']))?$_POST['telefono']:null;
        $direccion= (isset($_POST['direccion']))?$_POST['direccion']:null;

        //echo $correo;

        $sqlInsert="insert into usuarios (correo, contrasena, nombre, telefono, direccion) values (:correo, :contrasena, :nombre, :telefono, :direccion);";
        $consultaInsert= $conexion->prepare($sqlInsert);
        $consultaInsert->execute(array(
        ':correo'=> $correo,
        ':contrasena'=>$contrasena,
        ':nombre'=>$nombre,
        ':telefono'=>$telefono,
        ':direccion'=>$direccion
        ));

        echo'<script type="text/javascript">
        alert("Registrado con exito");
        window.location.href="index.php";
        </script>';

        break;

    default:
    echo "nose";
    break;  
}

/*print_r($_POST);

$consultaSelect= $conexion->prepare("SELECT * FROM usuarios");
$consultaSelect->execute();
$listaUsuarios=$consultaSelect->fetchAll();

print_r($listaUsuarios);*/

?> 