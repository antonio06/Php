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
                <span id="titulo">Productos de la tienda</span>
                
                <br>
                <br>
                <?php
                    $productos = array(
                    "1" => array("Nombre"=> "Iphone 6s", "Descripcion"=> "Iphone 6s en color blanco plata", "Precio"=>749, "imagen"=>"imagenes/iphone.png"),
                    "2" => array("Nombre"=> "Ipad Air 2", "Descripcion"=>"Ipad Air 2 en color blanco plata", "Precio"=>489, "imagen"=>"imagenes/ipad.png"),
                    "3" => array("Nombre"=> "Sansung Galaxi S6", "Descripcion"=>"Sansung Galaxi S6 color negro", "Precio"=>600, "imagen"=>"imagenes/sansung.png"),
                    "4" => array("Nombre"=> "Huawei P8 Lite", "Descripcion"=>"Huawei P8 Lite negro", "Precio"=>182, "imagen"=>"imagenes/huawei.png")
                    );
                    
                    $_SESSION['productos'] = $productos;
                        if (isset($_SESSION['conectado'])){
                        foreach($productos as $codigoProducto => $articulo){      
                ?>
                
                
                <div id="articulos">
                    <form action="carrito.php" method="post">
                        <img src="<?=$articulo[imagen]?>"><br>
                        <?=$articulo[Nombre]?><br>
                        Precio: <?=$articulo[Precio]?> €<br>
                        <input type="hidden" name="accion" value="comprar">
                        <input type="hidden" name="codigoProducto" value="<?= $codigoProducto?>"> 
                        <input id="boton" type="submit" value="Comprar">
                   </form>
                    <br>
                   <form action="detalles.php" method="post">
                        <input type="hidden" name="codigoProducto" value="<?= $codigoProducto?>"> 
                        <input id="boton" type="submit" value="Detalles">
                   </form>
                </div>
                
                <?php
                        }
                    }
                ?>
                <br>
                <br>
                <span id="titulo">Carrito</span>
                <br>
                <br>
                <?php
                $total =0;
                    foreach($productos as $codigoProducto => $articulo){  
                        if($_SESSION['carrito'][$codigoProducto]>0){   
                            
                        $total = $total + ($_SESSION['carrito'][$codigoProducto]*$articulo[Precio]);
                ?>
                <div id="articulos">
                    <form action="carrito.php" method="post">
                        <img src="<?=$articulo[imagen]?>"><br>
                        Precio:<?=$articulo[Precio]?> €<br>
                        Unidad:<?=$_SESSION['carrito'][$codigoProducto]?><br>
                        <input type="hidden" name="accion" value="borrar">
                        <input type="hidden" name="codigoProducto" value="<?=$codigoProducto?>">
                        <input id="boton" type="submit" value="Borrar">
                   </form>
                </div>
                <?php
                        }
                    }
                    echo "<br>";
                    echo "Total " . $total . " €";
                ?>
            </div>
        </div>
    </body>
</html>