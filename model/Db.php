<?php

require_once '../config/dbconnect.php';


class Db
{

  private $host;
  private $db;
  private $user;
  private $pass;
  public $conection;

  public function __construct()
  {
    $env = parse_ini_file('../.env');
    $this->host = $env['DB_HOST'];
    $this->db = $env['DB'];
    $this->user = $env['DB_USER'];
    $this->pass = $env['DB_PASSWORD'];

    try {
      $this->conection = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->db, $this->user, $this->pass);
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit();
    }
  }
}
