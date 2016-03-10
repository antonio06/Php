<?php
session_start();
require_once '../twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);

$_SESSION['codigo_actividad'] = $_GET['codigo_actividad'];

echo $twig->render('borrarActividad.html.twig', []);


