<?php
$radio=$_POST['radio'];
$altura=$_POST['altura'];

echo "La altura es " . $altura . " cm <br>";
echo "El radio es " . $radio . " cm <br>";
echo "Pi vale siempre " . 3.14 . "<br>";

echo "El volumen del cono es " . round((3.14*($radio*$radio)*$altura)/3 , 3) . " cm*2";
?>

