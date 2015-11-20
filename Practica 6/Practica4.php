<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="practica4/estilos.css" rel="stylesheet" type="text/css"> 
        <title></title>
    </head>
    <body>
        <div id="estilo">
            <?php
            if (!isset($_SESSION['conectado'])){
            ?>
            <p>No estás conectado:</p>
            <button class="boton"><a href="practica4/login.php">conectar</a></button>
            <?php
                }
            ?>
        </div>
    </body>
</html>
