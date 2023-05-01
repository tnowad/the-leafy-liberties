<?php $product = $params["product"];
use App\Models\Author;
use App\Models\Publisher; ?>
<div class="w-full min-h-screen">
  <div class="w-full h-full p-5 m-5 bg-white rounded-md shadow-lg">
    <form class="flex flex-col" action="<?php echo BASE_URI . "/dashboard/product/update"; ?>" method="POST"
      enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $product->id; ?>" name="id"
        class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <label for="title" class="my-2">Title:</label>
      <input type="text" value="<?php echo $product->name; ?>" name="name"
        class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <label for="img" class="my-2">Image:</label>
      <input type="file" name="image" id="imgInp" onchange="loadFile(event)" />
      <p>Preview Image:</p>
      <img id="output" class="object-contain h-56 w-80" src="<?php echo BASE_URI . $product->image ?>" />

      <label for="entered" class="my-2">ISBN:</label>
      <input type="number" value="<?php echo $product->isbn; ?>" name="isbn"
        class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <label for="price" class="my-2">Price:</label>
      <input type="number" value="<?php echo $product->price; ?>" name="price"
        class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />
      <label for="gender" class="my-2">Author:</label>
      <select value="" name="author" class="bg-gray-100 p-3 focus:outline-none rounded-lg appearance-none" required>
        <option value="<?php echo $product->author()->id ?>">
          <?php echo $product->author()->name ?>
        </option>
        <?php foreach (Author::all() as $authorItem): ?>
          <option value="<?php echo $authorItem->id ?>">
            <?php echo $authorItem->name ?>
          </option>
        <?php endforeach ?>
      </select>
      <label for="gender" class="my-2">Publisher:</label>
      <select value="" name="publisher" class="bg-gray-100 p-3 focus:outline-none rounded-lg w-full appearance-none">
        <option value="<?php echo $product->publisher()->id ?>">
          <?php echo $product->publisher()->name ?>
        </option>
        <?php foreach (Publisher::all() as $publish): ?>
          <option value="<?php echo $publish->id ?>">
            <?php echo $publish->name ?>
          </option>
        <?php endforeach ?>
      </select>
      <label for="category" class="my-2">Description:</label>
      <textarea name="description" id="" cols="30" rows="6" class="p-3 bg-gray-100 rounded-lg focus:outline-none"><?php echo $product->description; ?>
      </textarea>

      <label for="quantity" class="my-2">Quantity:</label>
      <input type="text" value="<?php echo $product->quantity; ?>" name="quantity"
        class="p-3 bg-gray-100 rounded-lg focus:outline-none" required />

      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="px-4 py-2 my-1 font-bold text-center text-white bg-gray-500 rounded cancel-edit-button hover:bg-gray-700"
        href="<?php echo BASE_URI . "/dashboard/product"; ?>">
        Cancel
      </a>
    </form>
  </div>
</div>
<script>
  var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
