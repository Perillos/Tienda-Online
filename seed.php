<?php

require_once 'config/dbconnect.php';


class Db
{

  private $host;
  private $db;
  private $user;
  private $pass;
  public $conection;

  public function __construct()
  {

    $this->host = constant('DB_HOST');
    $this->db = constant('DB');
    $this->user = constant('DB_USER');
    $this->pass = constant('DB_PASS');

    try {
      $this->conection = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->db, $this->user, $this->pass);
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit();
    }
  }
}


$db = new Db;
$conection = $db->conection;


$sql = "DROP TABLE IF EXISTS users";
$resulDel = $conection->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  user varchar(100) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  type varchar(100) NOT NULL,
  dni_number decimal(10,0) DEFAULT NULL,
  dni_letter varchar(110) DEFAULT NULL,
  name varchar(50) DEFAULT NULL,
  direction varchar(50) DEFAULT NULL,
  location varchar(50) DEFAULT NULL,
  province varchar(50) DEFAULT NULL,
  phone varchar(15) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  update_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;";
$resulDel = $conection->prepare($sql);
$resulDel->execute();


$sql = "DROP TABLE IF EXISTS products";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE products (
  id int(11) NOT NULL AUTO_INCREMENT,
  ref_product varchar(100) DEFAULT NULL,
  model_id int(11) DEFAULT NULL,
  size varchar(100) DEFAULT NULL,
  stock int(11) DEFAULT NULL,
  price decimal(10,2) DEFAULT NULL,
  create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  update_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();


$sql = "DROP TABLE IF EXISTS orders_lines";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE orders_lines (
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) DEFAULT NULL,
  product_id int(11) DEFAULT NULL,
  units int(11) DEFAULT NULL,
  price decimal(10,2) DEFAULT NULL,
  create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  update_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "DROP TABLE IF EXISTS cart_lines";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE cart_lines (
  id int(11) NOT NULL AUTO_INCREMENT,
  cart_id int(11) DEFAULT NULL,
  product_id int(11) DEFAULT NULL,
  units int(11) DEFAULT NULL,
  create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  update_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();


$sql = "DROP TABLE IF EXISTS carts";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE carts (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  update_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "DROP TABLE IF EXISTS orders";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE orders (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  status varchar(100) DEFAULT NULL,
  create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  update_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();


$sql = "DROP TABLE IF EXISTS models";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE models (
  id int(11) NOT NULL AUTO_INCREMENT,
  ref_model varchar(100) DEFAULT NULL,
  category_id int(11) DEFAULT NULL,
  name varchar(100) DEFAULT NULL,
  description varchar(255) DEFAULT NULL,
  image varchar(100) DEFAULT NULL,
  create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  update_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();


$sql = "DROP TABLE IF EXISTS categories";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE categories (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  update_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$resulDel =  $conection->prepare($sql);
$resulDel->execute();





$arrayRow = [
  [
    'mike', '1234', '40423129', 'P', 'Miken', 'Grayhawk Cross', 'Avignon', 'Paracin', '964838278', 'bewells5@hubpages.com'
  ],
  [
    'pincho', 'wKC1hkFqLVh', '85624162', 'S', 'Pincho', 'Mallard Plaza', 'Rybnoye', 'Alto del Espino', '696962928', 'cgreenley0@seesaa.net'
  ],
  [
    'ebayle', 'zC2o52m', '12165723', 'B', 'Ebayle', 'Sherman Lane', 'Inta', 'Cashel', '610825519', 'edubble1@umich.edu'
  ]
];

echo "<h1>SEMILLA</h1>";
echo "<h2>Datos Eliminados</h2>";





echo "<h2>Datos Creados Usuarios</h2>";

echo "<table border>";

echo "
      <tr>
          <td>DNI</td>
          <td>Usuario</td>
          <td>Password</td>
          <td>Nombre</td>
          <td>Email</td>
        </tr>
    ";


foreach ($arrayRow as $row) {
  $user = $row[0];
  $password = $row[1];
  $passwordhas = password_hash($password, PASSWORD_DEFAULT);
  $dni_number = $row[2];
  $dni_letter = $row[3];
  $name = $row[4];
  $direction = $row[5];
  $location = $row[6];
  $province = $row[7];
  $phone = $row[8];
  $email = $row[9];



  $sql = "INSERT INTO users (user, password, type, dni_number, dni_letter, name, direction, location, province, phone, email) VALUES ('$user', '$passwordhas', 'client', '$dni_number', '$dni_letter', '$name', '$direction', '$location', '$province', '$phone', '$email')";
  $insertar = $conection->prepare($sql);
  $insertar->execute();


  echo "
        <tr>
            <td>$dni_number-$dni_letter</td>
            <td>$user</td>
            <td>$password</td>
            <td>$name</td>
            <td>$email</td>
            
        </tr>
    ";
}

echo "</table>";

$arrayRow = [
  [
    'ilustre', 'señor', '93746473', 'Z', 'Ilustre', 'Atwood Court', 'Jian', 'Ko Samui', '443278209', 'jfishly2@senate.gov'
  ],
  [
    'brenaman', 'JbsyQWJc1IJ', '57488087', 'R', 'Brenaman', 'Sutteridge Parkway', 'Czerniewice', 'Sainte-Marthe', '412212006', 'jdanilishin3@nbcnews.com'
  ]
];

echo "<p>Datos Eliminados</p>";





echo "<h2>Datos Creados Editores</h2>";

echo "<table border>";

echo "
      <tr>
          <td>DNI</td>
          <td>Usuario</td>
          <td>Clave</td>
          <td>Nombre</td>
          <td>Email</td>
        </tr>
    ";


foreach ($arrayRow as $row) {
  $user = $row[0];
  $password = $row[1];
  $passwordhas = password_hash($password, PASSWORD_DEFAULT);
  $dni_number = $row[2];
  $dni_letter = $row[3];
  $name = $row[4];
  $direction = $row[5];
  $location = $row[6];
  $province = $row[7];
  $phone = $row[8];
  $email = $row[9];


  $sql = "INSERT INTO users (user, password, type, dni_number, dni_letter, name, direction, location, province, phone, email) VALUES ('$user', '$passwordhas', 'editor', '$dni_number', '$dni_letter', '$name', '$direction', '$location', '$province', '$phone', '$email')";
  $insertar = $conection->prepare($sql);
  $insertar->execute();


  echo "
        <tr>
            <td>$dni_number-$dni_letter</td>
            <td>$user</td>
            <td>$password</td>
            <td>$name</td>
            <td>$email</td>
            
        </tr>
    ";
}

echo "</table>";



$arrayRowAd = [
  [
    'super', 'mega', '36560371', 'P', 'Manolo', 'Bluestem Terrace', 'Klampok', 'Rennes', '890314277', 'vjarnell9@wsj.com'
  ],
  [
    'admin', 'admin', '71603623', 'T', 'Cristina', 'Northridge Lane', 'Dysina', 'Pontivy', '407614533', 'bzavattero8@cnbc.com'
  ]
];


echo "<h2>Datos Creados Administradores</h2>";

echo "<table border>";
echo "
        <tr>
            <td>DNI</td>
            <td>Usuario</td>
            <td>Clave</td>
            <td>Nombre</td>
            <td>Email</td>
        </tr>
    ";

foreach ($arrayRowAd as $row) {
  $user = $row[0];
  $password = $row[1];
  $passwordhas = password_hash($password, PASSWORD_DEFAULT);
  $dni_number = $row[2];
  $dni_letter = $row[3];
  $name = $row[4];
  $direction = $row[5];
  $location = $row[6];
  $province = $row[7];
  $phone = $row[8];
  $email = $row[9];
  $create = time();
  $update = time();


  $sql = "INSERT INTO users (user, password, type, dni_number, dni_letter, name, direction, location, province, phone, email) VALUES ('$user', '$passwordhas', 'admin', '$dni_number', '$dni_letter', '$name', '$direction', '$location', '$province', '$phone', '$email')";
  $insertar = $conection->prepare($sql);
  $insertar->execute();


  echo "
        <tr>
            <td>$dni_number-$dni_letter</td>
            <td>$user</td>
            <td>$password</td>
            <td>$name</td>
            <td>$email</td>
            
        </tr>
    ";
}

echo "</table>";






$arrayCategoria = [
  [
    'Zapatillas de corte bajo'
  ],
  [
    'Zapatillas de corte alto'
  ]
];


$arrayModelos = [
  [
    '1620_58', 1, 'Chuck', 'En 1970, las Chuck ya eran unas de las mejores sneakers de baloncesto de la historia. Las Chuck 70 rinden homenaje a este legado, para ello combinan detalles inspirados en los modelos clásicos y actualizaciones modernas para aportar comodidad.', '/build/img/1620_58.jpg'
  ],
  [
    'A032_16', 2, 'Star', 'La amortiguación de la plantilla Ortholite y las costuras en la lengüeta con alas aportan una comodidad de nivel superior.', 'build/img/A032_16.jpg'
  ],
  [
    'M90_01', 3, 'Classic', 'Uno de los favoritos de los patinadores desde los años 90.', './build/img/M90_01.jpg'
  ]

];

$arrayProductos = [
  [
    '1620_58_40', 1, '40', 3, 35.55
  ],
  [
    '1620_58_41', 1, '41', 5, 35.60
  ],
  [
    'A032_16_40', 2, '40', 1, 40.55
  ],
  [
    'A032_16_41', 2, '41', 2, 41.55
  ],
  [
    'M90_01_40', 3, '40', 7, 62.55
  ],
  [
    'M90_01_41', 3, '41', 1, 61.55
  ]
];





echo "<h2>Datos Creados Productos</h2>";

echo "<table border>";
echo "
        <tr>
          <td>Ref.</td>
          <td>Nombre</td>
          <td>Imagen</td>
        </tr>
    ";

foreach ($arrayModelos as $row) {
  $ref = $row[0];
  $name = $row[2];
  $image = $row[4];

  echo "
    <tr>
        <td>$ref</td>
        <td>$name</td>
        <td><img src='$image'></td>
    </tr>
";
}

echo "</table>";




foreach ($arrayCategoria as $row) {
  $name = $row[0];

  $sql = "INSERT INTO categories (name) VALUES ('$name')";
  $insertar = $conection->prepare($sql);
  $insertar->execute();
}

foreach ($arrayModelos as $row) {
  $ref = $row[0];
  $category_id = $row[1];
  $name = $row[2];
  $description = $row[3];
  $image = $row[4];

  $sql = "INSERT INTO models (ref_model, category_id, name, description, image) VALUES ('$ref', '$category_id', '$name', '$description', '$image')";
  $insertar = $conection->prepare($sql);
  $insertar->execute();
}

foreach ($arrayProductos as $row) {
  $ref = $row[0];
  $model_id = $row[1];
  $size = $row[2];
  $stock = $row[3];
  $price = $row[4];

  $sql = "INSERT INTO products (ref_product, model_id, size, stock, price) VALUES ('$ref', '$model_id', '$size', '$stock', '$price')";
  $insertar = $conection->prepare($sql);
  $insertar->execute();
}
