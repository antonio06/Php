
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $arrayNumero = new SplFixedArray (100);
        $texto = " ";
        for ($a = 0; $a<count($arrayNumero); $a++){
            echo $arrayNumero[$a] = rand(0, 20) . " ";
        ?>
        <form action="cambiar.php" method="post">
            <input type="hidden"  name="texto" value="<?= $texto = $texto . " " . $arrayNumero[$a]?>">
        </form>
            
        <?php
        }
        ?>
        Indica un número de los que ves
        <form action="cambiar.php" method="post">
            <input type="number" name="numero"><br>
            Indica el numero por el que lo quieres cambiar<br>
            <input type="number" name="cambio">
            <input type="hidden"  name="texto" value="<?= $texto?>">
            <br>
            <input type="submit" value="Introducir">
        </form>
    </body>
</html>
