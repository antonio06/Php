<?php
$numero = $_POST['numero'];

$auxi = $numero;
$cifra = 0;
$volteado = 0;
while ($auxi>0){
    $cifra = $auxi%10;
    $volteado = ($volteado*10) + $cifra;
    $auxi = floor($auxi/10);
}
 echo "El número " . $numero . " en morse es ";   
    $morse = [1=>". _ _ _ _", 2=>". . _ _ _", 3=>". . . _ _", 4=>". . . . _", 
        5=>". . . . .", 6=>"_ . . . .", 7=>"_ _ . . .", 8=>"_ _ _ . .", 
        9=>"_ _ _ _ .", 0=>"_ _ _ _ _"];
    $cifra = 0;
    $numeroMorse = "  ";
    while ($volteado>0){
        $cifra = $volteado%10;
        echo $morse [$cifra];
        $volteado = floor($volteado/10);
    }
?>

