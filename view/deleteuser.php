<?php
include "../auth/seguridad.php";
include "./templates/head.php";
include "../config/dbconnect.php";


$value = $_GET['id'];

$sql = "SELECT  * FROM users WHERE id = '$value'";
$result = $link->prepare($sql);
$result->execute();
$row = $result->fetch();

echo "<h1>Estas seguro que quires eliminar al cliente</h1>";

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
            <td>$row[0]</td>
            <td>$row[5]</td>
            <td>$row[4]</td>
            <td>$row[6]</td>
            <td>$row[7]</td>
            <td>$row[8]</td>
            <td>$row[9]</td>
            <td>$row[10]</td>
        </tr>
    ";
    echo "</table>";

    echo "
        <div class='container'>
            <a href='/controller/delete.user.controler.php?id=".$row["0"]."' class='button'>Eliminar</a>
            <a href='panel.php' class='button'>Volver</a>
        </div>
    ";



include "../view/templates/footer.php";
?>