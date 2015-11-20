<?php
    session_start();

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $usuarioReal = "admin";
    $contrasenaReal = 1234;
    if ((($usuario)== $usuarioReal) && (($contrasena)== $contrasenaReal)){
        $_SESSION['conectado'] = TRUE;
        $_SESSION['contador'] = 0;
        header('Location: diccionario.php');
    }else{
        header('Location: /Practica6.php');
    }
           
  
