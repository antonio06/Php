<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $arrayNumero = array();
        
        
        $i = 0;
        $minimo = 999;     
        
        for ($x = 0; $x<9; $x++){
            for ($y = 0; $y<6; $y++){
                $numero = rand(100,999);
                if (!in_array($numero, $arrayNumero)){
                $arrayNumero[$x][$y] = $numero;
                }
                if ($arrayNumero[$x][$y]<$minimo){
                   $minimo = $arrayNumero[$x][$y];
                   $cordenadasX = $x;
                   $cordenadasY = $y;
                }
            }
        }
        
        echo $minimo . "<br>";
        $contador = 0;
        for ($x = 0; $x<9; $x++){
            for ($y = 0; $y<6; $y++){
                if ($contador<9){
                    $contador++;
                    if ($arrayNumero[$x][$y] == $minimo){
                        echo "<spam style= 'color:blue'>".  $arrayNumero[$x][$y] . " " . "</spam>";
                    }else{
                       echo $arrayNumero[$x][$y] . " ";
                    }
                }else{
                    echo "<br>";
                    $contador = 0;
                }
            }
        }
        echo  "<br>";
        echo $cordenadasX;
        echo $cordenadasY;
        ?>
    </body>
</html>