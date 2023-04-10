<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Coupon</h1>
      <button class="add-coupon w-5 h-5 text-2xl">
        +
      </button>
    </div>
    <div class="table-coupon-statistics my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl h-64">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              use App\Models\Coupon;

              $name = array("No", "Name","Actived", "Expired", "Amount","Description" ,"Action");
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
            $coupons_table = Coupon::all();
            if (count($coupons_table) > 0): ?>
              <?php foreach ($coupons_table as $coupon): ?>
                <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100 text-center">
                  <td class="px-5 py-3">
                    <?php echo $coupon->id ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->name ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->active ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->expired ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->quantity ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->description ?>
                  </td>
                  <td class="px-5 py-3 w-44">
                    <div class="button flex justify-center items-center gap-4">
                      <button
                        class="edit-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-blue-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                      <button
                        class="delete-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-red-600 transition-all"
                        <?php echo $coupon->id ?>>
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
    <div
      class="form absolute top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-[100]">
      <div class="bg-white p-8 rounded-md shadow-lg w-[600px]">
        <h2 class="text-xl font-bold mb-4">Add Coupon</h2>
        <form class="flex flex-col" onSubmit="">
          <label for="image" class="my-2">Name:</label>
          <input type="text" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <label for="category" class="my-2">Description:</label>
          <textarea name="description" class="bg-gray-100 p-3 focus:outline-none rounded-lg"></textarea>
          <!-- <script>
            CKEDITOR.replace('description');
          </script> -->
          <label for="entered" class="my-2">Actived:</label>
          <input type="date" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <label for="remaining" class="my-2">Expired:</label>
          <input type="date" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <label for="remaining" class="my-2">Amount:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />
          <label for="status" class="my-2">Status:</label>
          <select value={status} class="bg-gray-100 p-3 focus:outline-none rounded-lg">
            <option value="">Select status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
          <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
            type="submit">
            Submit
          </button>
          <button class="my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Cancel
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  let btn = document.querySelector(".add-coupon")
  btn.addEventListener("click", () => {
    document.querySelector(".form").classList.add("flex");
    document.querySelector(".form").classList.remove("hidden");

  })
</script>
