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
              $name = array("ID", "Image", "Title", "Price", "Isbn", "Description", 'Quantity', 'Action');
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
                    <img src="<?php echo BASE_URI ?>/resources/images/products/<?php echo $product->image ?>" alt="" />
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $product->name ?>
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
                  <td class="px-5 py-3 flex h-full justify-center items-center">
                    <a
                      href="<?php echo BASE_URI . '/dashboard/product/update' . '?id=' .  $product->id ?>"
                      class="edit-button py-2 px-3 bg-[#315854] text-white rounded-xl hover:bg-[#6cada6] transition-all block">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <button id="deleteButton" type="submit"
                      class="delete-button py-2 px-3 bg-[#315854] text-white rounded-xl hover:bg-[#6cada6] transition-all">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div
      class="add-form absolute top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-[1000]">
      <div class="bg-white p-8 rounded-md shadow-lg w-[550px] ">
        <h2 class="text-xl font-bold mb-4">Add Product</h2>
        <form class="flex flex-col" action="<?php BASE_URI . '/dashboard/product' ?>" method="POST">
          <label for="title" class="my-2">Title:</label>
          <input type="text" value="" name="name" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

          <label for="image" class="my-2">Image:</label>
          <input type="file" name="image" id="imgInp" />
          <!-- <img id="blah" src="#" class="w-fit h-40 object-contain bg-gray-100 mx-auto" /> -->
          <label for="entered" class="my-2">ISBN:</label>
          <input type="number" value="" name="isbn" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

          <label for="price" class="my-2">Price:</label>
          <input type="number" value="" name="price" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

          <label for="category" class="my-2">Description:</label>
          <textarea name="description" id="" cols="30" rows="10"></textarea>

          <label for="quantity" class="my-2">Quantity:</label>
          <input type="text" value="" name="quantity" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
            type="submit">
            Submit
          </button>
          <button class="cancel-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
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
    document.querySelector(".add-form").classList.add("flex");
    document.querySelector(".add-form").classList.remove("hidden");

  })
  let cancel = document.querySelector(".cancel-button")
  cancel.addEventListener("click", (event) => {
    event.preventDefault();
    document.querySelector(".add-form").classList.add("hidden")
  })
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
</script>