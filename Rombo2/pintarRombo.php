<?php
$altura = $_POST['altura'];

$altura1 = ($altura - 3)/2;
$altura2 = ($altura - 3)/2;
$espacios1 = $altura - 4;
$espacios2 = 1;
$caracter = 3;
$espaciosMedio = 1;

for ($a = 0; $a<$espacios1; $a++){
    echo "<img src='imagenes/blanco.jpg'>";
}

echo "<img src='imagenes/almohada.jpg'> <br>";
$espacios1--;

for ($b = 0; $b<$altura1; $b++){
    for ($c = 0; $c<$espacios1; $c++){
        echo "<img src='imagenes/blanco.jpg'>";
    }
    echo "<img src='imagenes/almohada.jpg'>";
    for ($d = 0; $d<$espaciosMedio; $d++){
       echo "<img src='imagenes/blanco.jpg'>";
    }
    echo "<img src='imagenes/almohada.jpg'>";
    echo "<br>";
$caracter+=2;
$espacios1--;
$espaciosMedio+=2;
}


echo "<img src='imagenes/almohada.jpg'>";
    for ($e = 0; $e<$espaciosMedio; $e++){
       echo "<img src='imagenes/blanco.jpg'>";
    }
    echo "<img src='imagenes/almohada.jpg'>";
    echo "<br>";
    
$caracter-=2;
$espaciosMedio-=2;
for ($a = 0; $a<$altura2; $a++){
    for ($b = 0; $b<$espacios2; $b++){
        echo "<img src='imagenes/blanco.jpg'>";
    }
    echo "<img src='imagenes/almohada.jpg'>";
    for ($c = 0; $c<$espaciosMedio; $c++){
       echo "<img src='imagenes/blanco.jpg'>";
    }
    echo "<img src='imagenes/almohada.jpg'>";
    echo "<br>";
$caracter-=2;
$espacios2++;
$espaciosMedio-=2;
}



for ($d = 0; $d<$espacios2; $d++){
    echo "<img src='imagenes/blanco.jpg'>";
}

echo "<img src='imagenes/almohada.jpg'> <br>";
?>

