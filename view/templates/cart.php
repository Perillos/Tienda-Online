<?php



function cart()
{
  if (!isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
    echo "<h1 class='text-center'>Carrito vacio</h1>";
    die();
  }
  $total = 0;

  $products_id = $_SESSION['cart'];


  echo "
  <div class='container'>
    <div class='row'>
      <div class='col-12'>
        <h1 class='text-center'>Carrito de compras</h1>
      </div>
    </div>
    <div class='row'>
      <div class='col-12'>
        <table class='table'>
          <thead>
            <tr>
              <th scope='col'>Imagen</th>
              <th scope='col'>Producto</th>
              <th scope='col'>Número</th>
              <th scope='col'>Cantidad</th>
              <th scope='col'>Precio</th>
            </tr>
          </thead>
          <tbody>
  ";
  foreach ($products_id as  $product_id) {
    // print_r($product_id);
    $product = Product::getProductById($product_id['product_id']);
    $model = Model::getModelById($product['model_id']);
    $total += $product['price'];
    $quantity = $product_id['quantity'];
    echo "
    <tr class='-my-6 divide-y divide-gray-200'>
      <td class='flex py-6'>
        <div class='h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200'>
          <img src=.'" . $model['image'] . " alt='" . $model['name'] . "' class='h-full w-full object-cover object-center'>
        </div>
      </td>
      <td>
        <div class='flex justify-between text-base font-medium text-gray-900'>
          <h3>{$model['name']}</h3>
        </div>
      </td>
      <td>
        <div class='flex justify-between text-base font-medium text-gray-900'>
          <h3>{$product['size']}</h3>
        </div>
      </td>
      
      <td>
        <div class='flex justify-between text-base font-medium text-gray-900'>
          <input type='number' min='0' value='$quantity'</td>
        </div>
      <td>{$product['price']}</td>
    </tr>
    ";
  }
  echo "
  </tbody>
  </table>
  ";
  echo "
    <div class='flex justify-between text-base font-medium text-gray-900'>
      <p>Total</p>
       <p>$total €</p>
    </div>
  ";

  echo "
    <div class='row'>
      <div class='col-12'>
        <div class='mt-6'>
          <a href='#' class='flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700'>Checkout</a>
        </div>
      </div>
    </div>
  ";

  echo "
  </div>
  </div>
  </div>
  ";
}
