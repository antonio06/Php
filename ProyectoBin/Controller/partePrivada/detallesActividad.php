<?php

session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si") {
    if (isset($_GET['codigo_actividad'])) {
        $actividad = Actividad::getActividadByCodigo($_GET['codigo_actividad']);
        $_SESSION['codigo_actividad'] = $_GET['codigo_actividad'];
        if ($actividad) {
            echo $actividad->toJSON();
        } else {
            echo json_encode($actividad);
        }
    }
} else {
    header("Location: ../partePublica/actividades.php");
}