<?php


unset($_SESSION["usuario"]);
unset($_SESSION['conectado']);
unset($_SESSION['carrito']);
header("Location: ../Practica4.php");
