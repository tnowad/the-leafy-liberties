<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Users</h1>
      <button class="add-user w-5 h-5 text-2xl">
        +
      </button>
    </div>
    <div class="table-customer-statistics my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              use App\Models\Role;
              use App\Models\User;

              $name = [
                "ID",
                "Image",
                "Email",
                "Name",
                "Phone",
                "Role",
                "Status",
                "Action",
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
            $users = User::all();
            if (count($users) > 0): ?>
              <?php foreach ($users as $user): ?>
                <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100 text-center">
                  <td class="px-5 py-3">
                    <?php echo $user->id; ?>
                  </td>
                  <td class="px-5 py-3 w-32">
                    <img
                      src="<?php echo ($user->image == NULL) ? BASE_URI . '/resources/images/user/placeholder.png' : BASE_URI . $user->image ?>"
                      alt="" class="w-full h-full object-contain">
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->email; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->name; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $user->phone; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php
                    $role = Role::find($user->role_id);
                    echo ucfirst($role->name);
                    ?>
                  </td>
                  <td
                    class="px-5 py-3 <?php echo ($user->status == 1) ? 'text-primary-700 font-medium' : 'text-red-700 font-medium' ?>">
                    <?php
                    if ($user->status == 1) {
                      echo "Active";
                    } else {
                      echo "Banned";
                    }
                    ?>
                  </td>
                  <td class="px-5 py-3 w-44">
                    <div class="button flex justify-center items-center gap-4">
                      <a href="<?php echo BASE_URI .
                        "/dashboard/user/update" .
                        "?id=" .
                        $user->id; ?>"
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
      class="add-form fixed top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-[300]">
      <div class="bg-white p-8 rounded-md shadow-lg w-[550px]">
        <h2 class="text-xl font-bold mb-4">Add Customer</h2>
        <form class="flex flex-col" action="<?php echo BASE_URI .
          "/dashboard/user/update"; ?>" method="POST">
          <label for="image" class="my-2">Image:</label>
          <input type="file" name="image" />
          <label for="entered" class="my-2">Email:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="email" />
          <label for="category" class="my-2">Name:</label>
          <input type="text" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="name" />
          <label for="remaining" class="my-2">Password:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="password" />
          <label for="remaining" class="my-2">Phone:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="phone" />
          <label for="status" class="my-2">Gender:</label>
          <select value="" name="gender" class="bg-gray-100 p-3 focus:outline-none rounded-lg">
            <option value="">Select gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>

          <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
            type="submit">
            Submit
          </button>
          <button class="cancel-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
            type="button">
            Cancel
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  let btn = document.querySelector(".add-user")
  btn.addEventListener("click", () => {
    document.querySelector(".add-form").classList.add("flex");
    document.querySelector(".add-form").classList.remove("hidden");

  })
  let cancel = document.querySelector(".cancel-button");
  cancel.addEventListener("click", (event) => {
    event.preventDefault();
    document.querySelector(".add-form").classList.add("hidden");
  })
</script>
