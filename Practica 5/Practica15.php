
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
           for ($x = 0; $x<12; $x++){
            for ($y = 0; $y<12; $y++){
                $arrayNumero[$x][$y] = rand(0,100);
            }
        }
        
        $contador = 0;
        for ($x = 0; $x<12; $x++){
            for ($y = 0; $y<12; $y++){
                echo $arrayNumero[$x][$y] . " "; 
            }
            echo "<br>";
        }
        ?>
    </body>
</html>
