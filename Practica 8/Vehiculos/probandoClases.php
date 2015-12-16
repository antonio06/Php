<?php

session_start();
include_once 'coche.php';
include_once 'bicicleta.php';

// Creo una variable de sesión llamada TotalVehiculos si no está creada al principio
// su valor será 0 
if (!isset($_SESSION['TotalVehiculos'])) {
    $_SESSION['TotalVehiculos'] = 0;
}

// Con un setter asigno a lo que tengo en TotalVehiculos el valor que tenga en ese
// momento al principio será 0 y sumará conforme cree objetos 
Vehiculo::setTotalVehiculos($_SESSION['TotalVehiculos']);

// Compruebo si la sesión de coche1 y bicicleta1 están creadas en caso de que no
// estén creadas les asigno los valores llamando al constructor
// Y los serializo es decir paso todo mi objeto a formato "texto" y se guarda 
// en la sesión 

if (!isset($_SESSION['coche1'])) {
    $_SESSION['coche1'] = serialize(new Coche(4, "verde", 1600));
}

if (!isset($_SESSION['bicicleta1'])) {
    $_SESSION['bicicleta1'] = serialize(new Bicicleta(2, "rojo", 2));
}

// Creo una variable de sesión llamada KmTotales si no está creada al principio
// su valor será 0 
if (!isset($_SESSION['KmTotales'])) {
    $_SESSION['KmTotales'] = 0;
}

//Ahora los des-serializo es decir paso del formato texto a formato "objeto"
// y así poder trabajar en el programa
$coche1 = unserialize($_SESSION['coche1']);
$bicicleta1 = unserialize($_SESSION['bicicleta1']);

// Con un setter asigno a lo que tengo en KmTotales el valor que tenga en ese
// momento al principio será 0 y sumará conforme los vehículos recorran km
Vehiculo::setKmTotales($_SESSION['KmTotales']);



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
        echo "El coche ha recorrido " . $coche1->getKilometros();
        break;

    case "andarBicicleta":
        $kilometros = $_POST['kilometrosBicicleta'];
        $bicicleta1->andar($kilometros);
        break;

    case "caballito":
        $bicicleta1->hacerCaballito();
        break;

    case "verKmBicicleta":
        echo "La bicicleta ha recorrido " . $bicicleta1->getKilometros();
        break;

    case "kmTotal";
        echo "Los coches y las bicicletas han recorrido " . Vehiculo::getKmTotales() . " km";
        break;

    case "vehiculosTotales":
        echo "Total de vehiculos creados " . Vehiculo::getTotalVehiculos();
        break;
    default:
        break;
}

// Una vez he operado con los objetos los guardo en la sesión de nuevo 
$_SESSION['coche1'] = serialize($coche1);
$_SESSION['bicicleta1'] = serialize($bicicleta1);
// Actualizo lo que tengo en la sesión de kmTotales al getter correspondiente
$_SESSION['KmTotales'] = Vehiculo::getKmTotales();
// Actualizo lo que tengo en la sesión de VehiculosCreados al getter correspondiente
$_SESSION['totalVehiculos'] = Vehiculo::getTotalVehiculos();
