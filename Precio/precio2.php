<?php
$texto = $_POST['texto'];
$descuento = $_POST['descuento'];

$texto = $texto . " " . $numero;

$arrayNumero = explode(" ", $texto);

echo "Precios originales <br>";
        foreach($arrayNumero as $n){
            echo $n . " ";
        }
        echo "<br>";
?>

