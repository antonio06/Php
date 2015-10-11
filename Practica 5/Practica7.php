
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $numero = new SplFixedArray (20);
        $auxiliar = new SplFixedArray (20);
        $auxiliar2 = new SplFixedArray (20);
        //Meto en el array número valores aleatorios de 0 a 100;
        echo "Array original <br>";
        for ($i = 0; $i<count($numero); $i++){
            echo $numero[$i] = rand(0, 100) . " ";
        }
        
        
        echo "<br>";
        
        echo "Array cambiado <br>";
        //Meto en el array auxiliar los números pares
        for ($b = 0; $b<count($numero); $b++){
            if ($numero[$b]%2==0){
                $auxiliar[$b] = $numero[$b];
            }
        }
       
        for ($b = 0; $b<count($numero); $b++){
            if ($numero[$b]%2!=0){
                $auxiliar2[$b] = $numero[$b];
            }
        }
        for ($i = 0; $i<count($auxiliar); $i++){
            echo $auxiliar[$i] . " ";
        }
        
        for ($i = 0; $i<count($auxiliar2); $i++){
            echo $auxiliar2[$i] . " ";
        }
        ?>
    </body>
</html>
