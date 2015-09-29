<?php
$hora = $_POST['hora'];

if ($hora>=6 && ($hora<=12)){
    echo " Buenos Dias!!!! ";
}if ($hora>=13 && ($hora<=20)){
    echo " Buenas Tardes!!!! ";
}if ($hora>=21 || ($hora<=5)){
    echo " Buenas Noches!!!! ";
}
?>

