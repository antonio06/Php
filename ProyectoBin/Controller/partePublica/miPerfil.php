<?php
session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePublica');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si") {
    $persona = Persona::getPersonaByCodigo($_SESSION['codigo_persona']);

    echo $twig->render('miPerfil.html.twig', ["persona" => $persona, "email" => $_SESSION['email']]);
}

