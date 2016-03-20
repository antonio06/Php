<?php

session_start();
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
$email = $_POST['email'];
$password = Persona::getPasswordByEmail($email);
$contrasenaIntroducida = $_POST['password'];
$perfil_usuario = Persona::getPerfil_usuarioByEmail($email);
if (password_verify($contrasenaIntroducida, $password)) {
    if (($perfil_usuario == "Administrador") || ($perfil_usuario == "Limitado")) {
        $_SESSION['email'] = $email;
        $_SESSION['logeado'] = "Si";
        header("Location: ../partePrivada/panelPrincipal.php");
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['logeado'] = "Si";
        header("Location: actividades.php");
    }
} else {
    header("Location: formulario_login.php");
}