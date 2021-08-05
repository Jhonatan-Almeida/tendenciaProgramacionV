<?php
session_start();
 if (isset($_POST)){
     // conexion a la base de datos 
     require_once './include/conexion.php';
     
 $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
 
 $errores = array();
  // validar nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_valido = true;
    }else{
        $nombre_valido = false;
        $errores['nombre']= "El nombre ingresado es incorrecto";
    }
    // Insertar a la base de datos
    if (count($errores)==0){
        $sql = "Insert into categorias value(null, '$nombre') ";
        $guardar = mysqli_query($db, $sql);
        if($guardar){
            $_SESSION['completo_categoria'] = "Se guardo correctamente la categoria";
        }else{
            $_SESSION['error_categoria']= "Fallo guardado de categoria";
        }
    }
 }
 header("Location: index.php");
// insert into nombre_tabla(campos) 