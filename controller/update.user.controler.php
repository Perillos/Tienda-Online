<?php
require_once "../auth/seguridad.php";
require_once "../view/templates/head.php";
require_once "../config/dbconnect.php";



if (
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


$id_user = $_GET['id'];
$user=$_POST['user'];
$dni_number=$_POST['dni_number'];
$dni_letter=$_POST['dni_letter'];
$name=$_POST['name'];
$direction=$_POST['direction'];
$location=$_POST['location'];
$province=$_POST['province'];
$phone=$_POST['phone'];
$email=$_POST['email'];



if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "
        <h2>Debes escribir un Email correcto, vuelve al formulario</h2>
        <div class='container'>
            <a href='/view/registrate.php' class='button'>Volver</a>
        </div>
    ";
    die();
}


$sql = "UPDATE users
SET name = '$name', direction = '$direction', location = '$location', province = '$province', phone = '$phone', email = '$email' WHERE id = '$id_user'";
$update = $link->prepare($sql);
$update = $update->execute();;



if(!$update) {
    echo "<h2>Ha habido un error al insertar los datos.<h2>";
    echo "
    <div class='container'>
        <a href='/view/home.php' class='button'>Volver</a>
    </div>
    ";
    die();
} else {
    echo "<h2>Los datos han sido introducidos satisfactoriamente</h2>";

    echo "<table border>";

echo "
        <tr>
            <td>DNI</td>
            <td>Usuario</td>
            <td>Nombre</td>
            <td>Dirección</td>
            <td>Localidad</td>
            <td>Provincia</td>
            <td>Teléfono</td>
            <td>Email</td>
        </tr>
    ";

echo "
    <tr>
        <td>$dni_number-$dni_letter</td>
        <td>$user</td>
        <td>$name</td>
        <td>$direction</td>
        <td>$location</td>
        <td>$province</td>
        <td>$phone</td>
        <td>$email</td>
        
    </tr>
";

echo "</table>";

    echo "
        <div class='container'>
            <a href='/index.php' class='button'>Ir al panel de registro</a>
        </div>
    ";
}



require_once "../view/templates/footer.php";
