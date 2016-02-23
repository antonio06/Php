<?php
// Cargamos la librería de twig y las clases de la base de datos de BindDB y 
// de la clase de actividad
require_once 'twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);
echo $twig->render('formulario_login.html.twig', []);

