<?php session_start(); 
$usuarioReal = "admin";?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
        <title></title>
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Diccionario</p>
                <div id="icono">
                   <?php echo $usuarioReal?> <i class="fa fa-user"></i> 
                </div>
            </div>
            <div id="cuerpo">
                <span id="titulo">Palabras</span>
                
                <br>
                <br>
                <?php
                    $diccionario = array("perro"=>"dog", "mamá"=>"mun", "papá"=>"dad", "caballo"=>"horse",
                        "carta"=>"cart", "jefe"=>"boss", "cielo"=>"sky", "negro"=>"black",
                        "televisión"=>"television", "ventana"=>"window",
                        "teléfono"=>"phone", "luz"=>"light", "nube"=>"cloud", "sol"=>"sun",
                        "flor"=>"flower", "sangre"=>"blood", "libro"=>"book", "cara"=>"face",
                        "risa"=>"laugh", "llamada"=>"call");
                    
                    $ingles = ["dog", "mun", "dad", "horse", "cart", "boss",
                        "sky", "black", "television", "window", "phone", "light", "cloud",
                        "sun", "flower", "blood", "book", "face", "laught", "call"];
                    
                    setcookie("ingles", $ingles);
                    
                        if (isset($_SESSION['conectado'])){
                        if($_SESSION['contador']<5){      
                ?>
                
                
                <div id="articulos">
                    Introduce la plabra en español de <?=$ingles[rand(0, count($ingles))]?>
                    <form action="comprobarDiccionario.php" method="post">
                        <input type="text" value="palabra"><br>
                        <input type="hidden" name="accion" value="comprar">
                        <input type="hidden" name="codigoProducto" value="<?= $codigoProducto?>"> 
                        <input id="boton" type="submit" value="Comprar">
                   </form>
                </div>
                
                <?php
                        $_SESSION['contador']++;
                        }
                    }
                ?>
                <br>
                <br>
                <span id="titulo">Solución</span>
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