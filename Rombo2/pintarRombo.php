<?php
$altura = $_POST['altura'];

$altura1 = ($altura - 3)/2;
$altura2 = ($altura - 3)/2;
$espacios1 = $altura - 4;
$espacios2 = 1;
$caracter = 3;

for ($a = 0; $a<$espacios1; $a++){
    echo "<img src='imagenes/blanco.jpg'>";
}

echo "<img src='imagenes/almohada.jpg'> <br>";
$espacios1--;

for ($b = 0; $b<$altura1; $b++){
    for ($a = 0; $a<$espacios1; $a++){
        echo "<img src='imagenes/blanco.jpg'>";
    }
    for ($c = 0; $c<$caracter; $c++){
        echo "<img src='imagenes/almohada.jpg'>";
    }
    echo "<br>";
$caracter+=2;
$espacios1--;
}


for ($d = 0; $d<$caracter; $d++){
    echo "<img src='imagenes/almohada.jpg'>";
}
echo "<br>";
$caracter-=2;
for ($a = 0; $a<$altura2; $a++){
    for ($b = 0; $b<$espacios2; $b++){
        echo "<img src='imagenes/blanco.jpg'>";
    }
    for ($c = 0; $c<$caracter; $c++){
        echo "<img src='imagenes/almohada.jpg'>";
    }
    echo "<br>";
$caracter-=2;
$espacios2++;
}



for ($d = 0; $d<$espacios2; $d++){
    echo "<img src='imagenes/blanco.jpg'>";
}

echo "<img src='imagenes/almohada.jpg'> <br>";
?>

