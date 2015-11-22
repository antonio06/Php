<?php

/* $_SESSION['conectado'] = NULL;
  $_SESSION["usuario"] = NULL;
  $_SESSION['carrito'] = "";
  $_SESSION["codigo"] = NULL; */
unset($_SESSION["usuario"]);
unset($_SESSION['dni']);
unset($_SESSION['conectado']);
header("Location: ../Practica1.php");
