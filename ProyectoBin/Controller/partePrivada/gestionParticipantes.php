<?php

session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
//$participantes = Actividad::getParticipantes();
if ($_SESSION['logeado'] == "Si") {
    $limite = 2;
    $numeroPaginas = Actividad::getNumeroPaginasParticipa($limite);
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
        $codigo_persona = "";
        $participantes = Actividad::getParticipantesByLimit($_SESSION['pagina'], $limite, $codigo_persona);
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
        if ($perfil_usuario == "Administrador") {
        $_SESSION['esAdministrador'] = "Si";
            echo $twig->render('gestionParticipantes.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email'], "esAdministrador" => $_SESSION['esAdministrador']]);
        }else{
            echo $twig->render('gestionParticipantes.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
        }
    } else {
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
        $_SESSION['pagina'] = Actividad::getSesionPagina($_GET['pagina'], $limite, $_SESSION['pagina']);
        $codigo_persona = "";
        $participantes = Actividad::getParticipantesByLimit($_SESSION['pagina'], $limite, $codigo_persona);
        if ($perfil_usuario == "Administrador") {
        $_SESSION['esAdministrador'] = "Si";
            echo $twig->render('gestionParticipantes.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email'], "esAdministrador" => $_SESSION['esAdministrador']]);
        }else{
            echo $twig->render('gestionParticipantes.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
        }
        
    }
}