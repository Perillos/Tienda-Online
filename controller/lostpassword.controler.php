<?php

include "../config/dbconnect.php";
include "../view/templates/head.php";


if (
        empty($_POST['user']) ||
        empty($_POST['dni_number']) ||
        empty($_POST['email']) ||
        empty($_POST['password'])
    ) {
        echo "
            <h2>Debes rellenar todos los datos, vuelve al formulario</h2>
            <div class='container'>
                <a href='/view/lostpassword.php' class='button'>Volver</a>
            </div>
    ";
    die();
}

$user=$_POST['user'];
$dni_number=$_POST['dni_number'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "
        <h2>Debes escribir un Email correcto, vuelve al formulario</h2>
        <div class='container'>
            <a href='/view/lostpassword.php' class='button'>Volver</a>
        </div>
    ";
    die();
}



$sql = "SELECT  * FROM users WHERE dni_number = '$dni_number'";
$result = $link->prepare($sql);
$result->execute();

// Comprobar que el usuario existe
if (!$row = $result->fetch()) {
    echo "
    <h2>El usuario no existe, puedes registrarte</h2>
    <div class='container'>
    <a href='/view/registrate.php' class='button'>Registrarse</a>
    </div>
    ";
    die();
}


// $row = $result->fetch();
$user_id = $row[0];
// Comprobar que el usuario coinciden sus datos
if ($row[1] != $user || $row[11] != $email) {
    echo "
    <h2>Los datos no coinciden</h2>
    <div class='container'>
    <a href='/view/registrate.php' class='button'>Registrarse</a>
    </div>
    ";
    die();
}


$sql = "UPDATE  users SET password = '$password_hash' WHERE id = '$user_id'";
$update = $link->prepare($sql);
$update->execute();
$update->fetch();



if(!$update) {
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



include "../view/templates/footer.php";
?>
