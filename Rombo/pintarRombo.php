<?php
$altura = $_POST['altura'];

// Tenemos en cuenta que para pintar el rombo tenemos que quitar
// los vertices del principio y la linea del medio por lo tanto 
// si la altura introducida es 7 restamos los vertices y la linea del medio
//lo divido para ver los saltos que tiene que dar el bucle sin tener en cuenta 
// el vertice y la linea del medio
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
    for ($c = 0; $c<$espacios1; $c++){
        echo "<img src='imagenes/blanco.jpg'>";
    }
    for ($d = 0; $d<$caracter; $d++){
        echo "<img src='imagenes/almohada.jpg'>";
    }
    echo "<br>";
$caracter+=2;
$espacios1--;
}


for ($e = 0; $e<$caracter; $e++){
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

