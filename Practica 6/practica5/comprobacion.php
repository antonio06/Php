<?php
    session_start();

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $usuarioReal = "admin";
    $contrasenaReal = 1234;
    if ((($usuario)== $usuarioReal) && (($contrasena)== $contrasenaReal)){
        $_SESSION['conectado'] = TRUE;
        header('Location: tienda.php');
    }else{
        header('Location: login.php');
    }
           
  
