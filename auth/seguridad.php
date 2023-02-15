<?php
// //Inicio la sesión
// session_start();
// //COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
// if ($_SESSION['autentificado'] != "OK") {
// //si no existe, envío a la página de autentificación
// header("Location: /view/login.php");
// //ademas salgo de este script
// exit();
// }

// Comprobar si un usuario está logueado
function isLogged()
{
  session_start();
  if (empty($_SESSION['autentificado'] || $_SESSION['autentificado'] != "OK")) {
    return false;
  }
  return true;
}

