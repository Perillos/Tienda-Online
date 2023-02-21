<?php
include "../auth/seguridad.php";
include "Db.php";

// crear clase producto
class Product
{
  // atributos
  private $id;
  private $ref_prodcut;
  private $name;
  private $description;
  private $model_id;
  private $size;
  private $price;
  private $stock;
  private $create;
  private $update;

  private $conection;

  // constructor
  public function __construct($id, $ref_prodcut, $name, $description, $model_id, $size, $price, $stock, $create, $update)
  {
    $this->id = $id;
    $this->ref_prodcut = $ref_prodcut;
    $this->name = $name;
    $this->description = $description;
    $this->model_id = $model_id;
    $this->size = $size;
    $this->price = $price;
    $this->stock = $stock;
    $this->create = $create;
    $this->update = $update;
  }

  // set conection
  public function getConection()
  {
    $dbObj = new Db();
    $this->conection = $dbObj->conection;
  }

  // get all products
  public static function getAllProducts()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM products";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

$products = Product::getAllProducts();
