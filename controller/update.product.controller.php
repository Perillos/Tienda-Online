<?php
include "../auth/seguridad.php";
include "../view/templates/head.php";
include "../config/dbconnect.php";



if (
    empty($id_product = $_GET['id']) ||
    empty($_POST['name']) ||
    empty($_POST['priceproduct']) ||
    empty($_POST['typeproduct']) ||
    empty($_POST['descriptionproduct'])
) {
    echo "
        <h2>Debes rellenar todos los datos, vuelve al formulario</h2>
        <div class='container'>
            <a href='/view/products.php' class='button'>Volver</a>
        </div>
";
die();
}


$id_product = $_GET['id'];
$nameproduct = $_POST['name'];
$priceproduct = $_POST['priceproduct'];
$categori = $_POST['typeproduct'];
$descriptionproduct = $_POST['descriptionproduct'];
$reference = $_POST['reference'];

if (empty($_FILES['imageproduct']['tmp_name'])) {
  
  $image = $_POST['image'];
  
  $sql = "UPDATE products SET name = '$nameproduct', price = '$priceproduct', categori = '$categori', description = '$descriptionproduct' WHERE id = '$id_product'";
  $update = $link->prepare($sql);
  $update = $update->execute();

} else {

    $image = $_FILES['imageproduct'];

    $aimages_allowed = array("image/jpeg", "image/png", "image/gif");
    if (!in_array($image['type'], $aimages_allowed)) {
      echo "<h2>Error: sólo se permiten archivos de imagen (JPEG, PNG o GIF)</h2>";
      echo "
          <div class='container'>
              <a href='/view/products.php' class='button'>Volver</a>
          </div>
      ";
      die();
    }
    $max_size = 200;
    if (getimagesize($image['tmp_name'])[0] > $max_size || getimagesize($image['tmp_name']) > $max_size) {
      echo "<h2>Error: el tamaño de la imagen debe ser inferior a 200x200 pixels<h2>";
      echo "
      <div class='container'>
      <a href='/view/products.php' class='button'>Volver</a>
      </div>
      ";
      die();
    }

    $max_file = 300000;
    if ($image['size'] > $max_file) {
    
      echo "<h2>Error: el tamaño del archivo debe ser inferior a 300KB</h2>";
      echo "
          <div class='container'>
          <a href='/view/products.php' class='button'>Volver</a>
          </div>
      ";
      die();
    }

    $old_image = $_POST['image'];
    unlink(".."."$old_image");

    move_uploaded_file($image['tmp_name'], "../build/img/" . $image['name']);
    $image = "/build/img/".$image['name'];

    $sql = "UPDATE products SET name = '$nameproduct', price = '$priceproduct', categori = '$categori', price = '$priceproduct', description = '$descriptionproduct', image = '$image' WHERE id = '$id_product'";
    $update = $link->prepare($sql);
    $update = $update->execute();;
}




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
            <td>Ref.</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Categoría</td>
            <td>Precio</td>
            <td>Imagen</td>
        </tr>
    ";
    

    echo "
        <tr>
            <td>$reference</td>
            <td>$nameproduct</td>
            <td>$descriptionproduct</td>
            <td>$categori</td>
            <td>$priceproduct €</td>
            <td><img src='$image'></td>
        </tr>
    ";

    echo "</table>";

    echo "
        <div class='container'>
            <a href='/index.php' class='button'>Ir al panel de registro</a>
        </div>
    ";
}



include "../view/templates/footer.php";
?>
