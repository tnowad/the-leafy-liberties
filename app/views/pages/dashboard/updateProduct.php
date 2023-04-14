<div class="w-full ">
  <div class="bg-white rounded-md shadow-lg w-full p-5 m-5 h-full">
    <form class="flex flex-col" action="<?php echo BASE_URI . '/dashboard/product/update' ?>" method="POST">
      <label for="title" class="my-2">Title:</label>
      <input type="text" value="" name="title" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="image" class="my-2">Image:</label>
      <input type="file" name="image" id="imgInp" />
      <div class="preview-img w-full h-44 hidden object-contain"></div>

      <label for="entered" class="my-2">ISBN:</label>
      <input type="number" value="" name="isbn" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="price" class="my-2">Price:</label>
      <input type="number" value="" name="price" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="category" class="my-2">Description:</label>
      <textarea name="description" id="" cols="30" rows="6" class="bg-gray-100 p-3 focus:outline-none rounded-lg"></textarea>

      <label for="quantity" class="my-2">Quantity:</label>
      <input type="text" value="" name="quantity" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="cancel-edit-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center"
        href="<?php echo BASE_URI . '/dashboard/product' ?>">
        Cancel
      </a>
    </form>
  </div>
</div>
