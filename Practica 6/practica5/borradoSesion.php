<?php
session_start();
$opciones = $_POST['opciones'];
if (isset($_SESSION['conectado'])){
        
    if($opciones == "si"){
        $_SESSION["conectado"] = FALSE;
        header('Location: ../Practica5.php');
    }else{
        header('Location: tienda.php');
    }
}