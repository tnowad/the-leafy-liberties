<?php

$import = $params["import"];

?>


<div class="add-form min-h-screen w-full justify-center items-center bg-opacity-75 z-[500] my-5">
  <div class="w-full p-8 bg-white rounded-md shadow-lg ">
    <form class="flex flex-col" action="<?php echo BASE_URI . "/dashboard/import/create"; ?>" method="POST"
      enctype="multipart/form-data">
      <input type="hidden" name="import-id" value="<?php echo $import->id ?>">
      <input type="hidden" name="user-id" value="<?php echo $import->user_id ?>">

      <div class="flex flex-col">
        <label class="mb-2 text-lg font-bold text-gray-900" for="name">List Product</label>
        <div class="flex flex-row">
          <table class="w-full text-center border-collapse">
            <thead>
              <tr>
                <th class="p-3 font-bold bg-gray-100">Product Name</th>
                <th class="p-3 font-bold bg-gray-100">Quantity</th>
                <th class="p-3 font-bold bg-gray-100">Price</th>
                <th class="p-3 font-bold bg-gray-100">Total</th>
              </tr>
            </thead>
            <tbody id="list-product">
              <?php foreach ($import->importProducts() as $importProduct): ?>
                <?php
                $product = $importProduct->product();
                ?>

                <tr>
                  <td class="p-3 font-bold">
                    <?php echo $product->name ?>
                    <input type="hidden" name="product-id[]" value="<?php echo $product->id ?>">
                  </td>
                  <td class="p-3 font-bold">
                    <input class="w-full" type="number" name="quantity[]" value="<?php echo $importProduct->quantity ?>">
                  </td>
                  <td class="p-3 font-bold">
                    <input class="w-full" type="number" name="price[]" value="<?php echo $importProduct->price ?>">
                  </td>
                  <td class="p-3 font-bold">
                    <?php echo $importProduct->quantity * $importProduct->price . " " ?> $
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </form>
  </div>
</div>