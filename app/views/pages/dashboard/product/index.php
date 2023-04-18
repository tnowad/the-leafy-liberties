<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\Pagination;

?>

<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Product</h1>
      <div class="box-border w-1/2 px-10">
        <form class="flex items-center justify-center w-full h-10 bg-white rounded-full input"
          action="<?php BASE_URI . '/dashboard/product' ?>" method="POST">
          <input type="text" name="searchQuery"
            class="w-full h-full pl-5 bg-transparent rounded-tl-full rounded-bl-full" placeholder="Search.... " />
          <button class="flex items-center justify-center w-10 h-10">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
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
            if (isset($_POST['searchQuery'])) {
              $text = $_POST['searchQuery'];
              dd($text);
              $products = Product::filterAdvanced($text);
            } else {
              $products = Product::all();
            }
            if (count($products) > 0): ?>
              <?php foreach ($products as $product): ?>
                <tr class="text-center transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                  <td class="px-5 py-3">
                    <?php echo $product->id ?>
                  </td>
                  <td class="w-32 h-24 p-3">
                    <img src="<?php echo BASE_URI . '/' .$product->image ?>" alt="" />
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
                  <td class="flex items-center justify-center h-full gap-2 px-5 py-3">
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
  const form = document.querySelector('form.input');
  form.addEventListener('submit', function (e) {
    // e.preventDefault();
    // prevent the form from submitting normally

    const input = document.querySelector('input[name="searchQuery"]');
    const value = input.value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo BASE_URI . '/dashboard/product' ?>', true);
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
      }
    };
    xhr.send(`searchQuery=${value}`);
  });

</script>
