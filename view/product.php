<?php

require_once "../auth/seguridad.php";
require_once "./templates/productOverview.php";
require_once "./templates/head.php";
require_once "./templates/navbar.php";
require_once "./templates/modelList.php";
require_once "../model/Model.php";
require_once "../model/Product.php";

$model = $_REQUEST['id'];
$user = isset($_SESSION['name_user']) ? $_SESSION['name_user'] : null;


createHead();
navbar($user);
productOverview($model);
