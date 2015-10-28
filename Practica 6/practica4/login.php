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
            <form action="comprobacion.php" method="post">
                <p>Nombre usuario</p>
                <input type="text" name="usuario" autofocus=""><br>
                <p>Contraseña</p>
                <input type="password" name="contrasena" autofocus="">
                <input type="submit" value="Conectar">
            </form>
        </div>
    </body>
</html>