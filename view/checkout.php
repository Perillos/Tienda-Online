<?php


require_once "../auth/seguridad.php";
require_once "./templates/head.php";
require_once "./templates/navbar.php";
require_once "./templates/cart.php";
require_once "../model/Model.php";
require_once "../model/Product.php";
require_once "../model/Cart.php";


// $type_user = isset($_SESSION['type_user']) ? $_SESSION['type_user'] : null;
$user = isset($_SESSION['name_user']) ? $_SESSION['name_user'] : null;


$product_id = $_REQUEST;

foreach ($_SESSION['cart'] as $key => $product) {

  if ($product['product_id'] == $product_id['product_id']) {

    $_SESSION['cart'][$key]['quantity'] += $product_id['quantity'];
    createHead();
    navbar($user);
    cart();
    die();
  }
}

array_push($_SESSION['cart'], $product_id);

// session_unset();
createHead();
navbar($user);
cart();
