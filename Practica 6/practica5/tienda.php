<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="styles.css">
        <title></title>
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Tienda Online</p>
            </div>
            <div id="cuerpo">
                <span id="titulo">Productos de la tienda</span>
                <?php
                    $productos = array(
                        array("Nombre"=> "Iphone 6s", "Descripción"=> "Iphone 6s en color blanco plata", "Precio"=>749),
                        array("Nombre"=> "Ipad Air 2", "Descripción"=>"Ipad Air 2 en color blanco plata", "Precio"=>489),
                        array("Nombre"=> "Sansung Galaxi S6", "Descripción"=>"Sansung Galaxi S6 color negro", "Precio"=>600),
                        array("Nombre"=> "Huawei P8 Lite", "Descripción"=>"Huawei P8 Lite negro", "Precio"=>182 )
                    );
                    if (isset($_SESSION['conectado'])){
                ?>
                <di>
                    <img src="imagenes/iphone.png">
                    Iphone 6s<br>
                    Precio: 749€
                </di>
                <?php 
                    }
                ?>
            </div>
        </div>
    </body>
</html>
