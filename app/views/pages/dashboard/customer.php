<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Customer</h1>
      <button class="add-product w-5 h-5 text-2xl">
        +
      </button>
    </div>
    <div class="table-customer-statistics my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              use App\Models\User;

              $name = array("ID", "Image", "Email", "Name", "Password", "Phone", "Role_ID", "Status", "Action");
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
            $users_table = User::all();
            if (count($users_table) > 0): ?>
              <?php foreach ($users_table as $user): ?>
                <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100 text-center">
                  <td class="px-5 py-3">
                    <?php echo $user->id ?>
                  </td>
                  <td class="px-5 py-3 w-28">
                    <img src="<?php echo $user->user_image ?>" alt="">
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->email ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->name ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->password ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->phone ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->role_id ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->status ?>
                  </td>
                  <td class="px-5 py-3 w-44">
                    <div class="button flex justify-center items-center gap-4">
                      <button
                        class="edit-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-blue-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                      <button
                        class="delete-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-red-600 transition-all"
                        <?php echo $user->id ?>>
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- <div
      class="form absolute top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-10">
      <div class="bg-white p-8 rounded-md shadow-lg w-[550px]">
        <h2 class="text-xl font-bold mb-4">Add Product</h2>
        <form class="flex flex-col" onSubmit="">
          <label for="image" class="my-2">Image:</label>
          <input type="file" />
          <label for="category" class="my-2">Category:</label>
          <input type="text" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <label for="entered" class="my-2">Entered:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <label for="remaining" class="my-2">Remaining:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <label for="status" class="my-2">Status:</label>
          <select value={status} class="bg-gray-100 p-3 focus:outline-none rounded-lg">
            <option value="">Select status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>

          <label for="amount">Amount:</label>
          <input type="text" value={amount} class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
            type="submit">
            Submit
          </button>
          <button class="my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Cancel
          </button>
        </form>
      </div>
    </div> -->
  </div>
</div>
<script>
  // let btn = document.querySelector(".add-product")
  // btn.addEventListener("click", () => {
  //   document.querySelector(".form").classList.add("flex");
  //   document.querySelector(".form").classList.remove("hidden");

  // })
</script>
