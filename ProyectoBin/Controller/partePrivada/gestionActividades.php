<?php

session_start();

require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
$limite = 2;
$numeroPaginas = Actividad::getNumeroPaginas($limite);
$descriptores = Actividad::getDescriptoresActividad();
$estados = Actividad::getEstadosActividad();
$arrayNumeros = [];
$auxi = 0;
for ($i = 1; $i <= $numeroPaginas; $i++) {
    if ($auxi <= $numeroPaginas) {
        $arrayNumeros[$auxi++] = $i;
    }
}

if (!isset($_GET['pagina'])) {
    $pagina = 1;

    $_SESSION['pagina'] = Actividad::getSesionPagina($pagina, $limite, $_SESSION['pagina']);
    $actividades = Actividad::getActividadesByLimit($_SESSION['pagina'], $limite);
    echo $twig->render('gestionActividades.html.twig', ["actividades" => $actividades, "arrayNumeros" => $arrayNumeros, "descriptores"=> $descriptores, "estados"=> $estados,]);
} else {
    $_SESSION['pagina'] = Actividad::getSesionPagina($_GET['pagina'], $limite, $_SESSION['pagina']);
    $actividades = Actividad::getActividadesByLimit($_SESSION['pagina'], $limite);
    echo $twig->render('gestionActividades.html.twig', ["actividades" => $actividades, "arrayNumeros" => $arrayNumeros, "descriptores"=> $descriptores, "estados"=> $estados,]);
}


