<?php

session_start();

require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePrivada');
$twig = new Twig_Environment($loader);
if ($_SESSION['logeado'] == "Si") {
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
        if (isset($_SESSION['paginaPersonas'])) {
            $pagina = $_SESSION['paginaPersonas'];
        } else {
            $_SESSION['paginaPersonas'] = $pagina;
        }
        $personas = Persona::getPersonasByLimit($pagina - 1, $limite);
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);

        if ($perfil_usuario == "Administrador") {
            $_SESSION['esAdministrador'] = "Si";
            echo $twig->render('gestionPersonas.html.twig', ["personas" => $personas, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email'], "esAdministrador" => $_SESSION['esAdministrador']]);
        } else {
            echo $twig->render('gestionPersonas.html.twig', ["personas" => $personas, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
        }
    } else {
        $pagina = $_GET['pagina'];
        $_SESSION['paginaPersonas'] = $pagina;
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
        $personas = Persona::getPersonasByLimit($pagina, $limite);
        if ($perfil_usuario == "Administrador") {
            $_SESSION['esAdministrador'] = "Si";
            echo $twig->render('tablaPersonas.html.twig', ["personas" => $personas, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email'], "esAdministrador" => $_SESSION['esAdministrador']]);
        } else {
            echo $twig->render('tablaPersonas.html.twig', ["personas" => $personas, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
        }
    }
} else {
    header("Location: ../partePublica/actividades.php");
}


