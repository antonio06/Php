<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $arrayNumero = array();
        for ($a = 0; $a<54; $a++){
            $numero = rand(100,999);
            if (!in_array($numero, $arrayNumero)){
                 $arrayNumero[] = $numero;
            }
        }
        $a = 0;
        $minimo = 1000;     
        
        for ($x = 0; $x<9; $x++){
            for ($y = 0; $y<6; $y++){
                $arrayBidimensional[$x][$y] = $arrayNumero[$a];
                $a++;
                if ($arrayBidimensional[$x][$y]<$minimo){
                    $minimo = $arrayBidimensional[$x][$y];
                }
            }
        }
        
        echo $minimo . "<br>";
        $contador = 0;
        for ($x = 0; $x<9; $x++){
            for ($y = 0; $y<6; $y++){
                if ($contador<9){
                    $contador++;
                    if ($arrayBidimensional[$x][$y] == $minimo){
                        echo "<spam style= 'color:blue'>".  $arrayBidimensional[$x][$y] . " " . "</spam>";
                    }else{
                        echo $arrayBidimensional[$x][$y] . " ";
                    }
                }else{
                    echo "<br>";
                    $contador = 0;
                }
            }
        }
        ?>
    </body>
</html>