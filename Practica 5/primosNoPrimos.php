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
        echo "Array original <br>";
        foreach($arrayNumero as $n){
            echo $n . " ";
        }
        echo "<br>";
        $auxiliar= new SplFixedArray (10);
        
        for ($a = 0; $a<count($arrayNumero); $a++){
            if (){
                
            }
        }
        
        
    }
?>
</body>
</html>