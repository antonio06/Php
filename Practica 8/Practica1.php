<?php
// Hola, soy el Controlador :)

// Inicializamos la sesión para mostrar tiradas totales
session_start();
if (!isset($_SESSION["tiradas"])) {
    $_SESSION["tiradas"] = 0;
}

// $resultado nos servirá para modificar la vista
$resultado = "";

// la $vista contiene todo el HTML de la página
$vista = file_get_contents("./DadoPoker/dados.php");

// El controlador atiende las peticiones (en este caso un post de envio de formulario.
// Si se ha enviado post realizamos la tirada de dados
if (isset($_POST["tirar"])) {
    
    require_once './DadoPoker/DadoPoker.php';
    // Inicialización de dados
    $dado1 = new DadoPoker();
    $dado2 = new DadoPoker();
    $dado3 = new DadoPoker();
    $dado4 = new DadoPoker();
    $dado5 = new DadoPoker();

    // Tiramos los dados
    $dado1->tirar();
    $dado2->tirar();
    $dado3->tirar();
    $dado4->tirar();
    $dado5->tirar();
    
    // Almacenamos las tiradas totales
    $_SESSION["tiradas"]+=DadoPoker::getTiradasTotales();

    // Creamos la respuesta para inyectarla en la vista
    $resultado = "<ul>";
    $resultado .= "<li> Dado1 ha sacado " . $dado1->nombreFigura() . "</li>";
    $resultado .= "<li> Dado2 ha sacado " . $dado2->nombreFigura() . "</li>";
    $resultado .= "<li> Dado3 ha sacado " . $dado3->nombreFigura() . "</li>";
    $resultado .= "<li> Dado4 ha sacado " . $dado4->nombreFigura() . "</li>";
    $resultado .= "<li> Dado5 ha sacado " . $dado5->nombreFigura() . "</li>";
    $resultado .= "</ul>";
    $resultado .= "<p>Se ha tirado el dado " . $_SESSION["tiradas"] . " veces</p>";

    // Metemos el resultado en la vista
    $vista = preg_replace("/{{resultado}}/", $resultado, $vista);
} else {
    // En caso de no ser peticion POST (tirar dados) mostramos la vista con un mensaje modificado
    $resultado = "Pulsa tirar para realizar una tirada de dados";
    $vista = preg_replace("/{{resultado}}/", $resultado, $vista);
}

// Mostramos la vista
header("Content-type: text/html");
echo $vista;

