<?php
//incluir a la conexión de la base de datos
require_once '../include/conexion.php';
//limpiar datos antiguos
if(!isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']);
    }


//recoger los datos del formulario
if(isset($_POST)){
    if(!isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']);
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    //consulta de las credenciales a la base de datos

    $sql = "select * from usuarios where email = '$email'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1){
      $usuario = mysqli_fetch_array($login);
      // comprobar la contraseña
      $verify = password_verify($password, $usuario['password']);
      if ($verify){
          // Utilizamos la variable de sesion para almacenar el usuario.
          $_SESSION['usuario']= $usuario;
      }else{
          // utilizamos una variable de sesion para almacenar el error
          $_SESSION['error_login'] = "Login Incorrecto"; 
      }
    }else{
        $_SESSION['error_login'] = "La consulta no fue realizada";
    }
}
header("Location: ../index.php");
 

