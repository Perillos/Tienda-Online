<?php

require_once "../auth/seguridad.php";
require_once "./templates/head.php";


$type_user = $_SESSION['type_user'];
$user = $_SESSION['name_user'];

echo "
  <div class='container'>
    <h1>Hola $user</h1>
  </div
";

echo "
<div class='container'>
    <a href='panel.php' class='button'>Panel administración</a>
</div>
";

echo "
<div class='container'>
    <a href='products.php' class='button'>Productos</a>
</div>
";

echo "
<div class='container'>
    <a href='/auth/salir.php' class='button'>Cerrar session</a>
</div>
";





require_once "../view/templates/footer.php";
?>

<?php

require_once "../auth/seguridad.php";
require_once "../auth/conexion.php";

$type_user = $_SESSION['type_user'];

if ($type_user == 'admin') {
  echo "
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='#'>Navbar</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
          <div class='navbar-nav'>
            <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
            <a class='nav-link' href='panel.php'>Panel</a>
            <a class='nav-link' href='products.php'>Productos</a>
            <a class='nav-link' href='auth/salir.php'>Salir</a>
          </div>
        </div>
      </div>
    </nav>
  ";
} else {
  echo "
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='#'>Navbar</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>";
}
