<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/BinDb.php';
require_once '../Model/Persona.php';
require_once '../Model/UsuariosContrasena.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);
$codigos = Persona::getCodigosPersona();
$perfiles = Persona::getPerfilesPersona();
$usuariosContrasenas = UsuariosContrasena::getUsuariosContrasenas();


echo $twig->render('gestionAdminContrasena.html.twig', ["codigos" => $codigos , "perfiles" => $perfiles, "usuariosContrasenas" => $usuariosContrasenas]);

