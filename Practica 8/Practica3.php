<?php

// Necesitamos las sesiones para almacenar los cambios de las ventas
session_start();
require_once './Zona/Zona.php';

// Si es la primera vez que entramos inicializamos las entradas
if (!isset($_SESSION['entradas'])) {
    $_SESSION['entradas'] = [1000, 200, 25];
}

// Inicializamos las zonas con las entradas almacenadas en la sesión
$zonaPrincipal = new Zona($_SESSION["entradas"][0]);
$zonaCompraVenta = new Zona($_SESSION["entradas"][1]);
$zonaVIP = new Zona($_SESSION["entradas"][2]);

// Cargamos la vista en una variable
$vista = file_get_contents("./Zona/vista.php");

// $resultado almacenará los datos que necesitamos para cambiar las variables de la vista
$resultado = array(
    "mensaje" => "",
    "entradasPrincipal" => $zonaPrincipal->getEntradas(),
    "entradasCompraVenta" => $zonaCompraVenta->getEntradas(),
    "entradasVIP" => $zonaVIP->getEntradas(),
);


// Si recibimos un POST del formulario
if (isset($_POST["vender"])) {
    // Recogemos los valores del input y select (número de entradas y zona)
    $zona = intval($_POST['zona']);
    $numeroEntradas = intval($_POST['entradas']);

    // Para cada zona:
    // - Actualizamos el mensaje por el valor recibido de venderEntradas (o éxito o error)
    // - Actualizamos el número de entradas de la zona en la que hayamos vendido.
    // Si se diera el caso de que la zona no está en la lista, guardamos en mensaje un error
    switch ($zona) {
        case 1:
            $resultado["mensaje"] = $zonaPrincipal->venderEntradas($numeroEntradas);
            $resultado["entradasPrincipal"] = $zonaPrincipal->getEntradas();
            break;
        case 2:
            $resultado["mensaje"] = $zonaCompraVenta->venderEntradas($numeroEntradas);
            $resultado["entradasCompraVenta"] = $zonaCompraVenta->getEntradas();
            break;
        case 3:
            $resultado["mensaje"] = $zonaVIP->venderEntradas($numeroEntradas);
            $resultado["entradasVIP"] = $zonaVIP->getEntradas();
            break;
        default:
            $resultado["mensaje"] = "La zona que has seleccionado no existe.";
            break;
    }

    // Actualizamos las entradas en la sesión (para mantener los datos)
    $_SESSION['entradas'] = [$zonaPrincipal->getEntradas(), $zonaCompraVenta->getEntradas(), $zonaVIP->getEntradas()];
}

// Función para cambiar las variables de la vista por sus valores
// IMPORTANTE: si una variable tiene el '&' delante no se clona dentro de la función sino que usa la existente.
// Por defecto todos los parámetros de las funciones son clones de los originales
function actualizarVista(&$vista, $array) {
    // Por cada índice de $resultado cambiamos el contenido de la variable de $vista
    foreach ($array as $clave => $valor) {
        $vista = preg_replace("/{{" . $clave . "}}/", $valor, $vista);
    }
}

// Llamamos a la función actualizarVista para actualizar las variables
actualizarVista($vista, $resultado);

// Mostramos la vista
header("Content-type: text/html");
echo $vista;
