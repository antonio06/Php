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
        echo "Array Original <br>";
        foreach($arrayNumero as $n){
            echo $n . " ";
        }
?>   
     Introduce un número Inicial
        <form action="inicialFinal.php" method="post">
            <input type="number" max="9" min="0" name="inicial">
            Introduce un número Final
            <input type="number" max="9" min="0" name="final">
            <input type="submit" value="Introducir">
        </form>   
        
        
<?php   

    $inicial = $_POST['inicial'];
    $final = $_POST['final'];
  
    $texto = $texto . " " . $numero;
    $texto = substr($texto, 2);
    $arrayNumero = explode(" ", $texto);
    
    
    }
?>
</body>
</html>

