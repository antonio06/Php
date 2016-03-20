<?php

session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si") {
    $actividad = Actividad::getActividadByCodigo($_GET['codigo_actividad']);
    $descriptores = Actividad::getDescriptoresActividad();
    $estados = Actividad::getEstadosActividad();
    $IVA = Actividad::getIvaActividad();

    $_SESSION['codigo_actividad'] = $_GET['codigo_actividad'];
    echo $twig->render('modificarActividad.html.twig', ["actividad" => $actividad, "descriptores" => $descriptores, "estados" => $estados, "IVA" => $IVA, "email" => $_SESSION['email']]);
}