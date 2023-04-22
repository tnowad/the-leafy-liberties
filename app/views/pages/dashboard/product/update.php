<?php $product = $params["product"]; ?>
<div class="w-full min-h-screen">
  <div class="bg-white rounded-md shadow-lg w-full p-5 m-5 h-full">
    <form class="flex flex-col" action="<?php echo BASE_URI .
      "/dashboard/product/update"; ?>" method="POST">
      <input type="hidden" value="<?php echo $product->id; ?>" name="id"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="title" class="my-2">Title:</label>
      <input type="text" value="<?php echo $product->name; ?>" name="name"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="image" class="my-2">Image:</label>
      <input type="file" name="image" id="imgInp" onchange="loadFile(event)" />
      <p>Preview Image:</p>
      <img id="output" class="w-80 h-56"/>

      <label for="entered" class="my-2">ISBN:</label>
      <input type="number" value="<?php echo $product->isbn; ?>" name="isbn"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="price" class="my-2">Price:</label>
      <input type="number" value="<?php echo $product->price; ?>" name="price"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="category" class="my-2">Description:</label>
      <textarea name="description" id="" cols="30" rows="6" class="bg-gray-100 p-3 focus:outline-none rounded-lg"><?php echo $product->description; ?>
      </textarea>

      <label for="quantity" class="my-2">Quantity:</label>
      <input type="text" value="<?php echo $product->quantity; ?>" name="quantity"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="cancel-edit-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center"
        href="<?php echo BASE_URI . "/dashboard/product"; ?>">
        Cancel
      </a>
    </form>
  </div>
</div>
<script>
  let cancel = document.querySelector(".cancel-edit-button");
  cancel.addEventListener("click", (event) => {
    // event.preventDefault();
  })
  var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
