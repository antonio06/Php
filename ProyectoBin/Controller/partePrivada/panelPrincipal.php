<?php
session_start();
require_once '../twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si"){
    $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
    if ($perfil_usuario == "Administrador") {
        $_SESSION['esAdministrador'] = "Si";
        echo $twig->render('panelPrincipal.html.twig', ["email" => $_SESSION['email'], "esAdministrador" => $_SESSION['esAdministrador']]);
    }else{
        echo $twig->render('panelPrincipal.html.twig', ["email" => $_SESSION['email']]);
    }
}
