<?php





function productOverview($modelid)
{

  $model = Model::getModelById($modelid);
  $products = Product::getProductByModel($modelid);


?>




  <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
    <div class="aspect-w-3 aspect-h-4   rounded-lg lg:block">
      <img src=".<?= $model['image'] ?>" alt="<?= $model['name'] ?>" class="h-full w-full object-cover object-center">
    </div>
    <div class="aspect-w-3 aspect-h-4 overflow-hidden rounded-lg lg:block">
      <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl"><?= $model['name'] ?></h1>
      <h2 class="text-base text-gray-900"><?= $model['description'] ?>
    </div>
    <div class="aspect-w-4 aspect-h-5 sm:overflow-hidden sm:rounded-lg lg:aspect-w-3 lg:aspect-h-4">

      <form class="mt-10" method="$_POST" action="checkout.php">
        <div class="mt-10">
          <div class="flex items-center justify-between">
            <h3 class="text-sm font-medium text-gray-900">Números disponibles</h3>

          </div>
          <fieldset class="mt-4">

            <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">

              <?php
              foreach ($products as $product) {
              ?>
                <label class=" border-2 group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer" id="size-<?= $product['id'] ?>">
                  <input type="radio" name="product_id" value="<?= $product['id'] ?>" class="sr-only " aria-labelledby="size-choice-1-label">
                  <span><?= $product['size'] ?></span>

                  <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
              <?php
              }
              ?>
              <input type="number" name="quantity" value="1" class="hidden">

            </div>
          </fieldset>
        </div>
        <button class="mt-10 flex w-full items-center justify-center rounded-md  bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700" onclick="">Add
          to bag</button>
        <div class="hidden bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert" id="alert">
          <p class="font-bold">Seleccione un número</p>

        </div>
      </form>
    </div>
  </div>


  <script>
    const sizes = document.querySelectorAll('label[id^="size-"]')
    const form = document.querySelector('form')
    const alert = document.querySelector('#alert')


    sizes.forEach(size => {
      size.addEventListener('click', () => {
        sizes.forEach(size => {
          size.classList.remove('border')
          size.classList.remove('border-indigo-500')
        })
        alert.classList.add('hidden')
        size.classList.add('border')
        size.classList.add('border-indigo-500')
      })
    })



    // const carrito = (e) => {
    //   e.preventDefault()
    //   const size = document.querySelector('input[name="size-choice"]:checked')
    //   if (size) {
    //     const id = size.parentElement.id.split('-')[1]
    //     window.location.href = `./cart.php?id=${id}`
    //   } else {
    //     alert.classList.remove('hidden')
    //     die();
    //   }
    // }

    form.addEventListener('submit', (event) => {
      event.preventDefault()
      const size = document.querySelector('input[name="product_id"]:checked')
      if (size) {
        // console.log();
        form.submit()
      } else {
        alert.classList.remove('hidden')
      }
    })
  </script>





<?php

}
