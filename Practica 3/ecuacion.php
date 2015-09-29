<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];

echo "Ecuación ax2 + bx + c = 0 <br>";

if ($num1==0 && ($num2==0) && ($num3==0)){
    echo "La ecuación tiene infinitas soluciones <br>";
} if ($num1==0 && ($num2==0) && ($num3!=0)){
    echo "La ecuación no tiene solución <br>";
}if ($num1!=0 && ($num2!=0) && ($num3==0)){
    echo "x1= 0 <br>";
    echo "x2= " . (-$num2/$num1) . "<br>";
}if ($num1==0 && ($num2!=0) && ($num3!=0)){
    echo "x1= 0 x2= " . (-$num3/$num2) . "<br>";
}

if ((a!=0)&& (b!=0) && (c!=0)){
			
$discriminante=$num2*$num2-(4*$num1*$num3);
			
    if (discriminante<0){
    echo "La ecuaciónno tiene soluciones reales";
				
    }else{
    echo "x1= " . (-b + sqrt(discriminante))/(4*a*c);
    echo "x2= " . (-b - sqrt(discriminante))/(4*a*c);
				
    }
}
?>

