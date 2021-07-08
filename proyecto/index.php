<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<html>
    <head>
        <title>Tendencia Programación BLOG Proyecto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="screen" type="text/css" href="./assets/css/style.css">
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
            
        </header>
        <div id="contenedor">
            <aside id="sidebar">
            <div id="usuario_logeado" class="bloque">
                <h3> Identificate </h3>
                    <form action="#" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Constraseña</label>
                        <input type="password" name="password">
                        <input type="submit" value="Enviar">
                    </form>
                <h3> Registrate </h3>
                    <form action="#" method="POST">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" placeholder="Ingrese el nombre" required="required">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" placeholder="Ingrese los apellidos" required="required">
                        <label for="email">Correo</label>
                        <input type="email" name="email" placeholder="ejemplo@dominio.com">
                        <label for="password">Constraseña</label>
                        <input type="password" name="password" required="required">
                        <input type="submit" value="Registrar">
                    </form>
               
            </div>
            
            </aside>
            <div id="principal">
                <article>
                    <a href="#" >
                        <h2>Titulo del Articulo</h2>
                        <samp class="fecha">07-julio-2021</samp>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                        </p>
                    </a>
                </article>
            </div>
            
        </div>
        <footer>
            <p>Derechos recervados del ISTJBA-Tendenicas de Programación &copy; 2021</p>
        </footer>
    </body>
</html>