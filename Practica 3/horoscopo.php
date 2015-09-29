<?php
$dia = $_POST['dia'];
$mes = $_POST['mes'];

if (($dia>=21) && ($mes=='marzo') || ($dia<=20) && ($mes=='abril')){
    echo "<img src='/imagenes/aries.jpg'> Tu Horóscopo es Aries";
}if (($dia>=21) && ($mes=='abril') || ($dia<=21) && ($mes=='mayo')){
    echo "<img src='/imagenes/tauro.jpg'> Tu Horóscopo es Tauro";
}if (($dia>=22) && ($mes=='mayo') || ($dia<=21) && ($mes=='junio')){
    echo "<img src='/imagenes/geminis.jpg'> Tu Horóscopo es Géminis";
}if (($dia>=22) && ($mes=='junio') || ($dia<=23) && ($mes=='julio')){
    echo "<img src='/imagenes/aries.jpg'> Tu Horóscopo es Cáncer";
}if (($dia>=24) && ($mes=='julio') || ($dia<=23) && ($mes=='agosto')){
    echo "<img src='/imagenes/leo.jpg'> Tu Horóscopo es Leo";
}if (($dia>=24) && ($mes=='agosto') || ($dia<=23) && ($mes=='septiembre')){
    echo "<img src='/imagenes/virgo.jpg'> Tu Horóscopo es Virgo";
}if (($dia>=24) && ($mes=='septiembre') || ($dia<=23) && ($mes=='octubre')){
    echo "<img src='/imagenes/libra.jpg'> Tu Horóscopo es Libra";
}if (($dia>=24) && ($mes=='agosto') || ($dia<=23) && ($mes=='octubre')){
    echo "<img src='/imagenes/escorpio.jpg'> Tu Horóscopo es Escorpio";
}if (($dia>=23) && ($mes=='noviembre') || ($dia<=21) && ($mes=='diciembre')){
    echo "<img src='/imagenes/sagitario.jpg'> Tu Horóscopo es Sagitario";
}if (($dia>=22) && ($mes=='diciembre') || ($dia<=20) && ($mes=='enero')){
    echo "<img src='/imagenes/capricornio.jpg'> Tu Horóscopo es Capricornio";
}if (($dia>=21) && ($mes=='enero') || ($dia<=19) && ($mes=='febrero')){
    echo "<img src='/imagenes/acuario.jpg'> Tu Horóscopo es Acuario";
}else if (($dia>=20) && ($mes=='febrero') || ($dia<=20) && ($mes=='marzo')){
    echo "<img src='/imagenes/piscis.jpg'> Tu Horóscopo es Piscis";
}
?>
