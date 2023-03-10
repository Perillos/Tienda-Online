<?php

require_once "../auth/seguridad.php";
require_once "Db.php";


class Order_line
{
  // atributos
  private $order_id;
  private $product_id;
  private $units;
  private $price;

  // constructor
  public function __construct($order_id, $product_id, $units, $price)
  {
    $this->order_id = $order_id;
    $this->product_id = $product_id;
    $this->units = $units;
    $this->price = $price;
  }

  // get all order lines
  public static function getAllOrder_lines()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM orders_lines";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // get order line by id
  public static function getOrder_lineById($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM orders_lines WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // get order line by order
  public static function getOrder_lineByOrderId($order_id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM orders_lines WHERE order_id = $order_id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // set order line
  public function setOrder_line()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "INSERT INTO orders_lines (order_id, product_id, units, price) VALUES (order_id, product_id, units, price)";
    $query = $conection->prepare($sql);
    $query->execute([
      'order_id' => $this->order_id,
      'product_id' => $this->product_id,
      'units' => $this->units,
      'price' => $this->price
    ]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
