<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Base de Datos Clientes</title>
        <link type="text/css" rel="stylesheet" href="styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Clientes</p>
            </div>
            <div id="cuerpo">
                <form action="eliminarRegistro.php" method="post">
                    <?php 
                    if (isset($_SESSION['conectado'])){
                       $_SESSION['dni'] = $_GET['dni']; 
                    ?>
                    <span>¿ Quieres eleminar el registro ?</span><br>
                    <select name="opciones">
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                    <input id="boton" type="submit" value="Enviar"> 
                </form>
                <?php 
                    }
                ?>
            </div>
        </div>
    </body>
</html>
