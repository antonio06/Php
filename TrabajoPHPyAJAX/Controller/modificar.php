<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/ActividadesDB.php';
require_once '../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

$actividad = Actividad::getActividadByCodigo($_GET['codigo']);

echo $twig->render('formularioModificar.html.twig', ["actividad" => $actividad]);

