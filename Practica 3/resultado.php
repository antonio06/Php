<?php
$numero1 = $_POST['numero1'];
$numero2 = $_POST['numero2'];
$numero3 = $_POST['numero3'];
$numero4 = $_POST['numero4'];
$numero5 = $_POST['numero5'];
$numero6 = $_POST['numero6'];
$numero7 = $_POST['numero7'];
$numero8 = $_POST['numero8'];
$numero9 = $_POST['numero9'];
$numero10 = $_POST['numero10'];

$puntos=0;

if ($numero1==1){
    $puntos++;
}if ($numero2==1){
    $puntos++;
}if ($numero3==1){
    $puntos++;
}if ($numero4==1){
    $puntos++;
}if ($numero5==1){
    $puntos++;
}if ($numero6==1){
    $puntos++;
}if ($numero7==1){
    $puntos++;
}if ($numero8==1){
    $puntos++;
}if ($numero9==1){
    $puntos++;
}if ($numero10==1){
    $puntos++;
}

if ($puntos>=5){
    echo "Tus puntos son " . $puntos . " enhorabuena has aprobado";
}else{
    echo "Tus puntos son " . $puntos . " lo sentimos has suspendido";
}
?>

