<?php
session_start();
?>
<?php require_once 'conexion.php'; ?>
<?php require_once 'include/funcionestd.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mejorando Interface</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="screen" type="text/css" href="./assets/css/styletd.css">
    </head>
    <body>
        <header id="cabecera">
            <div id="logo">
                <a href="index.php">
                    Tendencia Programación BLOG Proyecto
                </a>
            </div>
            <nav id="menu">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <?php 
                    $categorias = conseguirCategoria($db);
                    if (!empty($categorias)):
                        while ($categoria = mysqli_fetch_assoc($categorias)):  // mysql_fetch_assoc nos sive para hacer un arreglo asociativo
                        ?>
                    <li><a href="categoria.php?id =<?= $categoria['id']; ?>"><?= $categoria['nombre'];?> </a></li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                    <li><a href="#">Cerrar</a></li>
                </ul>
            </nav>
            <div class="limpiarFlotantes"></div>
        </header>
        <div id="contenedor">