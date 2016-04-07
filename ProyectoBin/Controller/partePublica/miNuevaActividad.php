<?php
session_start();

require_once '../../Model/BinDb.php';
require_once '../../Model/Actividad.php';
require_once '../../Model/Persona.php';

if ($_SESSION['logeado'] == "Si") {
    $codigo_persona = $_SESSION['codigo'];
    $codigo_actividad = $_GET['codigo_actividad'];
    $codigo_perfil = Actividad::getCodigoParticipante();
    
    Actividad::insertParticipantes($codigo_persona, $codigo_actividad, $codigo_perfil);
    
    header("Location: misActividades.php");
}else{
    header("Location: actividades.php");
}