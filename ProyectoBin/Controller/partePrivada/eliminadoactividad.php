<?php

session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si") {
    switch ($_POST['opcion']) {
        case "borrar":
            $actividad = new Actividad($_SESSION['codigo_actividad'], "", "", "", "", "", "", "", "", "", "", "", "", "", "");
            $actividad->delete();

            header('Location: gestionActividades.php');
            break;
        case "cancelar":
            header('Location: gestionActividades.php');
            break;
        default :
    }
}else {
    header("Location: ../partePublica/actividades.php");
}
