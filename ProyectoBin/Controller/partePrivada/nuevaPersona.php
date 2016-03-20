<?php
session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si") {
    $perfilesUsuarios = Persona::getPerfiles_usuariosPersona();
    $perfiles = Persona::getPerfilesPersona();
    $sexo = Persona::getSexoPersona();
    echo $twig->render('nuevaPersona.html.twig', ["perfilesUsuarios" => $perfilesUsuarios, "perfiles" => $perfiles, "sexo" => $sexo, "email" => $_SESSION['email']]);
}
