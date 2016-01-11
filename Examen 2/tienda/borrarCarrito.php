<?php
session_start();
if (isset($_SESSION['conectado'])) {
    unset($_SESSION['carrito']);
    header('Location: tienda.php');
}

