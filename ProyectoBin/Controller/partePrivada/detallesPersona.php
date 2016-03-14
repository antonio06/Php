<?php

require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
$persona = Persona::getPersonaByCodigo($_GET['codigo_persona']);

echo $twig->render('detallesPersona.html.twig', ["persona" => $persona]);

