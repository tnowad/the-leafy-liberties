<?php
use App\Models\Author;
use App\Models\Publisher;

?>
<div class="add-form min-h-screen w-full justify-center items-center bg-opacity-75 z-[500] my-5">
  <div class="w-full p-8 bg-white rounded-md shadow-lg ">
    <h2 class="mb-4 text-xl font-bold">Add Product</h2>
    <form class="flex flex-col" action="<?php echo BASE_URI . "/dashboard/product/create"; ?>" method="POST"
      enctype="multipart/form-data">
      <label for="title" class="my-2">Title:</label>
      <input type="text" value="" name="name" class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <label for="image" class="my-2">Image:</label>
      <input type="file" name="image" onchange="loadFile(event)" required />
      <p>Preview Image:</p>
      <img id="output1" class="object-contain h-56 w-80" />

      <label for="entered" class="my-2">ISBN:</label>
      <input type="number" value="" name="isbn" class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <label for="price" class="my-2">Price:</label>
      <input type="number" value="" step="0.01" name="price" class="p-3 bg-gray-100 rounded-lg focus:outline-none"
        required />
      <label for="gender" class="my-2">Author:</label>
      <div class="flex items-center justify-between gap-4">
        <select value="" name="author" class="w-full p-3 bg-gray-100 rounded-lg appearance-none focus:outline-none">
          <option value=""></option>
          <?php foreach (Author::all() as $author): ?>
            <option value="<?php echo $author->id ?>">
              <?php echo $author->name ?>
            </option>
          <?php endforeach ?>
        </select>
        <i class="p-2 text-white rounded-full fa-solid fa-plus plus-icon bg-primary"></i>
      </div>
      <div class="flex-col hidden author-add">
        <input type="hidden" name="author-id" />
        <label for="title" class="my-2">Add new author name:</label>
        <input type="text" value="" name="author-name" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />
      </div>
      <label for="gender" class="my-2">Publisher:</label>
      <div class="flex items-center justify-between gap-4">
        <select value="" name="publisher" class="w-full p-3 bg-gray-100 rounded-lg appearance-none focus:outline-none">
          <option value=""></option>
          <?php foreach (Publisher::all() as $publish): ?>
            <option value="<?php echo $publish->id ?>">
              <?php echo $publish->name ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
      <label for="category" class="my-2">Description:</label>
      <textarea name="description" id="" cols="30" rows="4" class="p-3 bg-gray-100 rounded-lg focus:outline-none"
        required></textarea>

      <label for="quantity" class="my-2">Quantity:</label>
      <input type="text" value="" name="quantity" class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />
      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="px-4 py-2 my-1 font-bold text-center text-white bg-gray-500 rounded cancel-button hover:bg-gray-700"
        href="<?php echo BASE_URI . '/dashboard/product' ?>">
        Cancel
      </a>
    </form>
  </div>
</div>
<script>
  var loadFile = function (event) {
    var output = document.getElementById('output1');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  let icon = document.querySelector(".plus-icon");
  icon.addEventListener("click", () => {
    if (icon.classList.contains("fa-plus")) {
      icon.classList.add("fa-minus");
      icon.classList.remove("fa-plus");
      document.querySelector(".author-add").classList.remove("hidden")
      document.querySelector(".author-add").classList.add("flex")


    } else {
      icon.classList.remove("fa-minus");
      icon.classList.add("fa-plus");
      document.querySelector(".author-add").classList.add("hidden")
      document.querySelector(".author-add").classList.remove("flex")
    }

  })
</script>