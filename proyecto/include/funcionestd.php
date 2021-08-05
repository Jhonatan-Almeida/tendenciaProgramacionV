<?php

function mostrarError($error,$campo){
    $alerta='';
    //       $errores["nombre"]
    if(isset($error[$campo]) && !empty($campo)){
        $alerta="<div class='alerta alerta-error'>".$error[$campo]."</div>"; 
    }
    return $alerta;
}
function borrarErrores(){
    $borrado = false;
    if (isset($_SESSION['errores'])){
        $_SESSION['errores']=null;
        $borrado = true;
    }
    if (isset($_SESSION['completado'])){
        $_SESSION['completado']=null;
        $borrado = true;
    }
    if (isset($_SESSION['error_login'])){
        $_SESSION['error_login']=null;
        $borrado = true;
    }
    if (isset($_SESSION['completo_categoria'])){
        $_SESSION['completo_categoria']=null;
        $borrado = true;
    }
    if (isset($_SESSION['error_login'])){
        $_SESSION['error_login']=null;
        $borrado = true;
    }
}
function conseguirCategoria($conexion){
    $sql = "select * from categorias order by id ASC";
    $categorias=  mysqli_query($conexion, $sql);
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias)>=1){
        $resultado = $categorias;
    }
    return $resultado;
}
function conseguirCategorias($conexion){
    $sql = "select * from categorias";
    $categorias=  mysqli_query($conexion, $sql);
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias)>=1){
        $resultado = $categorias;
    }
    return $resultado;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

