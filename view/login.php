<?php
include "templates/head.php";
?>

<body>
  <h1>Acceso al sistema</h1>
  <?php
  $mensage = empty($_GET['mensage']) ? "" : $_GET['mensage'];
  echo "<h4>$mensage</h4>";
  ?>
  <form action="../auth/conexion.php" method="post">
    <div>
      <label for="user">Usuario:</label>
      <input name="user" type="text" id="user" placeholder="super" require>
    </div>

    <div>
      <label for="password">Clave:</label>
      <input name="password" type="password" id="password" placeholder="mega" require>
    </div>

    <div class="container">
      <input name="submit" value="Login" type="submit" class="button">
    </div>
  </form>
  <div class="container">
    <a href='registrate.php' class='button'>Registrarse</a>
    <a href='lostpassword.php' class='button'>Olvidé contraseña</a>
  </div>
</body>

</html>




<?php
include "../view/templates/footer.php";
?>