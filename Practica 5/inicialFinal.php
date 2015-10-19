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
        <form action="inicialFinal.php" method="post">
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
        
?>   
     Introduce un número Inicial
        <form action="inicialFinal.php" method="post">
            <input type="number" max="9" min="0" name="inicial"><br>
            Introduce un número Final<br>
            <input type="number" max="9" min="0" name="final">
            <input type="submit" value="Introducir">
            <input type="hidden" name="numero">
            <input type="hidden" name="contador" value="<?= ++$contador ?>">
            <input type="hidden" name="texto" value="<?= $texto . " " . $numero?>">
        </form>   
        
        
<?php   
    $inicial = $_POST['inicial'];
    $final = $_POST['final'];
  
    /*$texto = $texto . " " . $numero;
    $texto = substr($texto, 2);
    $arrayNumero = explode(" ", $texto);*/
    
    echo "Array Original <br>";
        foreach($arrayNumero as $n){
            echo $n . " ";
        }
        echo "<br>";
        
    $a = 0;
    while ($a<10){
	$arrayNumero2[$a] = $arrayNumero[$a];
	$a++;
    }
    
    $arrayNumero2[$final] = $arrayNumero[$inicial];
    $a = $final;
		
    while ($a<10){
	$arrayNumero2[0] = $arrayNumero[$a-1];
	$a++;
    }
		
    $arrayNumero2[0] = $arrayNumero[9];
		
    $a=0;
    while ($a<$inicial){
    $arrayNumero[$a+1] = $arrayNumero[$a];
    $a++;
    }
    
    echo "Array Cambiado <br>";
        foreach($arrayNumero2 as $n2){
            echo $n2 . " ";
        }
    }
?>
</body>
</html>

