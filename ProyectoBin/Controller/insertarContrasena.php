<?php

require_once 'twig/lib/Twig/Autoloader.php';
require_once '../Model/BinDb.php';
require_once '../Model/UsuariosContrasena.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../View');
$twig = new Twig_Environment($loader);

    if (UsuariosContrasena::getUsuarioContrasenaByCodigo($_POST['codigo']) == FALSE) {
        $usuariosContrasenas = new UsuariosContrasena($_POST['codigo'], $_POST['user'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['perfil']);
        $usuariosContrasenas->insert();
        header("Location: gestionAdminContrasena.php");
    } else {
        header("Location: gestionAdminContrasena.php");
    }


