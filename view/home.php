<?php


include "../auth/seguridad.php";
include "./templates/head.php";
include "./templates/navbar.php";
include "./templates/productList.php";


$type_user = isset($_SESSION['type_user']) ? $_SESSION['type_user'] : null;
$user = isset($_SESSION['name_user']) ? $_SESSION['name_user'] : null;



createHead();
navbar($user);
productList();
