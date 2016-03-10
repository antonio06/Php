<?php

require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
$actividad = Actividad::getActividadByCodigo($_GET['codigo_actividad']);

echo $twig->render('detallesActividad.html.twig', ["actividad" => $actividad]);