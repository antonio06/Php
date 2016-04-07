<?php

session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si") {
    $perfiles = Persona::getPerfilesPersona();
    $titulos = Actividad::getTituloActividad();
    $nombres = Persona::getNombrePersona();

    echo $twig->render('nuevoParticipante.html.twig', ["perfiles" => $perfiles, "nombres" => $nombres, "titulos" => $titulos, "email" => $_SESSION['email']]);
}else {
    header("Location: ../partePublica/actividades.php");
}
        