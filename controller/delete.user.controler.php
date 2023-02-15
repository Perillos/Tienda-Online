<?php
include "../auth/seguridad.php";
include "../view/templates/head.php";
include "../config/dbconnect.php";


$value = $_GET['id'];

$type_user = $_SESSION['type_user'];

$sql = "SELECT  * FROM users WHERE id = '$value'";
$resulSel = $link->prepare($sql);
$resulSel->execute();
$array1 = $resulSel->fetch();

$sql = "DELETE FROM users WHERE id = '$value'";

$resulDel = $link->prepare($sql);
$resulDel->execute();

if(!$resulDel) {
    echo "<h2>Ha habido un error al borrar los datos. $my_error<h2>";
} else {
    echo "<h2>Los datos han sido borrados satisfactoriamente</h2>";
    echo "<table border>";

    echo "
            <tr>
                <td>Nº Cliente:</td>
                <td>DNI</td>
                <td>Nombre</td>
                <td>Dirección</td>
                <td>Localidad</td>
                <td>Provincia</td>
                <td>Teléfono</td>
                <td>Correo electrónico</td>

            </tr>
        ";
    echo "
        <tr>
            <td>$array1[0]</td>
            <td>$array1[5]</td>
            <td>$array1[4]</td>
            <td>$array1[6]</td>
            <td>$array1[7]</td>
            <td>$array1[8]</td>
            <td>$array1[9]</td>
            <td>$array1[10]</td>
        </tr>
    ";
    echo "</table border>";
}
if ($type_user != 'admin') {
  session_destroy();
}

?>

<div class='container'>
    <a href='/index.php' class='button'>Volver al panel</a>
</div>