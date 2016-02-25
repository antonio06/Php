<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/BinDb.php';
require_once '../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

$_POST['codigo'];
$_POST['user'];
$_POST['password'];
$_POST['perfil'];