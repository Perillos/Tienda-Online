<?php



function cart()
{
  if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h1 class='text-center'>Carrito vacio</h1>";
    die();
  }
  $total = 0;

  $products_id = $_SESSION['cart'];


  echo "
  <div class='container'>
    <div class='row'>
      <div  class='w-full'>
        <h1 class='text-center'>Carrito de compras</h1>
      </div>
    </div>
    <div  class='w-full'>
      <div class='col-12'>
        <table class='table'>
          <thead>
            <tr>
              <th scope='col' class='py-2 px-12'>Imagen</th>
              <th scope='col' class='py-2 px-12'>Producto</th>
              <th scope='col' class='py-2 px-12'>Número</th>
              <th scope='col' class='py-2 px-12'>Cantidad</th>
              <th scope='col' class='py-2 px-12'>Precio</th>
            </tr>
          </thead>
          <tbody>
  ";
  foreach ($products_id as  $product_id) {

    $product = Product::getProductById($product_id['product_id']);
    $model = Model::getModelById($product['model_id']);
    $total += $product['price'];
    $quantity = $product_id['quantity'];
    echo "
    <tr class>
      <td class='flex py-6'>
        <div class='h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200'>
          <img src='." . $model['image'] . "' alt='" . $model['name'] . "' class='h-full w-full object-cover object-center'>
        </div>
      </td>
      <td>
        <div class='flex justify-center text-base font-medium text-gray-900'>
          <h3>{$model['name']}</h3>
        </div>
      </td>
      <td>
        <div class='flex justify-center text-base font-medium text-gray-900'>
          <h3>{$product['size']}</h3>
        </div>
      </td>
      
      <td>
        <div class='flex justify-center'>
          <input class='w-8 max-w-xs' type='number' min='0' value='$quantity'</td>
        </div>
      <td>
        <div class='flex justify-center'>
          {$product['price']}</td>
        </div>
    </tr>
    ";
  }
  echo "
  </tbody>
  </table>
  ";
  echo "
    <div class='flex justify-start gap-1 text-base font-medium text-gray-900'>
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
