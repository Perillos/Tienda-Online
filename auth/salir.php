<?php
// continuamos con la sesión
session_start();
$_SESSION = array();
session_destroy();

include "../view/templates/head.php";
?>


<h2>Gracias por su visita</h2>
<a href="/index.php" class="button">Login</a>

<?php
include "../view/templates/footer.php";