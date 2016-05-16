<?php

session_start();
require_once '../../twig/lib/Twig/Autoloader.php';
require_once '../../../Model/BinDb.php';
require_once '../../../Model/Persona.php';
require_once '../../../Model/Actividad.php';

if ($_SESSION['logeado'] == "Si") {
    $respuesta = ["estado" => "error", "errores" => []];
    
    $DNI = trim($_POST['DNI']);
    if (empty($DNI)) {
        $respuesta["errores"][] = "El DNI no puede estar vacío.";
    }
    
    $nombre = trim($_POST['nombre']);
    if (empty($nombre)) {
        $respuesta["errores"][] = "El nombre no puede estar vacío.";
    }
    
    $apellido1 = trim($_POST['apellido1']);
    if (empty($apellido1)) {
        $respuesta["errores"][] = "El 1º apellido no puede estar vacío.";
    }
    
    $apellido2 = trim($_POST['apellido2']);
    if (empty($apellido1)) {
        $respuesta["errores"][] = "El 2º apellido no puede estar vacío.";
    }
    
    $perfil = $_POST['perfil'];
    if (Actividad::findCodigoPerfil($perfil) == "TRUE"){
        $respuesta["errores"][] = "El perfil pertenece a la lista de perfiles.";
    }else{
        $respuesta["errores"][] = "El perfil no pertenece a la lista de perfiles.";
    }
    
    $sexo = $_POST['sexo'];
    if (Persona::findSexoPersona($sexo) == "TRUE"){
        $respuesta["errores"][] = "El sexo pertenece a la lista de sexos.";
    }else{
        $respuesta["errores"][] = "El sexo no pertenece a la lista de sexos.";
    }
    
    $fecha_nac = trim($_POST['fecha_nac']);
    if (empty($apellido1)) {
        $respuesta["errores"][] = "La fecha de nacimiento no puede estar vacía.";
    }
    
    $email = trim($_POST['email']);
    if (empty($apellido1)) {
        $respuesta["errores"][] = "El email  no puede estar vacío.";
    }
    
    $password = trim($_POST['password']);
    if (empty($apellido1)) {
        $respuesta["errores"][] = "La contraseña no puede estar vacía.";
    }
    
    $perfil_usuario = $_POST['perfil_usuario'];
    if (Persona::findPerfil_usuario($perfil_usuario) == "TRUE"){
        $respuesta["errores"][] = "El perfil de usuario pertenece a la lista de perfiles.";
    }else{
        $respuesta["errores"][] = "El perfil de usuario no pertenece a la lista de perfiles.";
    }
    
    if (empty($respuesta["errores"])) {
    move_uploaded_file($_FILES['foto']['tmp_name'], "../../public/asset/img/" . $_FILES['foto']['name']);
        $persona = new Persona("", $DNI, $nombre, $apellido1, $apellido2, $perfil,
                $_FILES['foto']['name'], $sexo, $fecha_nac, $_POST['direccion'],
                $_POST['municipio'], $_POST['provincia'], $_POST['pais'], 
                $_POST['fecha_alta'], $_POST['fecha_baja'], 
                $_POST['n_Seguridad_Social'], $_POST['n_Cuenta_Bancaria'], 
                $email, password_hash($password, PASSWORD_DEFAULT), 
                $perfil_usuario, $_POST['observaciones']);
        
        if ($persona->insert()){
            $respuesta["estado"] = "success";
            $respuesta["mensaje"] = "Persona registrada con éxito.";
        }
    }
    
    echo json_encode($respuesta);
}else {
    header("Location: /Controller/partePublica/actividades.php");;
}
