<?php

session_start();
require_once '../../twig/lib/Twig/Autoloader.php';
require_once '../../../Model/BinDb.php';
require_once '../../../Model/Actividad.php';

if ($_SESSION['logeado'] == "Si") {
    
    if (isset($_POST['codigo_persona'])) {
        $codigo_persona = $_POST['codigo_persona'];
        if (!empty($codigo_persona)) {
            $aRespuesta = ['estado' => Actividad::deleteParticipa($codigo_persona)];
            echo json_encode($aRespuesta);
        }
    }
}else {
    header("Location: /Controller/partePublica/actividades.php");
}
