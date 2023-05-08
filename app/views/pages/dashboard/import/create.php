<?php
use App\Models\User;

?>
<div class="add-form min-h-screen w-full justify-center items-center bg-opacity-75 z-[500] my-5">
  <div class="w-full p-8 bg-white rounded-md shadow-lg ">
    <h2 class="mb-4 text-xl font-bold">Add Import Bill</h2>
    <form class="flex flex-col" action="<?php echo BASE_URI . "/dashboard/import/create"; ?>" method="POST"
      enctype="multipart/form-data">
      <label for="gender" class="my-2">User:</label>
      <div class="flex items-center justify-between gap-4">
        <select value="" name="user_id"
          class="w-full p-3 bg-gray-100 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-primary-400"
          required>
          <option value=""></option>
          <?php foreach (User::all() as $user): ?>
            <option value="<?php echo $user->id ?>">
              <?php echo $user->name ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
      
      <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
        type="submit">
        Submit
      </button>
      <a class="px-4 py-2 my-1 font-bold text-center text-white bg-gray-500 rounded cancel-button hover:bg-gray-700 transition-none"
        href="<?php echo BASE_URI . '/dashboard/import' ?>">
        Cancel
      </a>
    </form>
  </div>
</div>
<script>
  let button = document.querySelector("button[type='submit']");
  let inputName = document.querySelector("input[name='name']");
  let inputPrice = document.querySelector("input[name='total_price']");
  button.addEventListener("click", () => {
    if (inputName.value.trim() === '') {
      alert('Please enter a name');
      inputName.focus()
      return;
    }
  });

</script>
