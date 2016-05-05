<?php

session_start();
require_once '../../twig/lib/Twig/Autoloader.php';
require_once '../../../Model/BinDb.php';
require_once '../../../Model/Actividad.php';
require_once '../../../Model/Persona.php';

if ($_SESSION['logeado'] == "Si") {
    $respuesta = ["estado" => "error", "errores" => [], "valorEstado" => $_POST["estado"]];
    $nombre = $_POST['nombre'];
    
    if (Persona::findCodigoPersona($nombre) == "TRUE"){
        $respuesta["errores"][] = "La persona pertenece a la lista.";
    }else{
        $respuesta["errores"][] = "La persona no pertenece a la lista.";
    }

    $codigo = $_POST['titulo'];

    if (Actividad::findCodigoActividad($codigo) == "TRUE"){
        $respuesta["errores"][] = "El titulo pertenece a la lista de actividades.";
    }else{
        $respuesta["errores"][] = "El titulo no pertenece a la lista de actividades.";
    }
    
    $perfil = $_POST['perfil'];

    if (Actividad::findCodigoPerfil($perfil) == "TRUE"){
        $respuesta["errores"][] = "El perfil pertenece a la lista de perfiles.";
    }else{
        $respuesta["errores"][] = "El perfil no pertenece a la lista de perfiles.";
    }
    
    if($participante = Actividad::insertParticipante($nombre, $codigo, $perfil)){
            $respuesta["estado"] = "success";
            $respuesta["mensaje"] = "Participante registrado con éxito.";
    }

    
    echo json_encode($respuesta);
}else {
    header("Location: /Controller/partePublica/actividades.php");
}