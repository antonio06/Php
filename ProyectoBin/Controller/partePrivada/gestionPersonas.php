<?php

session_start();

// Cargamos la librería de twig y las clases de la base de datos de BindDB y 
// de la clase de actividad
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
//$personas = Persona::getPersonas();
$limite = 2;
$numeroPaginas = Persona::getNumeroPaginas($limite);

$arrayNumeros = [];
$auxi = 0;
for ($i = 1; $i <= $numeroPaginas; $i++) {
    if ($auxi <= $numeroPaginas) {
        $arrayNumeros[$auxi++] = $i;
    }
}

if (!isset($_GET['pagina'])) {
    $pagina = 1;
    $_SESSION['pagina'] = Persona::getSesionPagina($pagina, $limite, $_SESSION['pagina']);
    $personas = Persona::getPersonasByLimit($_SESSION['pagina'], $limite);
    echo $twig->render('gestionPersonas.html.twig', ["personas" => $personas, "arrayNumeros" => $arrayNumeros]);
} else {
    $_SESSION['pagina'] = Persona::getSesionPagina($pagina, $limite, $_SESSION['pagina']);
    $personas = Persona::getPersonasByLimit($_SESSION['pagina'], $limite);
    echo $twig->render('gestionPersonas.html.twig', ["personas" => $personas, "arrayNumeros" => $arrayNumeros]);
}



