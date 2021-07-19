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
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

