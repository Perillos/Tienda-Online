<?php

include "../config/dbconnect.php";
include "../view/templates/head.php";

if (
  empty($_POST['user']) ||
  empty($_POST['password'])
) {
  echo "
      <h2>Debes rellenar todos los datos, vuelve al formulario</h2>
      <div class='container'>
          <a href='/index.php' class='button'>Volver</a>
      </div>
";
die();
}

$user=$_POST['user'];
$password=$_POST['password'];

$sql = "SELECT * FROM users WHERE user = '$user'";
$resultado = $link->prepare($sql);
$resultado->execute();
$fila = $resultado->fetch();
$passwordhash = $fila[2];
$id = $fila[0];



if (password_verify($password, $passwordhash)) {
    $type = $fila[3];
    session_start();
    $_SESSION['id_user']=$id;
    $_SESSION['name_user']=$user;
    $_SESSION['type_user'] = $type;
    $_SESSION['autentificado'] = "OK";
    header ("Location: /view/home.php");
}
else {


  
header ("Location: /view/login.php?mensage=Usuario o contraseña incorrecta");
}

?>