<?php
include "../auth/seguridad.php";
include "./templates/head.php";
include "../config/dbconnect.php";

$type_user = $_SESSION['type_user'];

$sql = "SELECT  * FROM products";
$result = $link->prepare($sql);
$result->execute();


echo "<h1>Lista de Productos</h1>";

echo "<table border>";

echo "
        <tr>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Categoria</td>
            <td>Precio</td>
            <td>Imagen</td>
    ";
    if ($type_user == "editor") {
        echo "
            <td>Editar</td>
            <td>Borrar</td>
        ";
    }
echo "</tr>";


while ($row = $result->fetch()){

    echo "
            <tr>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4] €</td>
                <td><img src='$row[5]'></td>
        ";
        if ($type_user == "editor") {
            echo "
                <td><a class='edit' href='updateproduct.php?id=".$row["0"]."'></a></td>
                <td><a class='delete' href='deleteproduct.php?id=".$row["0"]."' ></a></td>
            ";
        }

        echo "</tr>";
} 

echo "</table>";

if ($type_user == "editor") {
  echo "
    <div class='container'>
        <a href='newproduct.php' class='button'>Nuevo producto</a>
    </div>
    ";
}




echo "
    <div class='container'>
        <a href='home.php' class='button'>Volver a Inicio</a>
    </div>
";





include "../view/templates/footer.php";
?>