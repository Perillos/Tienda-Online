<?php

require_once "../auth/seguridad.php";
require_once "Db.php";


class Model
{
  // atributos
  private $id;
  private $ref_model;
  private $category_id;
  private $name;
  private $description;
  private $image;

  // constructor
  public function __construct($ref_model, $category_id, $name, $description, $image)
  {
    $this->ref_model = $ref_model;
    $this->category_id = $category_id;
    $this->name = $name;
    $this->description = $description;
    $this->image = $image;
  }

  // get all models
  public static function getAllModels()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM models";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  // get model by id
  public static function getModelById($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "SELECT * FROM models WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // set model
  public function setModel()
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "INSERT INTO models (ref_model, category_id, name, description, image) VALUES (:ref_model, :category_id, :name, :description, :image)";
    $query = $conection->prepare($sql);
    $query->bindParam(':ref_model', $this->ref_model);
    $query->bindParam(':category_id', $this->category_id);
    $query->bindParam(':name', $this->name);
    $query->bindParam(':description', $this->description);
    $query->bindParam(':image', $this->image);
    $query->execute();
  }

  // update model
  public function updateModel($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "UPDATE models SET ref_model = :ref_model, category_id = :category_id, name = :name, description = :description, image = :image WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->bindParam(':ref_model', $this->ref_model);
    $query->bindParam(':category_id', $this->category_id);
    $query->bindParam(':name', $this->name);
    $query->bindParam(':description', $this->description);
    $query->bindParam(':image', $this->image);
    $query->execute();
  }

  // delete model
  public static function deleteModel($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "DELETE FROM models WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
  }
}



// // $models = Model::getAllModels();
// $model1 = Model::getModelById(1);
// $model2 = new Model('M90_06', 2, 'Classic', 'Uno de los favoritos de los patinadores desde los años 90.', '/build/img/M90_06.jpg');

// // print_r($models);
// print_r($model1);
// print_r($model2->setModel());