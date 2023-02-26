<?php
require_once "../auth/seguridad.php";
require_once "./templates/head.php";
require_once "../config/dbconnect.php";

$type_user = $_SESSION['type_user'];
$user = $_SESSION['name_user'];

echo "<h1>Lista de Usuarios</h1>";



if ($type_user == "admin") {
    echo '
<form method="POST" action="panel.php">
    <div>
        <label for="buscar">Buscar usuario (DNI sin letra):</label>
        <input name="buscar" type="number" id="buscar" max="99999999" placeholder="21785397">
    </div>

    <div class="container">
        <input name="Enviar" value="Buscar" type="submit" class="button"><br>
    </div>

</form>
';
}


if (isset($_REQUEST['buscar'])) {
    $dni=$_REQUEST['buscar'];
} else {
    $dni = "";
}





if ($type_user == "admin") {
    if ($dni != "")  {
        $sql = "SELECT  * FROM users WHERE dni_number LIKE '%$dni%'";
        $result = $link->prepare($sql);
        $result->execute();
    } else {
        $sql = "SELECT  * FROM users";
        $result = $link->prepare($sql);
        $result->execute();
    }

} else {
    $sql = "SELECT  * FROM users where user = '$user'";
    $result = $link->prepare($sql);
    $result->execute();
}


echo "<table border>";

echo "
        <tr>
            <td>DNI</td>
            <td>Nombre</td>
            <td>Dirección</td>
            <td>Localidad</td>
            <td>Provincia</td>
            <td>Teléfono</td>
            <td>Correo electrónico</td>
            <td>Editar</td>
            <td>Borrar</td>
        </tr>
    ";


while ($row = $result->fetch()){

    echo "
            <tr>
                <td>$row[4] - $row[5]</td>
                <td>$row[6]</td>
                <td>$row[7]</td>
                <td>$row[8]</td>
                <td>$row[9]</td>
                <td>$row[10]</td>
                <td>$row[11]</td>
        ";
         
        if ($row[3] != 'admin') {
            echo "  
                <td><a class='edit' href='updateuser.php?id=".$row["0"]."'></a></td>
            ";
        }
        if ($row[3] != 'admin') {
            echo "
                <td><a class='delete' href='deleteuser.php?id=".$row["0"]."' ></a></td>
            ";
        }

        echo "</tr>";
} 

echo "</table>";


if ($type_user == "admin") {
    echo "
            <div class='container'>
                <a href='registrate.php' class='button'>Nuevo</a>
            </div>
        ";
}
echo "
    <div class='container'>
        <a href='home.php' class='button'>Volver a Inicio</a>
    </div>
";


require_once "../view/templates/footer.php";
