<?php
require_once "../auth/seguridad.php";
require_once "./templates/head.php";
require_once "../config/dbconnect.php";


$id_product = $_GET['id'];

$sql = "SELECT  * FROM products WHERE id = '$id_product'";
$result = $link->prepare($sql);
$result->execute();
$product_array = $result->fetch();

?>

<h1>Modifica el producto</h1>

<form name="updateproduct" method="post" action="/controller/update.product.controller.php?id=<?php echo $id_product; ?>" enctype="multipart/form-data">

  <div>
    <label for="id">Nº Producto:</label>
    <input name="id" type="text" id="id" disabled value="<?php echo $product_array[0]; ?>">
  </div>

  <div>
    <p>Referencia del producto: <?php echo $product_array[6]; ?></p>
    <input name="reference" type="text" id="reference" hidden value="<?php echo $product_array[6]; ?>">
  </div>

  <div>
    <label for="name">Nombre del producto:</label>
    <input name="name" type="text" id="name" value="<?php
                                                    echo $product_array[1]; ?>" require_onced>
  </div>

  <div>
    <label for="priceproduct">Precio del producto (€):</label>
    <input name="priceproduct" id="priceproduct" type="number" value="<?php
                                                                      echo $product_array[4]; ?>" step="0.01" min="1" max="9999" require_onced>
  </div>

  <div>
    <label for="typeproduct">Tipo de producto:</label>
    <select name="typeproduct" id="typeproduct" require_onced>
      <option value="Sombrero" <?php $selected = ($product_array[3] == "Sombrero") ? "selected" : "";
                                echo $selected; ?>>Sombrero</option>
      <option value="Camisa" <?php $selected = ($product_array[3] == "Camisa") ? "selected" : "";
                              echo $selected; ?>>Camisa</option>
      <option value="Pantalon" <?php $selected = ($product_array[3] == "Pantalon") ? "selected" : "";
                                echo $selected; ?>>Pantalon</option>
      <option value="Calcetines" <?php $selected = ($product_array[3] == "Calcetines") ? "selected" : "";
                                  echo $selected; ?>>Calcetines</option>
    </select>
  </div>

  <div>
    <label for="descriptionproduct">Descripción del producto:</label>
    <textarea name="descriptionproduct" id="descriptionproduct" require_onced><?php echo $product_array[2]; ?>
        </textarea>
  </div>

  <div>
    <label for="imageproduct">Imagen del producto:</label> <img src="<?php echo $product_array[5]; ?>">
    <input name="imageproduct" id="imageproduct" type="file" accept="image/*">
  </div>
  <input name="image" type="text" hidden id="image" maxlength="1" value="<?php echo $product_array[5]; ?>">

  <div class="container">
    <input name="submit" value="Enviar" type="submit" class="button">
  </div>

</form>



<?php
require_once "../view/templates/footer.php";
?>