<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\Pagination;

?>

<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Category</h1>
      <div class="box-border w-1/2 px-10">
        <form class="flex items-center justify-center w-full h-10 bg-white rounded-full input"
          action="<?php BASE_URI . "/dashboard/product"; ?>" method="POST">
          <input type="text" name="searchQuery"
            class="w-full h-full pl-5 bg-transparent rounded-tl-full rounded-bl-full" placeholder="Search.... " />
          <button class="flex items-center justify-center w-10 h-10">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
      <button class="w-5 h-5 text-2xl add-category">
        +
      </button>
    </div>
    <div class="my-8 bg-white shadow-lg cursor-pointer table-product-statistics rounded-2xl">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              $name = [
                "ID",
                "Image",
                "Name",
                "Action"
              ];
              for ($i = 1; $i <= count($name); $i++) { ?>
                <th scope="col" class="px-6 py-3">
                  <?php echo $name[$i - 1]; ?>
                </th>
              <?php }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST["searchQuery"])) {
              $text = $_POST["searchQuery"];
              // dd($text);
              $categories = Category::filterAdvanced($text);
            } else {
              $categories = Category::all();
            }
            if (count($categories) > 0): ?>
              <?php foreach ($categories as $category): ?>
                <tr class="text-center transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                  <td class="px-5 py-3">
                    <?php echo $category->id; ?>
                  </td>
                  <td class="w-32 h-24 p-3">
                    <img src="<?php echo BASE_URI .
                      "/" .
                      $category->image; ?>" alt="" />
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $category->name; ?>
                  </td>
                  <td class="flex items-center justify-center h-full gap-2 px-5 py-3">
                    <div class="button flex justify-center items-center gap-4">
                      <a href="<?php echo BASE_URI .
                        "/dashboard/category/update" .
                        "?id=" .
                        $category->id; ?>"
                        class="edit-button py-2 px-3 bg-blue-400 text-white rounded-xl hover:text-pink-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <button
                        class="delete-button py-2 px-3 bg-red-400 text-white rounded-xl hover:text-blue-500 transition-all">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif;
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div
      class="add-form fixed top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-[500]">
      <div class="bg-white p-8 rounded-md shadow-lg w-[550px] ">
        <h2 class="mb-4 text-xl font-bold">Add Category</h2>
        <form class="flex flex-col" action="<?php BASE_URI .
          "/dashboard/product"; ?>" method="POST" enctype="multipart/form-data">

          <label for="image" class="my-2">Image:</label>
          <input type="file" name="image" id="imgInp" />
          <!-- <img id="blah" src="#" class="object-contain h-40 mx-auto bg-gray-100 w-fit" /> -->
          <label for="entered" class="my-2">Name:</label>
          <input type="text" value="" name="name" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />
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
  let btn = document.querySelector(".add-category")
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
