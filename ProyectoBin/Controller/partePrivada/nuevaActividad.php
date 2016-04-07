<?php
session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si") {
    $descriptores = Actividad::getDescriptoresActividad();
    $estados = Actividad::getEstadosActividad();
    $IVA = Actividad::getIvaActividad();

    echo $twig->render('nuevaActividad.html.twig', ["descriptores" => $descriptores, "estados" => $estados, "IVA" => $IVA, "email" => $_SESSION['email']]);
}else {
    header("Location: ../partePublica/actividades.php");
}