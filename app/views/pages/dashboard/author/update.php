<?php $author = $params["author"];
use App\Models\Author;
use App\Models\Publisher;

?>
<div class="w-full min-h-screen">
  <div class="w-full h-full p-5 m-5 bg-white rounded-md shadow-lg">
    <form class="flex flex-col" action="<?php echo BASE_URI . "/dashboard/author/update"; ?>" method="POST"
      enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $author->id; ?>" name="id" class="" required />

      <label for="title" class="my-2">Title:</label>
      <input type="text" value="<?php echo $author->name; ?>" name="name"
        class="p-3 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-400" required />

      <label for="img" class="my-2">Image:</label>
      <input type="file" name="image" id="imgInp" onchange="loadFile(event)" />
      <p>Preview Image:</p>
      <img id="output" class="object-contain h-56 w-80" src="<?php echo BASE_URI . $author->image ?>" />
      <input type="text" value="<?php echo $author->image; ?>" name="old_img" class="opacity-0" />
      <!-- <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <?php
            $namess = [
              "ID",
              "Image",
              "Title",
            ];
            for ($i = 1; $i <= count($namess); $i++) { ?>
              <th scope="col" class="px-6 py-3">
                <?php echo $namess[$i - 1]; ?>
              </th>
            <?php }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($author->products() as $product): ?>
            <tr class="text-center transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
              <td class="px-5 py-3">
                <?php echo $product->id; ?>
              </td>
              <td class="w-32 h-24 p-3">
                <img src="<?php echo BASE_URI . $product->image; ?>" alt="" />
              </td>
              <td class="px-5 py-3">
                <?php echo $product->name; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table> -->
      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="px-4 py-2 my-1 font-bold text-center text-white bg-gray-500 rounded cancel-edit-button hover:bg-gray-700"
        href="<?php echo BASE_URI . "/dashboard/author"; ?>">
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
