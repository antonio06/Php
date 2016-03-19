<?php
session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);

switch ($_POST['opcion']) {
    case "borrar":
        Actividad::deleteParticipa($_SESSION['codigo_persona']);
        header('Location: gestionParticipantes.php');
        break;
    case "cancelar":
        header('Location: gestionParticipantes.php');
        break;
    default :
}

