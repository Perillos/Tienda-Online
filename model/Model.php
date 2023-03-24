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
  public function __construct($id, $ref_model, $category_id, $name, $description, $image)
  {
    $this->id = $id;
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
    $query->execute([
      'ref_model', $this->ref_model,
      'category_id', $this->category_id,
      'name', $this->name,
      'description', $this->description,
      'image', $this->image
    ]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // update model
  public function updateModel($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "UPDATE models SET ref_model = :ref_model, category_id = :category_id, name = :name, description = :description, image = :image WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute([
      'ref_model', $this->ref_model,
      'category_id', $this->category_id,
      'name', $this->name,
      'description', $this->description,
      'image', $this->image
    ]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // delete model
  public static function deleteModel($id)
  {
    $db = new Db();
    $conection = $db->conection;
    $sql = "DELETE FROM models WHERE id = $id";
    $query = $conection->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
}
