<?php

session_start();
include_once 'coche.php';
include_once 'bicicleta.php';

if (!isset($_SESSION['coche1'])) {
    $_SESSION['coche1'] = serialize(new coche(4, "verde", 1600));
}

if (!isset($_SESSION['bicicleta1'])) {
    $_SESSION['bicicleta1'] = serialize(new bicicleta(2, "rojo", 2));
}

$coche1 = unserialize($_SESSION['coche1']);
$bicicleta1 = unserialize($_SESSION['bicicleta1']);
$accion = $_POST['accion'];
switch ($accion) {

    case "andarCoche":
        $kilometros = $_POST['kilometrosCoche'];
        $coche1->andar($kilometros);
        break;

    case "quemarRuedas":
        $coche1->quemarRuedas();
        break;

    case "verKmCoche":
        $coche1->getKilometros();
        break;

    case "andarBicicleta":
        $kilometros = $_POST['kilometrosBicicleta'];
        $bicicleta1->andar($kilometros);
        break;

    case "caballito":
        $bicicleta1->hacerCaballito();
        break;

    case "verKmBicicleta":
        $bicicleta1->getKilometros();
        break;

    case "kmTotal";
        echo "Los coches y las bicicletas han recorrido " . Vehiculos::getKmTotales() . " km";
        break;

    case "vehiculosTotales":
        echo "Total de vehiculos Creados " . Vehiculos::getVehiculosCreados();
        break;
    default:
        break;
}

$_SESSION['coche1'] = serialize($coche1);
$_SESSION['bicicleta1'] = serialize($bicicleta1);
