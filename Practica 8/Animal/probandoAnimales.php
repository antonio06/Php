
<?php
session_start();

include_once 'Perro.php';
include_once 'Gato.php';
include_once 'Canario.php';
include_once 'Pinguino.php';
include_once 'Lagarto.php';

if (!isset($_SESSION['perro1'])) {
    $_SESSION['perro1'] = serialize(new Perro("perro", "macho", 20, "carnivoro", "caliente"));
}

if (!isset($_SESSION['perro2'])) {
    $_SESSION['perro2'] = serialize(new Perro("perro", "hembra", 15, "carnivoro", "caliente"));
}

if (!isset($_SESSION['canario1'])) {
    $_SESSION['canario1'] = serialize(new Canario("canario", "macho", 2, "fuctivoro", "caliente"));
}

if (!isset($_SESSION['lagarto1'])) {
    $_SESSION['lagarto1'] = serialize(new Lagarto("lagarto", "macho", 9, "carnivoro", "fria"));
}

$perro1 = unserialize($_SESSION['perro1']);
$perro2 = unserialize($_SESSION['perro2']);
$canario1 = unserialize($_SESSION['canario1']);
$lagarto1 = unserialize($_SESSION['lagarto1']);

$accion = $_POST['accion'];
switch ($accion) {

    case "comerPerro":
        $comida = $_POST['comidaPerro'];
        echo $perro1->Comer($comida);
        break;

    case "hablar":
        echo $perro1->Hablar();
        echo $canario1->Hablar();
        echo $lagarto1->Hablar();
        break;

    case "aparearse":
        echo $perro1->Aparear($perro2);
        break;

    case "aparearseDistinto":
        echo $perro1->Aparear($lagarto1);
        break;

    default:
        break;
}

$_SESSION['perro1'] = serialize($perro1);
$_SESSION['perro2'] = serialize($perro2);
$_SESSION['canario1'] = serialize($canario1);
$_SESSION['lagarto1'] = serialize($lagarto1);