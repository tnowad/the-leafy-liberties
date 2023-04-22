<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Settings</h1>
    </div>
    <div class="table-customer-statistics my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php

              use App\Models\Role;
              use App\Models\Setting;

              $name = [
                "ID",
                "Name",
                "Value",
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
            $settings = Setting::all();
            if (count($settings) > 0): ?>
              <?php foreach ($settings as $setting): ?>
                <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100 text-center">
                  <td class="px-5 py-3">
                    <?php echo $setting->id; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $setting->name; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $setting->value; ?>
                  </td>
                  <td class="px-5 py-3 w-44">
                    <div class="button flex justify-center items-center gap-4">
                      <a href="<?php echo BASE_URI .
                        "/dashboard/setting/update" .
                        "?id=" .
                        $setting->id; ?>"
                        class="edit-button py-2 px-3 bg-blue-400 text-white rounded-xl hover:text-pink-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
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
    <!-- <div class="add-form fixed top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-[300]">
            <div class="bg-white p-8 rounded-md shadow-lg w-[550px]">
                <h2 class="text-xl font-bold mb-4">Add Customer</h2>
                <form class="flex flex-col" action="<?php echo BASE_URI .
                  "/dashboard/setting/update"; ?>" method="POST">
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

                    <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded" type="submit">
                        Submit
                    </button>
                    <button class="cancel-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" type="button">
                        Cancel
                    </button>
                </form>
            </div>
        </div> -->
  </div>
</div>
<script>
  let btn = document.querySelector(".add-setting")
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
