<?php

session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePublica');
$twig = new Twig_Environment($loader);
//$participantes = Actividad::getParticipantes();
if ($_SESSION['logeado'] == "Si") {
    $limite = 2;
    $numeroPaginas = Actividad::getNumeroPaginasParticipa($limite, $_SESSION['codigo']);
    $arrayNumeros = [];
    $auxi = 0;
    for ($i = 1; $i <= $numeroPaginas; $i++) {
        if ($auxi <= $numeroPaginas) {
            $arrayNumeros[$auxi++] = $i;
        }
    }

    if (!isset($_GET['pagina'])) {
        $pagina = 1;
        if (isset($_SESSION['paginaActividades'])) {
            $pagina = $_SESSION['paginaActividades'];
        } else {
            $_SESSION['paginaActividades'] = $pagina;
        }
        //$_SESSION['pagina'] = Actividad::getSesionPagina($pagina, $limite, $_SESSION['pagina']);
        $participantes = Actividad::getParticipantesByLimit(($pagina - 1)*$limite , $limite, $_SESSION['codigo']);
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
        echo $twig->render('misActividades.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
    } else {
        $pagina = $_GET['pagina'];
        if ($pagina > $numeroPaginas) {
            $pagina = $numeroPaginas;
        }
        $_SESSION['paginaActividades'] = $pagina;
        
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
        //$_SESSION['pagina'] = Actividad::getSesionPagina($_GET['pagina'], $limite, $_SESSION['pagina']);
        $participantes = Actividad::getParticipantesByLimit(($pagina - 1)* $limite, $limite);
        echo $twig->render('misActividades.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
    }
}else{
    header("Location: actividades.php");
}

