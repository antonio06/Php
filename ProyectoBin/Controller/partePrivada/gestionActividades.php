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
    $limite = 2;
    $numeroPaginas = Actividad::getNumeroPaginas($limite);
    $listaDescriptores = Actividad::getDescriptoresActividad();
    $listaEstados = Actividad::getEstadosActividad();
    $arrayNumeros = [];
    $listaIVA = Actividad::getIvaActividad();
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
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);

        $actividades = Actividad::getActividadesByLimit(($pagina - 1)*$limite , $limite);
        if ($perfil_usuario == "Administrador") {
            $_SESSION['esAdministrador'] = "Si";
            echo $twig->render('gestionActividades.html.twig', ["actividades" => $actividades,
                "arrayNumeros" => $arrayNumeros,
                "descriptores" => $listaDescriptores,
                "estados" => $listaEstados,
                "email" => $_SESSION['email'],
                "esAdministrador" => $_SESSION['esAdministrador'],
                "IVA" => $listaIVA,
                "pagina" => $pagina
            ]);
        } else {
            echo $twig->render('gestionActividades.html.twig', ["actividades" => $actividades,
                "arrayNumeros" => $arrayNumeros,
                "descriptores" => $listaDescriptores,
                "estados" => $listaEstados,
                "email" => $_SESSION['email'],
                "IVA" => $listaIVA,
                "pagina" => $pagina
            ]);
        }
    } else {
        $pagina = $_GET['pagina'];
        if ($pagina > $numeroPaginas) {
            $pagina = $numeroPaginas;
        }
        $_SESSION['paginaActividades'] = $pagina;
        $perfil_usuario = Persona::getPerfil_usuarioByEmail($_SESSION['email']);
        $actividades = Actividad::getActividadesByLimit(($pagina - 1)* $limite, $limite);
        if ($perfil_usuario == "Administrador") {
            $_SESSION['esAdministrador'] = "Si";
            echo $twig->render('tablaActividades.html.twig', ["actividades" => $actividades,
                "arrayNumeros" => $arrayNumeros,
                "descriptores" => $listaDescriptores,
                "estados" => $listaEstados,
                "email" => $_SESSION['email'],
                "esAdministrador" => $_SESSION['esAdministrador'],
                "IVA" => $listaIVA,
                "pagina" => $pagina
            ]);
        } else {
            echo $twig->render('tablaActividades.html.twig', ["actividades" => $actividades,
                "arrayNumeros" => $arrayNumeros,
                "descriptores" => $listaDescriptores,
                "estados" => $listaEstados,
                "email" => $_SESSION['email'],
                "IVA" => $listaIVA,
                "pagina" => $pagina
            ]);
        }
    }
} else {
    header("Location: ../partePublica/actividades.php");
}

