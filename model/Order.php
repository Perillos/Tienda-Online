<?php

require_once "../auth/seguridad.php";
require_once "Db.php";


class Order
{
  // atributos
  private $user_id;
  private $status;

  // constructor
  public function __construct($user_id, $status)
  {
    $this->user_id = $user_id;
    $this->status = $status;
  }

  // get all orders
  public static function getAllOrders()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM orders";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // get order by id
  public static function getOrderById($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM orders WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // get order by user
  public static function getOrderByUser($user_id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM orders WHERE user_id = $user_id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // get order by status
  public static function getOrderByStatus($status)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM orders WHERE status = $status";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // get order by user and status


  // set order
  public function setOrder()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "INSERT INTO orders (user_id, status) VALUES (:user_id, :status)";
    $query = $conection->prepare($sql);
    $query->execute([
      'user_id' => $this->user_id,
      'status' => $this->status
    ]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // update order
  public function updateOrder($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "UPDATE orders SET user_id = :user_id, status = :status WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute([
      'user_id' => $this->user_id,
      'status' => $this->status
    ]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // delete order
  public static function deleteOrder($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "DELETE FROM orders WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
