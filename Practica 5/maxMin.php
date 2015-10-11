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
        <form action="maxMin.php" method="post">
            <input type="number" name="numero">
            <input type="hidden" name="contador" value="<?= ++$contador ?>">
            <input type="hidden" name="texto" value="<?= $texto . " " . $numero?>">
            <input type="submit" value="Introducir">
        </form>
<?php
    
    }else{
        $maximo = 0;
        $minimo = 1000000;
        $texto = $texto . " " . $numero;
        $texto = substr($texto, 2);
        $arrayNumero = explode(" ", $texto);
        foreach($arrayNumero as $n){
            echo $n . " ";
        }
        echo "<br>";
        foreach($arrayNumero as $n){
            if ($n>$maximo){
                $maximo = $n;
            }
        }
        
        foreach ($arrayNumero as $n){
            if ($n<$minimo){
                $minimo = $n;
            }
        }
        echo "El máximo número introducido es " . $maximo . "<br>";
        echo "El mínimo número introducido es " . $minimo . "<br>";
    }
?>
</body>
</html>
