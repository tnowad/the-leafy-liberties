<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\Pagination;

?>

<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Product</h1>
      <button class="w-5 h-5 text-2xl add-product">
        +
      </button>
    </div>
    <div class="my-8 bg-white shadow-lg cursor-pointer table-product-statistics rounded-2xl">
      <div class="relative">
        <table class="w-full h-64 text-sm text-center text-gray-500 rounded-2xl">
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
                <tr class="text-center transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                  <td class="px-5 py-3">
                    <?php echo $product->id ?>
                  </td>
                  <td class="w-32 h-24 p-3">
                    <img src="<?php echo BASE_URI . $product->image ?>" alt="" />
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
                  <td class="flex items-center justify-center h-full px-5 py-3 gap-2">
                    <a href="<?php echo BASE_URI . '/dashboard/product/update' . '?id=' . $product->id ?>"
                      class="edit-button py-2 px-3 bg-[#315854] text-white rounded-xl hover:bg-[#6cada6] transition-all block">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a id="deleteButton" href="<?php echo BASE_URI . '/dashboard/product/delete' . '?id=' . $product->id ?>"
                      class="delete-button py-2 px-3 bg-[#315854] text-white rounded-xl hover:bg-[#6cada6] transition-all">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div
      class="add-form fixed top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-[500]">
      <div class="bg-white p-8 rounded-md shadow-lg w-[550px] ">
        <h2 class="mb-4 text-xl font-bold">Add Product</h2>
        <form class="flex flex-col" action="<?php BASE_URI . '/dashboard/product' ?>" method="POST"
          enctype="multipart/form-data">
          <label for="title" class="my-2">Title:</label>
          <input type="text" value="" name="name" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />

          <label for="image" class="my-2">Image:</label>
          <input type="file" name="image" id="imgInp" />
          <!-- <img id="blah" src="#" class="object-contain h-40 mx-auto bg-gray-100 w-fit" /> -->
          <label for="entered" class="my-2">ISBN:</label>
          <input type="number" value="" name="isbn" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />

          <label for="price" class="my-2">Price:</label>
          <input type="number" value="" name="price" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />

          <label for="category" class="my-2">Description:</label>
          <textarea name="description" id="" cols="30" rows="4"
            class="p-3 bg-gray-100 rounded-lg focus:outline-none"></textarea>

          <label for="quantity" class="my-2">Quantity:</label>
          <input type="text" value="" name="quantity" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />
          <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
            type="submit">
            Submit
          </button>
          <button class="px-4 py-2 my-1 font-bold text-white bg-gray-500 rounded cancel-button hover:bg-gray-700">
            Cancel
          </button>
        </form>
      </div>
    </div>
  </div>
  <!-- <div id="popup-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <button type="button"
          class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
          data-modal-hide="popup-modal">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <div class="p-6 text-center">
        <i class="text-4xl fa-regular fa-circle-info"></i>
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this
            product?</h3>
          <button data-modal-hide="popup-modal" type="button"
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
            Yes, I'm sure
          </button>
          <button data-modal-hide="popup-modal" type="button"
            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
            cancel</button>
        </div>
      </div>
    </div>
  </div> -->
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
  let deletebtn = document.getElementById("deleteButton");
  deletebtn.addEventListener("click", (event) => {
    // event.preventDefault();
    confirm('Bạn có chắc muốn xóa sản phẩm này không?');
  })

</script>
