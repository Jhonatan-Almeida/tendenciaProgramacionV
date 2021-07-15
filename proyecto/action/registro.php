<?php
$errores = array_();
if(isset($_POST)){
     require_once '../include/conexion.php';
}

$nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
$apellido = isset($_POST['apellidos']) ? $_POST['apellidos']:false;
$email = isset($_POST['email']) ? $_POST['email']:false;
$password = isset($_POST['password']) ? $_POST['password']:false;

// validar los elementos

if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
    $nombre_valido = true;
}else{
    $nombre_valido = false;
    $errores["nombre"]="El nombre Ingresado es incorrecto";
    /*
     * $errores{
     *         "nombre"=>"El nombre Ingresado es incorrecto",
     *          "direccion"=>"Guaranda",
     *          "celular"=>"099999999"
     * }
     */
}


