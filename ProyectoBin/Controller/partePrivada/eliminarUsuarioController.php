<?php
session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/UsuariosContrasena.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);

switch ($_POST['opcion']) {
    case "borrar":
        $usuariosContrasenas = new UsuariosContrasena($_SESSION['codigo_persona'], "", "", "");
        $usuariosContrasenas->delete();
        
        header('Location: gestionAdminContrasena.php');
        break;
    case "cancelar":
        header('Location: gestionAdminContrasena.php');
        break;
    default :
}

