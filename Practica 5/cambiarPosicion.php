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
    
    if ($contador<15){
        ?>
        Introduce 15 números
        <form action="cambiarPosicion.php" method="post">
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
        echo "Array original <br>";
        foreach($arrayNumero as $n){
            echo $n . " ";
        }
        echo "<br>";
        $auxiliar = 0;
        $auxiliar=$arrayNumero[14];
		
	for ($b = 14; $b>0; $b--){
            $arrayNumero[$b]= $arrayNumero[$b-1];	
	}
        
	$arrayNumero[0] = $auxiliar;
		
        echo "Array cambiado <br>";
        foreach($arrayNumero as $c){
            echo $c . " ";
        }
    }
?>
</body>
</html>