<?php
$errores = array();
if(isset($_POST)){
     require_once '../include/conexion.php';
     if(!isset($_SESSION)){
         session_start();
     }

//if(isset($_POST['nombre'])){
//    $nomgre= $_POST['nombre'];
//}else{
//    $nombre = false;
//}
$nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
$apellido = isset($_POST['apellidos']) ? $_POST['apellidos']:false;
$email = isset($_POST['email']) ? $_POST['email']:false;
$password = isset($_POST['password']) ? $_POST['password']:false;
}
// validar los elementos

if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
    $nombre_valido = true;
}else{
    $nombre_valido = false;
    $errores["nombre"]="El nombre Ingresado es incorrecto";
    /*
     * $errores{
     *         "nombre"=>"El nombre Ingresado es incorrecto",
     *          "apellido"=>"El apellido Ingresado es incorrecto",
     *          "email"=>"El correo espcificado no cumple con la configuración"
     * }
     */ 
}
if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
    $apellido_valido = true;
}else{
    $apellido_valido = false;
    $errores["apellido"]="El apellido Ingresado es incorrecto";
}
if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_valido = true;
}else{
    $email_valido = false;
    $errores["email"]="El correo espcificado no cumple con la configuración";
}
if(!empty($password)){
    $password_valido = true;
}else{
    $password_valido = false;
    $errores["password"]="Debe ingresar una contraseña";
}
$guardar_usuario = false;
if (count($errores)== 0){
    $guardar_usuario = true;
    //cifrar la contraseña md5 sha hash  password_hash
    $password_segura = password_hash($password, PASSWORD_BCRYPT,['cost'=>4]);
    $sql = "insert into usuarios values(null,'$nombre','$apellido','$email','$password_segura',CURDATE());";
    //echo $sql; die();
    $guardar = mysqli_query($db, $sql);
    if($guardar){
        $_SESSION['completado']= 'El registro se guardo con exito';
    }else{
        $_SESSION['errores']['general']= 'Fallo al guardar el registro';
    }
    
}else{
    $_SESSION['errores']=$errores;
}

// Hace que nos devolvamos al index principal
header("Location:../index.php");


