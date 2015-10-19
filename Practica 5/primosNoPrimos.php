<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
    $numero = $_POST['numero'];
    $contador = $_POST['contador'];
    $texto = $_POST['texto'];
    
    if ($contador<10){
        ?>
        Introduce 10 números
        <form action="primosNoPrimos.php" method="post">
            <input type="number" name="numero">
            <input type="hidden" name="contador" value="<?= ++$contador ?>">
            <input type="hidden" name="texto" value="<?= $texto . " " . $numero?>">
            <input type="submit" value="Introducir">
        </form>
<?php
    
    }else{
        $texto = $texto . " " . $numero;
        $texto = substr($texto, 2);
        $arrayNumero = explode(" ", $texto);
        $auxi1 = new SplFixedArray (10);
        $auxi2 = new SplFixedArray (10);
        
        echo "Array original <br>";
        foreach($arrayNumero as $n){
            echo $n . " ";
        }
        echo "<br>";
        
        $contador = 0;
        for ($a = 0; $a<count($arrayNumero); $a++){
            for ($b = 1; $b<=$arrayNumero[$a]; $b++){
                if ($arrayNumero[$a]%$b==0){
                $contador++;
                }
            }
            if ($contador>2){
                $auxi2[$a]= $arrayNumero[$a];
            }else{
                $auxi1[$a]= $arrayNumero[$a];
            }
            $contador =0;
        }
        
        echo "Array cambiado <br>";
        foreach($auxi1 as $n1){
            echo $n1 . " ";
        }
        
        foreach($auxi2 as $n2){
            echo $n2 . " ";
        }
    }
?>
</body>
</html>