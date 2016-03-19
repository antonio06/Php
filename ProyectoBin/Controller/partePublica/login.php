<?php
require_once '../../Model/BinDb.php';
require_once '../../Model/Persona.php';
$email = $_POST['email'];
$password = Persona::getPasswordByEmail($email);
$contrasenaIntroducida = $_POST['password'];
if (password_verify($contrasenaIntroducida, $password)){
     echo "Correcto";
}else {
    echo "Incorrecto";
}