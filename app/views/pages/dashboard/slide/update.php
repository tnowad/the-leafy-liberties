<?php $slide = $params["slide"]; ?>
<div class="w-full min-h-screen">
  <div class="bg-white rounded-md shadow-lg w-full p-5 m-5 h-full">
    <form class="flex flex-col" action="<?php echo BASE_URI .
      "/dashboard/slide/update"; ?>" method="POST">

      <label for="id" class="my-2">ID:</label>
      <input type="text" value="<?php echo $slide->id; ?>" name="id"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="title" class="my-2">Title:</label>
      <input type="text" value="<?php echo $slide->name; ?>" name="title"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
      <label for="title" class="my-2">Title:</label>
      <input type="file" value="<?php echo $slide->image; ?>" name="title"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <label for="status" class="my-2">Status:</label>
      <input type="number" value="<?php echo $slide->status; ?>" name="status"
        class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="cancel-edit-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center"
        href="<?php echo BASE_URI . "/dashboard/slide"; ?>">
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
</script>
