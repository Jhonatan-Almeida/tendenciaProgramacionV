<?php
session_start();
?>
<?php require_once 'conexion.php'; ?>
<?php //require_once 'includes/funciones.php'; ?>
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
                    <li><a href="#">Animales</a></li>
                    <li><a href="#">Medicina</a></li>
                    <li><a href="#">Motos</a></li>
                    <li><a href="#">Cerrar</a></li>
                </ul>
            </nav>
            <div class="limpiarFlotantes"></div>
        </header>
        <div id="contenedor">