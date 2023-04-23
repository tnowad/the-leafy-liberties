<div class="add-form min-h-screen w-full justify-center items-center bg-opacity-75 z-[500] my-5">
  <div class="bg-white p-8 rounded-md shadow-lg w-full ">
    <h2 class="mb-4 text-xl font-bold">Add Product</h2>
    <form class="flex flex-col" action="<?php echo BASE_URI . "/dashboard/product/create"; ?>" method="POST"
      enctype="multipart/form-data">
      <label for="title" class="my-2">Title:</label>
      <input type="text" value="" name="name" class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <label for="image" class="my-2">Image:</label>
      <input type="file" name="image" onchange="loadFile(event)" required />
      <p>Preview Image:</p>
      <img id="output1" class="object-contain h-56 w-80"/>

      <label for="entered" class="my-2">ISBN:</label>
      <input type="number" value="" name="isbn" class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <label for="price" class="my-2">Price:</label>
      <input type="number" value="" step="0.01" name="price" class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <label for="category" class="my-2">Description:</label>
      <textarea name="description" id="" cols="30" rows="4"
        class="p-3 bg-gray-100 rounded-lg focus:outline-none" required></textarea>

      <label for="quantity" class="my-2">Quantity:</label>
      <input type="text" value="" name="quantity" class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />
      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="px-4 py-2 my-1 font-bold text-white bg-gray-500 rounded cancel-button hover:bg-gray-700 text-center"
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
</script>
