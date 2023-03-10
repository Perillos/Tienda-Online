<?php

require_once "../auth/seguridad.php";
require_once "Db.php";


class Product
{
  // atributos
  private $id;
  private $ref_product;
  private $model_id;
  private $size;
  private $stock;
  private $price;



  // constructor
  public function __construct($ref_product, $model_id, $size, $stock, $price)
  {
    $this->ref_product = $ref_product;
    $this->model_id = $model_id;
    $this->size = $size;
    $this->stock = $stock;
    $this->price = $price;
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

  // get product by id
  public static function getProductById($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM products WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // get product by model
  public static function getProductByModel($model_id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM products WHERE model_id = $model_id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // set product
  public function setProduct()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "INSERT INTO products (ref_product, model_id, size, price, stock) VALUES (:ref_product, :model_id, :size, :price, :stock)";
    $query = $conection->prepare($sql);
    $query->execute([
      ':ref_product' => $this->ref_product,
      ':model_id' => $this->model_id,
      ':size' => $this->size,
      ':stock' => $this->stock,
      ':price' => $this->price
    ]);
    return $query->rowCount();
  }

  // update product
  public function updateProduct($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "UPDATE products SET ref_product = :ref_product, model_id = :model_id, size = :size, stock = :stock, price = :price WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->bindParam(':ref_product', $this->ref_product);
    $query->bindParam(':model_id', $this->model_id);
    $query->bindParam(':size', $this->size);
    $query->bindParam(':stock', $this->stock);
    $query->bindParam(':price', $this->price);
    $query->execute();
    return $query->rowCount();
  }

  // delete product
  public static function deleteProduct($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "DELETE FROM products WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
    return $query->rowCount();
  }
}

// $products = Product::getAllProducts();
// $product1 = Product::getProductById(1);
// $product2 = new Product('M90_01_42', 3, '42', 10, 100);

// print_r($products);
// print_r($product1);
// print_r($product2->setProduct());