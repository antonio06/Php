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
    $nombre = Persona::getCodigoPersonabyNombre($_POST['nombre']);

    $codigo = Actividad::getCodigoActividadByTitulo($_POST['titulo']);

    $perfil = Persona::getCodigoPerfilbyDescripcion($_POST['perfil']);

    Actividad::insertParticipantes($nombre, $codigo, $perfil);

    header("Location: gestionParticipantes.php");
}