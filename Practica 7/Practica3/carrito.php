<?php

session_start();
$codigo = $_POST['codigo'];
$accion = $_POST['accion'];
if (isset($_SESSION['conectado'])) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    if (!isset($_SESSION['carrito'][$codigo])) {
        $_SESSION['carrito'][$codigo] = 0;
    }
    if ($accion == "comprar") {
        $_SESSION['carrito'][$codigo] ++;
    }

    if ($accion == "borrar") {
        $_SESSION['carrito'][$codigo] --;
    }
    header('Location: tienda.php');
}

