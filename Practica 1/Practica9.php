
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- 
        la función round redondea decimales según la precisión
        que queramos en este caso ponemos 3 también podemos poner variables 
        -->
        <?php
        $pesetas=3;
        
        echo $pesetas . " pesetas son " . round(($pesetas*1)/166.386, 3) . " euros";
        ?>
    </body>
</html>