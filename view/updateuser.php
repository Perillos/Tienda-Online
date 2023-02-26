<?php
require_once "../auth/seguridad.php";
require_once "./templates/head.php";
require_once "../config/dbconnect.php";


$id_user = $_GET['id'];

$sql = "SELECT  * FROM users WHERE id = '$id_user'";
$result = $link->prepare($sql);
$result->execute();
$user_array = $result->fetch();

?>

<body>
  <form method="post" action="/controller/update.user.controler.php?id=<?php echo $id_user; ?>">
    <div>
      <label for="id">Nº Cliente:</label>
      <input name="id" type="text" id="id" disabled value="<?php echo $user_array[0]; ?>">
    </div>

    <div>
      <p>Número del DNI: <?php echo $user_array[4]; ?></p>
      <input name="dni_number" type="hidden" min="10000000" max="99999999" id="dni_number" value="<?php echo $user_array[6]; ?>">
    </div>

    <div>
      <p>Letra del DNI: <?php echo $user_array[5]; ?></p>
      <input name="dni_letter" type="hidden" id="dni_letter" maxlength="1" value="<?php echo $user_array[5]; ?>" require_onced>
    </div>

    <div>
      <p>Usuario: <?php echo $user_array[6]; ?></p>
      <input name="user" type="hidden" id="user" value="<?php
                                                        echo $user_array[6]; ?>">
    </div>

    <div>
      <label for="name">Nombre:</label>
      <input name="name" type="text" id="name" value="<?php
                                                      echo $user_array[6]; ?>" require_onced>
    </div>

    <div>
      <label for="direction">Dirección:</label>
      <input name="direction" type="text" id="direction" value="<?php
                                                                echo $user_array[7]; ?>" require_onced>
    </div>

    <div>
      <label for="location">Localidad:</label>
      <input name="location" type="text" id="location" value="<?php
                                                              echo $user_array[8]; ?>" require_onced>
    </div>

    <div>
      <label for="province">Provincia:</label>
      <input name="province" type="text" id="province" value="<?php
                                                              echo $user_array[9]; ?>" require_onced>
    </div>

    <div>
      <label for="phone">Teléfono:</label>
      <input name="phone" type="number" id="phone" min="100000000" max="999999999" value="<?php
                                                                                          echo $user_array[10]; ?>" require_onced>
    </div>

    <div>
      <label for="email">Email:</label>
      <input name="email" type="email" id="email" placeholder="antonio@gnial.com" value="<?php
                                                                                          echo $user_array[11]; ?>">
    </div>

    <div class="container">
      <input name="submit" value="Enviar" type="submit" class="button">
    </div>

  </form>



  <?php
  require_once "../view/templates/footer.php";
  ?>