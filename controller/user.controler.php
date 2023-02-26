<?php

require_once "../config/dbconnect.php";
require_once "../view/templates/head.php";


if (
        empty($_POST['dni_number']) ||
        empty($_POST['dni_letter']) ||
        empty($_POST['user']) ||
        empty($_POST['password']) ||
        empty($_POST['name']) ||
        empty($_POST['direction']) ||
        empty($_POST['location']) ||
        empty($_POST['province']) ||
        empty($_POST['phone']) ||
        empty($_POST['email'])
    ) {
        echo "
            <h2>Debes rellenar todos los datos, vuelve al formulario</h2>
            <div class='container'>
                <a href='/view/registrate.php' class='button'>Volver</a>
            </div>
    ";
    die();
}

$dni_number=$_POST['dni_number'];
$dni_letter=strtoupper($_POST['dni_letter']);
$user=$_POST['user'];
$password=$_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$name=$_POST['name'];
$direction=$_POST['direction'];
$location=$_POST['location'];
$province=$_POST['province'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$letras = "TRWAGMYFPDXBNJZSQVHLCKE";
$indice = $dni_number % 23;
$calculada = $letras[$indice];

if ($calculada != $dni_letter) {
    echo "
    <h2>DNI incorrecto</h2>
    <div class='container'>
        <a href='/view/registrate.php' class='button'>Volver</a>
    </div>
    ";
    die();
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "
        <h2>Debes escribir un Email correcto, vuelve al formulario</h2>
        <div class='container'>
            <a href='/view/registrate.php' class='button'>Volver</a>
        </div>
    ";
    die();
}




// Comprobar el dni
$sql = "SELECT * FROM users WHERE dni_number = '$dni_number'";
$resultado = $link->prepare($sql);
$resultado->execute();

if ($resultado->fetch() != 0) {
    echo "
        <h2>El DNI ya ha sido registrado</h2>
        <div class='container'>
            <a href='/view/registrate.php' class='button'>Volver</a>
        </div>
    ";
    die();
}


$sql = "SELECT * FROM users WHERE user = '$user'";
$resultado = $link->prepare($sql);
$resultado->execute();

if ($resultado->fetch() != 0) {
    echo "
        <h2>El usuario ya ha sido registrado</h2>
        <div class='container'>
            <a href='/view/registrate.php' class='button'>Volver</a>
        </div>
    ";
    die();
}



// Insertar datos

$sql = "INSERT INTO clientesdwes.users (user, password, type, dni_number, dni_letter, name, direction, location, province, phone, email) VALUES ('$user', '$password_hash', 'client', '$dni_number', '$dni_letter', '$name', '$direction', '$location', '$province', '$phone', '$email')";
$insertar = $link->prepare($sql);
$insertar->execute();



if(!$insertar) {
    echo "<h2>Ha habido un error al insertar los datos.<h2>";
    echo "
    <div class='container'>
        <a href='/view/registrate.php' class='button'>Volver</a>
    </div>
    ";
    die();
} else {
    echo "<h2>Los datos han sido introducidos satisfactoriamente</h2>";
    echo "
        <div class='container'>
            <a href='/index.php' class='button'>Ir al panel de registro</a>
        </div>
    ";
}



require_once "../view/templates/footer.php";
