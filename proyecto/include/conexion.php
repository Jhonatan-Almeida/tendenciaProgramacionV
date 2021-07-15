<?php

//conexion
$servidor= "localhost";
$base="blog";
$usuario="root";
$password="";
$db = mysqli_connect($servidor,$usuario,$password,$base) or die("Ha fallado la conexión....!");

//isset 0 empty
if (isset($db)){
    session_start();
}


