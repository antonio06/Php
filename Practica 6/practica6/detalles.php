<?php session_start();
$usuarioReal = "admin";?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <title></title>
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Tienda Online</p>
                <div id="icono">
                   <?php echo $usuarioReal?> <i class="fa fa-user"></i> 
                </div>
            </div>
            <div id="cuerpo">
                <span id="titulo">Detalles</span>
                <br>
                <br>
                <?php
                $codigo = $_POST['codigoProducto'];
                $productos = $_SESSION['productos'];
                $elemento = $productos[$codigo];
                    if (isset($_SESSION['conectado'])){
                 
                     
                    ?>     
                    <div id="articulos">
                        <img src="<?=$elemento[imagen]?>"><br>
                        <?=$elemento[Nombre]?><br>
                        Precio: <?=$elemento[Precio]?> €<br>
                        Detalles: <?=$elemento[Descripcion]?><br>
                    <?php  
                    }
                ?>
                        <form action="carrito.php" method="post">
                        <input type="hidden" name="codigoProducto" value="<?= $codigo?>"> 
                        <input type="hidden" name="accion" value="comprar">
                        <input id="boton" type="submit" value="Comprar">
                   </form>
                    </div>
            </div>
        </div>
    </body>
</html>
