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

//Pintamos los espacios del principio
for ($a = 0; $a<$espacios1; $a++){
    echo "<img src='imagenes/blanco.jpg'>";
}
//Como el vertice primero no cambia lo pintamos del tirón
echo "<img src='imagenes/almohada.jpg'> <br>";
$espacios1--;

//Nuestro bucle principal que controla las veces que tiene 
//que repetir el proceso
for ($b = 0; $b<$altura1; $b++){
    //Pintamos los espacios del principio
    for ($c = 0; $c<$espacios1; $c++){
        echo "<img src='imagenes/blanco.jpg'>";
    }
    //Pintamos el caracter que forma el rombo
    for ($d = 0; $d<$caracter; $d++){
        echo "<img src='imagenes/almohada.jpg'>";
    }
    echo "<br>";
//sumamos en dos el caracter
$caracter+=2;
//Disminuimos los espacios en blanco
$espacios1--;
}

//Pintamos la linea del medio del rombo
for ($e = 0; $e<$caracter; $e++){
    echo "<img src='imagenes/almohada.jpg'>";
}
echo "<br>";
//Decrementamos en dos los caracteres 
$caracter-=2;
//Bucle principal 
for ($a = 0; $a<$altura2; $a++){
//Pintamos los espacios del principio
    for ($b = 0; $b<$espacios2; $b++){
        echo "<img src='imagenes/blanco.jpg'>";
    }
    //Pintamos los caracteres
    for ($c = 0; $c<$caracter; $c++){
        echo "<img src='imagenes/almohada.jpg'>";
    }
    echo "<br>";
    //Los caracteres van a menos en cada vuelta
$caracter-=2;
//Los espacios aumentan 
$espacios2++;
}


//Pintamos los espacios en blanco 
for ($d = 0; $d<$espacios2; $d++){
    echo "<img src='imagenes/blanco.jpg'>";
}
//Pintamos el último vertice del rombo
echo "<img src='imagenes/almohada.jpg'> <br>";
?>

