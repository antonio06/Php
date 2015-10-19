<?php
    $texto = $_POST['texto'];
    
    $inicial = $_POST['inicial'];
    $final = $_POST['final'];
  
    $arrayNumero = explode(" ", $texto);
    
    echo "Array Original <br>";
        foreach($arrayNumero as $n){
            echo $n . " ";
        }
        echo "<br>";
        
    $auxiliar = $arrayNumero[9];
    for ($a = 9; $a>$final; $a--){
        $arrayNumero[$a] = $arrayNumero[$a-1];
    }
    $arrayNumero[$final] = $arrayNumero[$inicial];
    
    for($a = $inicial; $a>0; $a--){
        $arrayNumero[$a] = $arrayNumero[$a-1];
    }
    $arrayNumero[0] = $auxiliar;
    echo "Array Cambiado <br>";
        foreach($arrayNumero as $n2){
            echo $n2 . " ";
        }
?>

