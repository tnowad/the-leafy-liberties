<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Comment</h1>
    </div>
    <div class="my-8 bg-white shadow-lg cursor-pointer table-coupon-statistics rounded-2xl">
      <div class="relative">
        <table class="w-full h-64 text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              $name = array("No", "Name", "Description", "Actived", "Expired", "Amount", "Status", "Action");
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
            for ($i = 1; $i <= 10; $i++) { ?>
              <tr class="transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap">
                  <?php echo $i ?>
                </td>
                <td class="px-5 py-3">APP10K</td>
                <td class="block px-5 py-3 truncate w-80">Giảm ngay 10K khi sử dụng mã.Áp dụng cho mọi đơn hàng.Nostrud eu
                  ipsum do ea exercitation duis magna elit cillum.Aute mollit labore consectetur excepteur.Laboris
                  exercitation fugiat commodo esse ut veniam dolore consectetur ea fugiat.
                </td>
                <td class="px-5 py-2">11/12/2023</td>
                <td class="px-5 py-3">23/12/2023</td>
                <td class="px-5 py-3">3</td>
                <td class="px-5 py-3">Actived</td>
                <td class="px-5 py-3 w-44">
                  <div class="flex items-center justify-center gap-4 button">
                    <button
                      class="edit-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-blue-500 transition-all">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button
                      class="delete-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-red-600 transition-all">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div
      class="form absolute top-0 left-0 h-full w-full hidden justify-center items-center bg-gray-400 bg-opacity-75 z-[100]">
      <div class="bg-white p-8 rounded-md shadow-lg w-[600px]">
        <h2 class="mb-4 text-xl font-bold">Add Coupon</h2>
        <form class="flex flex-col" onSubmit="">
          <label for="image" class="my-2">Name:</label>
          <input type="text" value="" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />
          <label for="category" class="my-2">Description:</label>
          <textarea name="description" class="p-3 bg-gray-100 rounded-lg focus:outline-none"></textarea>
          <label for="entered" class="my-2">Actived:</label>
          <input type="date" value="" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />
          <label for="remaining" class="my-2">Expired:</label>
          <input type="date" value="" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />
          <label for="remaining" class="my-2">Amount:</label>
          <input type="number" value="" class="p-3 bg-gray-100 rounded-lg focus:outline-none" />
          <label for="status" class="my-2">Status:</label>
          <select value={status} class="p-3 bg-gray-100 rounded-lg focus:outline-none">
            <option value="">Select status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
          <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
            type="submit">
            Submit
          </button>
          <button class="px-4 py-2 my-1 font-bold text-white bg-gray-500 rounded hover:bg-gray-700">
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