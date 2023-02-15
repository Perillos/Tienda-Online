<?php
include "../auth/seguridad.php";
include "./templates/head.php";
include "../config/dbconnect.php";


$value = $_GET['id'];

$sql = "SELECT  * FROM products WHERE id = '$value'";
$result = $link->prepare($sql);
$result->execute();
$row = $result->fetch();

echo "<h1>Estas seguro que quires eliminar el producto</h1>";

echo "<table border>";

echo "
    <tr>
        <td>Nombre</td>
        <td>Categoría</td>
        <td>Precio</td>
        <td>Imagen</td>
    </tr>
";
    echo "
        <tr>
            <td>$row[2]</td>
            <td>$row[3]</td>
            <td>$row[4] €</td>
            <td><img src='$row[5]'></td>
        </tr>
    ";
    echo "</table>";

    echo "
        <div class='container'>
            <a href='/controller/delete.product.controler.php?id=".$row["0"]."' class='button'>Eliminar</a>
            <a href='panel.php' class='button'>Volver</a>
        </div>
    ";


    
include "../view/templates/footer.php";
?>