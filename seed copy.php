<?php

include "./view/templates/head.php";
include "./config/dbconnect.php";



// user, password, type, dni_number, dni_letter, name, direction, location, province, phone, email
$sql = "DROP TABLE IF EXISTS users";
$resulDel = $link->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    user varchar(100) DEFAULT NULL,
    password varchar(255) DEFAULT NULL,
    type varchar(100) NOT NULL,
    dni_number numeric DEFAULT NULL,
    dni_letter varchar(110) DEFAULT NULL,
    name varchar(50) DEFAULT NULL,
    direction varchar(50) DEFAULT NULL,
    location varchar(50) DEFAULT NULL,
    province varchar(50) DEFAULT NULL,
    phone varchar(15) DEFAULT NULL,
    email varchar(50) DEFAULT NULL,
    PRIMARY KEY (id)
  ) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8";
$resulDel = $link->prepare($sql);
$resulDel->execute();


$sql = "DROP TABLE IF EXISTS products";
$resulDel = $link->prepare($sql);
$resulDel->execute();

$sql = "CREATE TABLE products (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100) DEFAULT NULL,
    description varchar(255) DEFAULT NULL,
    categori varchar(255) DEFAULT NULL,
    price decimal(10,2) DEFAULT NULL,
    image varchar(255) DEFAULT NULL,
    reference varchar(100) DEFAULT NULL,
    PRIMARY KEY (id)
  ) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb3";
$resulDel = $link->prepare($sql);
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
    $user=$row[0];
    $password=$row[1];
    $passwordhas = password_hash($password, PASSWORD_DEFAULT);
    $dni_number=$row[2];
    $dni_letter=$row[3];
    $name=$row[4];
    $direction=$row[5];
    $location=$row[6];
    $province=$row[7];
    $phone=$row[8];
    $email=$row[9];


    $sql = "INSERT INTO users (user, password, type, dni_number, dni_letter, name, direction, location, province, phone, email) VALUES ('$user', '$passwordhas', 'client', '$dni_number', '$dni_letter', '$name', '$direction', '$location', '$province', '$phone', '$email')";
    $insertar = $link->prepare($sql);
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
    $user=$row[0];
    $password=$row[1];
    $passwordhas = password_hash($password, PASSWORD_DEFAULT);
    $dni_number=$row[2];
    $dni_letter=$row[3];
    $name=$row[4];
    $direction=$row[5];
    $location=$row[6];
    $province=$row[7];
    $phone=$row[8];
    $email=$row[9];


    $sql = "INSERT INTO users (user, password, type, dni_number, dni_letter, name, direction, location, province, phone, email) VALUES ('$user', '$passwordhas', 'editor', '$dni_number', '$dni_letter', '$name', '$direction', '$location', '$province', '$phone', '$email')";
    $insertar = $link->prepare($sql);
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
    $user=$row[0];
    $password=$row[1];
    $passwordhas = password_hash($password, PASSWORD_DEFAULT);
    $dni_number=$row[2];
    $dni_letter=$row[3];
    $name=$row[4];
    $direction=$row[5];
    $location=$row[6];
    $province=$row[7];
    $phone=$row[8];
    $email=$row[9];


    $sql = "INSERT INTO users (user, password, type, dni_number, dni_letter, name, direction, location, province, phone, email) VALUES ('$user', '$passwordhas', 'admin', '$dni_number', '$dni_letter', '$name', '$direction', '$location', '$province', '$phone', '$email')";
    $insertar = $link->prepare($sql);
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
        'camisa chula', 'camisa tan chula que es increible', 'camisa', 35.55, '/build/img/camisa_chula.jpg', 'kkl78965'
    ],
    [
        'pantalón molón', 'pantalón tan molón que es increible', 'pantalón', 72.88, '/build/img/pantalon_molon.png', 'uil47896'
    ]
];


echo "<h2>Datos Creados Productos</h2>";

echo "<table border>";
echo "
        <tr>
          <td>Ref.</td>
          <td>Nombre</td>
          <td>Categoría</td>
            <td>Precio</td>
            <td>Imagen</td>
        </tr>
    ";

foreach ($arrayRowAd as $row) {
    $nameproduct=$row[0];
    $description=$row[1];
    $categori=$row[2];
    $price = $row[3];
    $image=$row[4];
    $reference=$row[5];
    
    $sql = "INSERT INTO products (name, description, categori, price, image, reference) VALUES ('$nameproduct', '$description', '$categori', '$price', '$image', '$reference')";
    $insertar = $link->prepare($sql);
    $insertar->execute();


    echo "
    <tr>
        <td>$reference</td>
        <td>$nameproduct</td>
        <td>$categori</td>
        <td>$price €</td>
        <td><img src='$image'></td>
    </tr>
";
}

echo "</table>";
?>