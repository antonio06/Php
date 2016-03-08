<?php

// Cargamos la librería de twig y las clases de la base de datos de BindDB y 
// de la clase de actividad
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
$personas = Persona::getPersonas();
echo $twig->render('gestionPersonas.html.twig', ["personas" => $personas]);

