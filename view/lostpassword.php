<?php

include "./templates/head.php";
include "../config/dbconnect.php";



?>


<h1>Olvidate tu contraseña</h1>
<form action="/controller/lostpassword.controler.php" method="post">
    <div>
        <label for="user">Usuario:</label>
        <input name="user" type="text" id="user" placeholder="anton" required>
    </div>
    
    <div>
        <label for="dni_number">DNI (sin letra):</label>
        <input name="dni_number" type="number"  max="99999999" id="dni_number" placeholder="73895197" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input name="email" type="email" id="email" placeholder="antonio@gnial.com" required>
    </div>

    <div>
        <label for="password">Nueva contraseña:</label><br>
        <input type="password" id="password" name="password" pattern=".{6,}" title="La contraseña debe tener al menos 8 caracteres" required>
    </div>

    <div class="container">
        <input name="submit" value="Recuperar" type="submit"  class="button"> 
    </div>
</form>


<?php
include "../view/templates/footer.php";
?>