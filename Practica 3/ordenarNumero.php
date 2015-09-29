<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];

if (($num1<$num2) && ($num1<$num3) && ($num2<$num3)){
    echo $num1 . " , " . $num2 . " , " . $num3;
}else if (($num1<$num2) && ($num1<$num3) && ($num3<$num2)) {
    echo $num1 . " , " . $num3 . " , " . $num2;
}

if (($num2<$num1) && ($num2<$num3) && ($num1<$num3)){
    echo $num2 . " , " . $num1 . " , " . $num3;
}else if (($num2<$num1) && ($num2<$num3) && ($num3<$num1)) {
    echo $num2 . " , " . $num3 . " , " . $num1;
}

if (($num3<$num1) && ($num3<$num2) && ($num1<$num2)){
    echo $num3 . " , " . $num1 . " , " . $num2;
}else if (($num3<$num1) && ($num3<$num2) && ($num2<$num1)) {
    echo $num3 . " , " . $num2 . " , " . $num1;
}   
?>