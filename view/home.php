<?php

require_once "../auth/seguridad.php";
require_once "./templates/head.php";
require_once "./templates/navbar.php";
require_once "./templates/modelList.php";
require_once "../model/Model.php";


// $type_user = isset($_SESSION['type_user']) ? $_SESSION['type_user'] : null;
$user = isset($_SESSION['name_user']) ? $_SESSION['name_user'] : null;


$products = Model::getAllModels();


createHead();
navbar($user);
modelList($products);


?>
<a href="auth/salir.php">Logout</a>