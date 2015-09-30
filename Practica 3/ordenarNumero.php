<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];

//Para dos números que son iguales y uno de ellos es menor
if (($num1==$num2) && ($num2==$num3)){
    echo $num1 . " , " . $num2 . " , " . $num3;
}else if (($num1==$num2) && ($num3<$num2)){
    echo $num3 . " , " . $num2 . " , " . $num1;
}else if ((($num1==$num3) && ($num2<$num1))){
    echo $num2 . " , " . $num3 . " , " . $num1;
}else if ((($num2==$num3) && ($num1<$num2))){
    echo $num1 . " , " . $num3 . " , " . $num2;
}

//Para dos números que son iguales y uno de ellos es mayor
 if (($num1==$num2) && ($num3>$num2)){
    echo $num1 . " , " . $num2 . " , " . $num3;
}else if ((($num1==$num3) && ($num2>$num1))){
    echo $num1 . " , " . $num3 . " , " . $num2;
}else if ((($num2==$num3) && ($num1>$num2))){
    echo $num2 . " , " . $num3 . " , " . $num1;
}
    
 //Para números distintos entre si 
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

//y = (x>2)? 10: ((z==1)? 11:12);

/*$primero = (($num1<$num2) && ($num1<$num3) && ($num2<$num3)? $num1 . " , " . $num2 . " , " . $num3:
    (($num1<$num2) && ($num1<$num3) && ($num3<$num2)? $num1 . " , " . $num3 . " , " . $num2));*/
?>