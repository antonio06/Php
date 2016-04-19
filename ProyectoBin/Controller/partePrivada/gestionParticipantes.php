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
    $codigo_persona = "";
    $numeroPaginas = Actividad::getNumeroPaginasParticipa($limite, $codigo_persona);
    $arrayNumeros = [];
    $auxi = 0;
    for ($i = 1; $i <= $numeroPaginas; $i++) {
        if ($auxi <= $numeroPaginas) {
            $arrayNumeros[$auxi++] = $i;
        }
    }

    if (!isset($_GET['pagina'])) {
        $pagina = 1;
        if (isset($_SESSION['paginaParticipantes'])) {
            $pagina = $_SESSION['paginaParticipantes'];
        } else {
            $_SESSION['paginaParticipantes'] = $pagina;
        }
        $codigo_persona = "";
        $participantes = Actividad::getParticipantesByLimit($pagina - 1, $limite, $codigo_persona);
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
        if ($perfil_usuario == "Administrador") {
            $_SESSION['esAdministrador'] = "Si";
            echo $twig->render('gestionParticipantes.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email'], "esAdministrador" => $_SESSION['esAdministrador']]);
        } else {
            echo $twig->render('gestionParticipantes.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
        }
    } else {
        $pagina = $_GET['pagina'];
        $_SESSION['paginaParticipantes'] = $pagina;
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
        $codigo_persona = "";
        $participantes = Actividad::getParticipantesByLimit($pagina - 1, $limite, $codigo_persona);
        if ($perfil_usuario == "Administrador") {
            $_SESSION['esAdministrador'] = "Si";
            echo $twig->render('tablaParticipantes.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email'], "esAdministrador" => $_SESSION['esAdministrador']]);
        } else {
            echo $twig->render('tablaParticipantes.html.twig', ["participantes" => $participantes, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
        }
    }
} else {
    header("Location: ../partePublica/actividades.php");
}