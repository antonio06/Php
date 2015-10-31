<?php
session_start();
$codigo = $_POST['codigoProducto'];
$accion = $_POST['accion'];
if (isset($_SESSION['conectado'])){
    if (!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = array("1"=>0, "2"=>0, "3"=>0, "4"=>0); 
        
    }
    
    if($accion == "comprar"){
        $_SESSION['carrito'][$codigo]++;
    }
    
    if($accion == "borrar"){
        $_SESSION['carrito'][$codigo]--;
    }
    header('Location: tienda.php');
}

