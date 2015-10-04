<?php
$altura = $_POST['altura'];
$opciones = $_POST['opciones'];
$alturaReal = $altura-2;
$imagenes;
$huecosDelante = $altura-1;
$huecosEnMedio = 1;

switch ($opciones){
    case "almohada": 
        $imagenes = "<img src='imagenes/almohada.jpg'>";
    break;
    case "camisetas": 
        $imagenes = "<img src='imagenes/camisetas.jpg'>";
    break;
    case "cubos": 
        $imagenes = "<img src='imagenes/cubos.jpg'>";
    break;
    case "gatoloco": 
        $imagenes = "<img src='imagenes/gatoloco.jpg'>";
    break;
    default :
}

//Bucle que controla el inicio de la pirámide 
for ($bucle1 = 0; $bucle1<$huecosDelante; $bucle1++){
     echo "<img src='imagenes/blanco.jpg'>";
}
echo $imagenes . "<br>";
$huecosDelante--;

//Bucle que controla el cuerpo de la pirámide
for ($bucle2 = 0; $bucle2<$alturaReal; $bucle2++){
    //Bucle que controla los huecos de delante
    for($bucle3 = 0; $bucle3<$huecosDelante; $bucle3++){
        echo "<img src='imagenes/blanco.jpg'>";
    }
    echo $imagenes;
    //Bucle que controla los huecos de dentro 
    for ($bucle4 = 0; $bucle4<$huecosEnMedio; $bucle4++){
       echo "<img src='imagenes/blanco.jpg'>";
    }
    echo $imagenes . "<br>";
    $huecosEnMedio = $huecosEnMedio+2;
    $huecosDelante--;
}

//Bucle que controla la fila del final
$huecosEnMedio = $huecosEnMedio+2;
for ($bucle5 = 0; $bucle5<$huecosEnMedio; $bucle5++){
    echo $imagenes;
}
?>

