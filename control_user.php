<?php include_once './backend/bd_conexion.php';
$conexion=BD::crearInstancia(); 

switch($_SERVER["REQUEST_METHOD"]=="POST"){
    case "POST":
        print_r($_POST);
    default:
    echo "nose";
}

print_r($_POST);

$consultaSelect= $conexion->prepare("SELECT * FROM usuarios");
$consultaSelect->execute();
$listaUsuarios=$consultaSelect->fetchAll();

print_r($listaUsuarios);

?> 