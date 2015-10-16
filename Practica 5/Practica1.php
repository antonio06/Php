
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $numero = new SplFixedArray (20);
        $cuadrado = new SplFixedArray (20);
        $cubo = new SplFixedArray (20);
        
        //Meto en el array número valores aleatorios de 0 a 100;
        echo "Array original <br>";
        for ($i = 0; $i<count($numero); $i++){
            $numero[$i] = rand(0, 100);
        }
        
        for ($i = 0; $i<count($numero); $i++){
            echo $numero[$i] . " ";
        }
        
        echo "<br>";
        
        //Calculo el cuadrado y el cubo de los números y los meto 
        //En los arrays de cuadrado y cubo
        for ($i = 0; $i<count($numero); $i++){
            $cuadrado [$i] = pow($numero[$i], 2);
        }
        
        for ($i = 0; $i<count($numero); $i++){
            $cubo [$i] = pow($numero[$i], 3);
        }
        
        //Muestro los resultados
        echo "Array con los cuadrados de los números <br>";
        for ($a = 0; $a<count($cuadrado); $a++){
            echo $cuadrado[$a] . " ";
        }
        
        echo "<br>";
        
        echo "Array con los cubos de los números <br>";
        for ($b = 0; $b<count($cubo); $b++){
            echo $cubo[$b] . " ";
        }
        ?>
    </body>
</html>
