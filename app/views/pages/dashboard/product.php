<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\Pagination;

?>

<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Product</h1>
      <button class="add-product w-5 h-5 text-2xl">
        +
      </button>
    </div>
    <div class="table-product-statistics my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl h-64">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              $name = array("ID", "Image", "Title", "Author", "Publisher", "Price", "Isbn", "Description", 'Quantity', 'Action');
              for ($i = 1; $i <= count($name); $i++) { ?>
                <th scope="col" class="px-6 py-3">
                  <?php echo $name[$i - 1] ?>
                </th>
              <?php }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $product_table = Product::all();
            if (count($product_table) > 0): ?>
              <?php foreach ($product_table as $product): ?>
                <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100 text-center">
                  <td class="px-5 py-3">
                    <?php echo $product->id ?>
                  </td>
                  <td class="p-3 h-24 w-32">
                    <img src="../resources/images/products/<?php echo $product->image_url ?>" alt="" />
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $product->title ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $product->author ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $product->publisher ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $product->price ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $product->isbn ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $product->description ?>
                  </td>
                  <td class="p-2">
                    <?php echo $product->quantity ?>
                  </td>
                  <td class="px-5 py-3 w-44">
                    <form action="/the-leafy-liberties/dashboard/product" class="button flex justify-center items-center gap-4" method="POST">
                      <!-- <button
                        class="edit-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-blue-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button> -->
                      <button id="deleteButton" type="submit"
                        class="delete-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-red-600 transition-all"
                        >
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div
      class="form absolute top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-[1000]">
      <div class="bg-white p-8 rounded-md shadow-lg w-[550px]">
        <h2 class="text-xl font-bold mb-4">Add Product</h2>
        <form class="flex flex-col" onSubmit="">
          <label for="title" class="my-2">Title:</label>
          <input type="text" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

          <label for="image" class="my-2">Image:</label>
          <input type="file" />
          <label for="category" class="my-2">Author:</label>
          <input type="text" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

          <label for="entered" class="my-2">Publisher:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

          <label for="remaining" class="my-2">Price:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

          <label for="status" class="my-2">Status:</label>
          <select value={status} class="bg-gray-100 p-3 focus:outline-none rounded-lg">
            <option value="">Select status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>

          <label for="amount">Amount:</label>
          <input type="text" value={amount} class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
            type="submit">
            Submit
          </button>
          <button class="my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Cancel
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  let btn = document.querySelector(".add-product")
  btn.addEventListener("click", () => {
    document.querySelector(".form").classList.add("flex");
    document.querySelector(".form").classList.remove("hidden");

  })
</script>
