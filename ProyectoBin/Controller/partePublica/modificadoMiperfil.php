<?php

session_start();
require_once '../twig/lib/Twig/Autoloader.php';
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View/partePublica');
$twig = new Twig_Environment($loader);

if ($_SESSION['logeado'] == "Si") {
    switch ($_POST['opcion']) {
        case "modificar":
            move_uploaded_file($_FILES['foto']['tmp_name'], "../../public/asset/img/" . $_FILES['foto']['name']);
            //$perfil = Persona::getCodigoPerfilbyDescripcion($_POST['perfil']);
            $email = "";
            $password = Persona::getPasswordByCodigo($_SESSION['codigo']);
            $persona = new Persona($_SESSION['codigo'], $_POST['DNI'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['perfil'], $_FILES['foto']['name'], $_POST['sexo'], $_POST['fecha_nac'], $_POST['direccion'], $_POST['municipio'], $_POST['provincia'], $_POST['pais'], $_POST['fecha_alta'], $_POST['fecha_baja'], $_POST['n_Seguridad_Social'], $_POST['n_Cuenta_Bancaria'], $_POST['email'], $password, $_POST['perfil_usuario'], $_POST['observaciones']);
            $persona->update();
            print_r($persona);
            header('Location: actividades.php');
            break;
        case "cancelar":
            header('Location: actividades.php');
            break;
        default :
    }
}else{
    header("Location: actividades.php");
}
