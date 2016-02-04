<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/ActividadesDB.php';
require_once '../Model/Actividad.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

if($_POST['opciones'] == "modificar"){
    $actividad = new Actividad($_POST['codigo'], $_POST['titulo'], $_POST['estado'], $_POST['cordinador'], 
    $_POST['ubicacion'], $_POST['fecha'], $_POST['horarios'], $_POST['totalHoras'],
    $_POST['precioTotal'], $_POST['IVA']);
    $actividad->update();
    
    echo $twig->render('principal.html.twig', ["actividades" => $actividad]);
    header("Location: ../index.php");
}else{
    header("Location: ../index.php");
}
