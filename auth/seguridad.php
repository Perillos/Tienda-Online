<?php
//Inicio la sesión
session_start();
// session_destroy();
// session_unset();
// //COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
// if ($_SESSION['autentificado'] != "OK") {
// //si no existe, envío a la página de autentificación
// header("Location: /view/login.php");
// //ademas salgo de este script
// exit();
// }
if (empty($_SESSION)) {
  $_SESSION['cart'] = array();
  $_SESSION['id_user'] = '';
  $_SESSION['name_user'] = '';
  $_SESSION['type_user'] = '';
  $_SESSION['autentificado'] = '';
}
// $_SESSION['cart'] = array();
// $_SESSION['id_user'] = '';
// $_SESSION['name_user'] = '';
// $_SESSION['type_user'] = '';
// $_SESSION['autentificado'] = '';

// Comprobar si un usuario está logueado
function isLogged()
{
  session_start();
  if (empty($_SESSION['autentificado'] || $_SESSION['autentificado'] != "OK")) {
    return false;
  }
  return true;
}
