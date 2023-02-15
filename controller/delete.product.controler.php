<?php
include "../auth/seguridad.php";
include "../view/templates/head.php";
include "../config/dbconnect.php";


$value = $_GET['id'];

$sql = "SELECT  * FROM products WHERE id = '$value'";
$resulSel = $link->prepare($sql);
$resulSel->execute();
$row = $resulSel->fetch();

$sql = "DELETE FROM products WHERE id = '$value'";
$resulDel = $link->prepare($sql);
$resulDel->execute();

if(!$resulDel) {
    echo "<h2>Ha habido un error al borrar los datos. $my_error<h2>";
} else {
    echo "<h2>Los datos han sido borrados satisfactoriamente</h2>";
    echo "<table border>";

    echo "
            <tr>
                <td>Nombre</td>
            </tr>
        ";
    echo "
        <tr>
            <td>$row[1]</td>

        </tr>
    ";
    echo "</table border>";
}
unlink(".."."$row[5]");
?>

<div class='container'>
    <a href='/index.php' class='button'>Volver al panel</a>
</div>