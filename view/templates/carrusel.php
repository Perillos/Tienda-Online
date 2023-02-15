<?php

// Funcion de cart de prodcutos con imagen nombre y precio
function createCart($id_product)
{
    ?>
    <div class="card">
        <img src="<?= $image ?>" alt="Avatar" style="width:100%">
        <div class="container">
            <h4><?= $name ?></h4>
            <p><?= $description ?></p>
            <p><?= $price ?></p>
        </div>
    </div>
<?php
}

// Funcion de carrusel de todos los productso utilizando createCart
function createCarrusel($products)
{
    ?>
    <div class="carrusel">
        <?php
        foreach ($products as $product) {
            createCart($product['id'], $product['name'], $product['price'], $product['image']);
        }
        ?>
    </div>
<?php
}

