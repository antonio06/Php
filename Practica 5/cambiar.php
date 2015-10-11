<?php 
    $numero = $_POST['numero'];
    $cambio = $_POST['cambio'];
    $texto = $_POST['texto']; 
    
    $arrayNumero = explode(" ", $texto);
    for ($a = 0; $a<count($arrayNumero); $a++){
        if ($arrayNumero[$a]==$numero){
            $arrayNumero[$a]=$cambio;
           echo "<b>" . $arrayNumero[$a] . " " . "</b>";
        }else{
            echo $arrayNumero[$a] . " ";
        }
    }
?>

