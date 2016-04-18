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
        case "modificar":
            $actividad = new Actividad($_SESSION['codigo_actividad'], $_POST['titulo'],
                $_POST['estado'], $_POST['coordinador'], $_POST['ponente'],
                $_POST['ubicacion'], $_POST['fecha_inicio'],
                $_POST['fecha_fin'], $_POST['horario_inicio'],
                $_POST['horario_fin'], $_POST['n_Total_Horas'],
                $_POST['precio'], $_POST['IVA'],
                $_POST['descriptor'], $_POST['observaciones']);
            $actividad->update();
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
 