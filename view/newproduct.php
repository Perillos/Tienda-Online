<?php
include "../auth/seguridad.php";
include "./templates/head.php";

?>

<h1>Añade el producto</h1>

<form name="formaddproduct" method="post" action="/controller/producto.controler.php" enctype="multipart/form-data">

  <div>
      <label for="reference">Referencia del producto:</label>
      <input name="reference" id="reference" type="text"  placeholder="uEl47896" required>
  </div>

  <div>
      <label for="nameproduct">Nombre del producto:</label>
      <input name="nameproduct" id="nameproduct" type="text"  placeholder="Camisa molona" required>
  </div>



  <div>
      <label for="priceproduct">Precio del producto (€):</label>
      <input name="priceproduct" id="priceproduct" type="number" placeholder="10.00" step="0.01" min="1" max="9999" required>
  </div>
  
  <div>
    <label for="typeproduct">Tipo de producto:</label>
    <select name="typeproduct" id="typeproduct" required>
      <option value="Sombrero" selected>Sombrero</option>
      <option value="Camisa">Camisa</option>
      <option value="Pantalon">Pantalon</option>
      <option value="Calcetines">Calcetines</option>
    </select>
  </div>

  <div>
    <label for="descriptionproduct">Descripción del producto:</label>
    <textarea  name="descriptionproduct" id="descriptionproduct" placeholder="Añade una descripción obligatoriamente" required></textarea>
  </div>

  <div>
    <label for="imagenproduct">Imagen del producto:</label>
    <input name="imagenproduct" id="imagenproduct" type="file" accept="image/*" required>
  </div>

  <div class="container">
    <input name="submit" value="Enviar datos" type="submit" class="button">
  </div>

</form>


<?php
include "./templates/footer.php";

?>