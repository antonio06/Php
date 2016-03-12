<?php

require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
$perfilesUsuarios = Persona::getPerfiles_usuariosPersona();
$perfiles = Persona::getPerfilesPersona();

echo $twig->render('nuevaPersona.html.twig', ["perfilesUsuarios"=> $perfilesUsuarios, "perfiles"=> $perfiles]);

