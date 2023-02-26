<?php
// continuamos con la sesión
session_start();
$_SESSION = array();
session_destroy();
session_unset();

require_once "../view/templates/head.php";
?>


<h2>Gracias por su visita</h2>
<a href="/index.php" class="button">Login</a>

<?php
require_once "../view/templates/footer.php";
