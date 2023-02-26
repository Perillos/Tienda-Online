<?php
require_once "./templates/head.php";



?>

<form name="formadduser" method="post" action="/controller/user.controler.php" enctype="multipart/form-data">
  <div>
    <label for="dni_number">Número del DNI:</label>
    <input name="dni_number" type="number" min="10000000" max="99999999" id="dni_number" placeholder="73895197" require_onced>
  </div>
  <div>
    <label for="dni_letter">Letra del DNI:</label>
    <input name="dni_letter" type="text" id="dni_letter" maxlength="1" placeholder="Z" require_onced>
  </div>
  <div>
    <label for="user">Usuario:</label>
    <input name="user" type="text" id="user" placeholder="anton" require_onced>
  </div>
  <div>
    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password" pattern=".{6,}" title="La contraseña debe tener al menos 8 caracteres" require_onced>
  </div>
  <div>
    <label for="name">Nombre:</label>
    <input name="name" type="text" id="name" placeholder="Antonio" require_onced>
  </div>

  <div>
    <label for="direction">Dirección:</label>
    <input name="direction" type="text" id="direction" placeholder="C/ Soto del real, 4" require_onced>
  </div>

  <div>
    <label for="location">Localidad:</label>
    <input name="location" type="text" id="location" placeholder="Elche" require_onced>
  </div>

  <div>
    <label for="province">Provincia:</label>
    <input name="province" type="text" id="province" placeholder="Alicante" require_onced>
  </div>

  <div>
    <label for="phone">Teléfono:</label>
    <input name="phone" type="number" id="phone" min="100000000" max="999999999" placeholder="681793567" require_onced>
  </div>

  <div>
    <label for="email">Email:</label>
    <input name="email" type="email" id="email" placeholder="antonio@gnial.com" require_onced>
  </div>

  <div class="container">
    <input name="submit" value="Enviar datos" type="submit" class="button">
  </div>
</form>

<?php
require_once "./templates/footer.php";



?>