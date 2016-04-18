<?php

session_start();
// Cargamos la librería de twig y las clases de la base de datos de BindDB y 
// de la clase de actividad
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePublica');
$twig = new Twig_Environment($loader);
$listaDescriptores = Actividad::getDescriptoresActividad();

$listaEstados = Actividad::getEstadosActividad();
$limite = 2;
$numeroPaginas = Actividad::getNumeroPaginas($limite);
$arrayNumeros = [];
$auxi = 0;

for ($i = 1; $i <= $numeroPaginas; $i++) {
    if ($auxi <= $numeroPaginas) {
        $arrayNumeros[$auxi++] = $i;
    }
}
if (isset($_SESSION['logeado'])) {
    if (!isset($_GET['pagina'])) {
        $pagina = 1;
        if (isset($_SESSION['paginaActividades'])) {
            $pagina = $_SESSION['paginaActividades'];
        } else {
            $_SESSION['paginaActividades'] = $pagina;
        }
        $actividades = Actividad::getActividadesByLimit($pagina - 1, $limite);
        echo $twig->render('actividades.html.twig', ["actividades" => $actividades, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email']]);
    } else {
        $pagina = $_GET['pagina'];
        $_SESSION['paginaActividades'] = $pagina;
        $actividades = Actividad::getActividadesByLimit($pagina, $limite);
        echo $twig->render('tablaActividades.html.twig', ["actividades" => $actividades, "arrayNumeros" => $arrayNumeros, "email" => $_SESSION['email'], "pagina" => $pagina]);
    }
} else {
    if (!isset($_GET['pagina'])) {
        $pagina = 1;
        if (isset($_SESSION['paginaActividades'])) {
            $pagina = $_SESSION['paginaActividades'];
        } else {
            $_SESSION['paginaActividades'] = $pagina;
        }
        $actividades = Actividad::getActividadesByLimit($pagina - 1, $limite);
        echo $twig->render('actividades.html.twig', ["actividades" => $actividades, "arrayNumeros" => $arrayNumeros]);
    } else {
        $pagina = $_GET['pagina'];
        $_SESSION['paginaActividades'] = $pagina;
        $actividades = Actividad::getActividadesByLimit($pagina - 1, $limite);
        echo $twig->render('tablaActividades.html.twig', ["actividades" => $actividades, "arrayNumeros" => $arrayNumeros]);
    }
}

