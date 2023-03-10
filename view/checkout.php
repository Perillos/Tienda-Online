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

createHead();
navbar($user);

if ((!isset($_SESSION['cart']) || empty($_SESSION['cart'])) && empty($_REQUEST)) {
  echo "<h1 class='text-center'>Carrito vacio</h1>";
  die();
}







$product_id = isset($_REQUEST) ? $_REQUEST : null;

foreach ($_SESSION['cart'] as $key => $product) {

  if ($_SESSION['cart'][$key]['product_id'] == $product_id['product_id']) {

    $_SESSION['cart'][$key]['quantity'] += $product_id['quantity'];
    cart();
    die();
  }
}

array_push($_SESSION['cart'], $product_id);


cart();
