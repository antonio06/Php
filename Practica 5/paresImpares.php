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
    
    if ($contador<8){
        ?>
        Introduce un número
        <form action="paresImpares.php" method="post">
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
        
        for ($a = 0; $a<count($arrayNumero); $a++){
            if ($arrayNumero[$a]%2==0){
                echo "<b>" . $arrayNumero[$a] . " " . "</b>";
            }else{
                echo  $arrayNumero[$a] . " ";
            }
        }
    }
?>
</body>
</html>

