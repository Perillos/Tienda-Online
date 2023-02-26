<?php
require_once "../auth/seguridad.php";
require_once "../config/dbconnect.php";
require_once "../view/templates/head.php";



if (
        empty($_POST['nameproduct']) ||
        empty($_POST['priceproduct']) ||
        empty($_POST['typeproduct']) ||
        empty($_POST['descriptionproduct']) ||
        empty($_POST['reference']) ||
        empty($_FILES['imagenproduct'])
    ) {
        echo "
            <h2>Debes rellenar todos los datos, vuelve al formulario</h2>
            <div class='container'>
                <a href='/view/registrate.php' class='button'>Volver</a>
            </div>
    ";
    die();
}


$nameproduct = $_POST['nameproduct'];
$priceproduct = $_POST['priceproduct'];
$categori = $_POST['typeproduct'];
$description = $_POST['descriptionproduct'];
$image = $_FILES['imagenproduct'];
$reference = $_POST['reference'];


// Valida el tipo de archivo
$aimages_allowed = array("image/jpeg", "image/png", "image/gif");
if (!in_array($image['type'], $aimages_allowed)) {
  echo "<h2>Error: sólo se permiten archivos de imagen (JPEG, PNG o GIF)</h2>";
  echo "
    <div class='container'>
        <a href='/view/newproduct.php' class='button'>Volver</a>
    </div>
  ";
  die();
}


$max_file = 300000;
if ($image['size'] > $max_file) {

  echo "<h2>Error: el tamaño del archivo debe ser inferior a 300KB</h2>";
  echo "
    <div class='container'>
      <a href='/view/newproduct.php' class='button'>Volver</a>
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

if (!preg_match("/^[a-zA-Z]{3}[0-9]{5}$/", $reference)) {
  echo "<h2>La referencia del producto tiene que tener tres letras seguida de cinco números.</h2>";
  echo "
    <div class='container'>
      <a href='/view/newproduct.php' class='button'>Volver</a>
    </div>
  ";
  die();
}


move_uploaded_file($image['tmp_name'], "../build/img/" . $image['name']);
$load_img = "/build/img/".$image['name'];

$sql = "INSERT INTO products (name, description, categori, price, image, reference) VALUES ('$nameproduct', '$description', '$categori', '$priceproduct', '$load_img', '$reference')";
$insertar = $link->prepare($sql);
$insertar->execute();



if(!$insertar) {
  echo "<h2>Ha habido un error al insertar los datos. $my_error<h2>";
  echo "
  <div class='container'>
      <a href='/view/newproduct.php' class='button'>Volver</a>
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
            <td>Categoría</td>
            <td>Precio</td>
            <td>Imagen</td>
        </tr>
    ";
  echo "
    <tr>
        <td>$reference</td>
        <td>$nameproduct</td>
        <td>$categori</td>
        <td>$priceproduct €</td>
        <td><img src='$load_img'></td>
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
