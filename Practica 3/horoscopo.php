<?php
$dia = $_POST['dia'];
$mes = $_POST['mes'];

switch ($mes){
    case "enero":
        if ($dia>=21){
            echo "<img src='imagenes/acuario.jpg'> Tu Horóscopo es Acuario";
        }else {
            echo "<img src='imagenes/capricornio.jpg'>Tu Horóscopo es Capricornio";
        }
    break;
    case "febrero":
        if ($dia>=20){
            echo "<img src='imagenes/piscis.jpg'>Tu Horóscopo es Piscis";
        }else {
            echo "<img src='imagenes/acuario.jpg'>Tu Horóscopo es Acuario";
        }
    break;
    case "marzo":
        if ($dia>=21){
            echo "<img src='imagenes/aries.jpg'>Tu Horóscopo es Aries";
        }else {
            echo "<img src='imagenes/piscis.jpg'>Tu Horóscopo es Piscis";
        }
    break;
    case "abril":
        if ($dia>=21){
            echo "<img src='imagenes/tauro.jpg'>Tu Horóscopo es Tauro";
        }else {
            echo "<img src='imagenes/aries.jpg'>Tu Horóscopo es Aries";
        }
    break;
    case "mayo":
        if ($dia>=22){
            echo "<img src='imagenes/geminis.jpg'>Tu Horóscopo es Géminis";
        }else {
            echo "<img src='imagenes/tauro.jpg'>Tu Horóscopo es Tauro";
        }
    break;
    case "junio":
        if ($dia>=22){
            echo "<img src='imagenes/cancer.jpg'>Tu Horóscopo es Cancer";
        }else {
            echo "<img src='imagenes/geminis.jpg'>Tu Horóscopo es Géminis";
        }
    break;
    case "julio":
        if ($dia>=24){
            echo "<img src='imagenes/leo.jpg'>Tu Horóscopo es Leo";
        }else {
            echo "<img src='imagenes/cancer.jpg'>Tu Horóscopo es Cancer";
        }
    break;
    case "agosto":
        if ($dia>=24){
            echo "<img src='imagenes/virgo.jpg'>Tu Horóscopo es Virgo";
        }else {
            echo "<img src='imagenes/leo.jpg'>Tu Horóscopo es Leo";
        }
    break;
    case "septiembre":
        if ($dia>=24){
            echo "<img src='imagenes/libra.jpg'>Tu Horóscopo es Libra";
        }else {
            echo "<img src='imagenes/virgo.jpg'>Tu Horóscopo es Virgo";
        }
    break;
    case "octubre":
        if ($dia>=24){
            echo "<img src='imagenes/escorpio.jpg'>Tu Horóscopo es Escorpio";
        }else {
            echo "<img src='imagenes/libra.jpg'>Tu Horóscopo es Libra";
        }
    break;
    case "noviembre":
        if ($dia>=23){
            echo "<img src='imagenes/sagitario.jpg'>Tu Horóscopo es Sagitario";
        }else {
            echo "<img src='imagenes/escorpio.jpg'>Tu Horóscopo es Escorpio";
        }
    break;
    case "diciembre":
        if ($dia>=22){
            echo "<img src='imagenes/capricornio.jpg'>Tu Horóscopo es Capricornio";
        }else {
            echo "<img src='imagenes/sagitario.jpg'>Tu Horóscopo es Sagitario";
        }
    break;
default :
}
?>
