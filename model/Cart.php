<?php

require_once "../auth/seguridad.php";
require_once "Db.php";


class Cart
{
  // atributos
  private $id;
  private $user_id;
  private $product_id;
  private $quantity;
  private $total;

  // constructor
  public function __construct($user_id, $product_id, $quantity, $total)
  {
    $this->user_id = $user_id;
    $this->product_id = $product_id;
    $this->quantity = $quantity;
    $this->total = $total;
  }

  // get all carts
  public static function getAllCarts()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM carts";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // get cart by id
  public static function getCartById($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM carts WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // set cart
  public function setCart()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "INSERT INTO carts (user_id, product_id, quantity, total) VALUES (:user_id, :product_id, :quantity, :total)";
    $query = $conection->prepare($sql);
    $query->bindParam(':user_id', $this->user_id);
    $query->bindParam(':product_id', $this->product_id);
    $query->bindParam(':quantity', $this->quantity);
    $query->bindParam(':total', $this->total);
    $result = $query->execute();
    return $result;
  }

  // update cart
  public function updateCart($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "UPDATE carts SET user_id = :user_id, product_id = :product_id, quantity = :quantity, total = :total WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->bindParam(':user_id', $this->user_id);
    $query->bindParam(':product_id', $this->product_id);
    $query->bindParam(':quantity', $this->quantity);
    $query->bindParam(':total', $this->total);
    $result = $query->execute();
    return $result;
  }

  // delete cart
  public static function deleteCart($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "DELETE FROM carts WHERE id = $id";
    $query = $conection->prepare($sql);
    $result = $query->execute();
    return $result;
  }
}
