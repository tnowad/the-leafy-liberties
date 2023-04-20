<!-- <?php
$text = $_POST["searchQuery"];
echo $text;
?> -->
<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Coupon</h1>
      <div class="box-border w-1/2 px-10">
        <form class="input flex items-center justify-center w-full h-10 bg-white rounded-full"
          action="<?php BASE_URI . "/dashboard/product"; ?>" method="POST">
          <input type="text" name="searchQuery"
            class="w-full h-full pl-5 bg-transparent rounded-tl-full rounded-bl-full" placeholder="Search.... " />
          <button class="flex items-center justify-center w-10 h-10">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
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

              $name = [
                "No",
                "Code",
                "Expired",
                "Quantity",
                "Description",
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
            if (isset($_POST["searchQuery"])) {
              $text = $_POST["searchQuery"];
              $coupons = Coupon::filterAdvancedCoupon($text);
            } else {
              $coupons = Coupon::all();
            }
            if (count($coupons) > 0): ?>
              <?php foreach ($coupons as $coupon): ?>
                <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100 text-center">
                  <td class="px-5 py-3">
                    <?php echo $coupon->id; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->code; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->expired; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->quantity; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $coupon->description; ?>
                  </td>
                  <td class="px-5 py-3 w-44">
                    <div class="button flex justify-center items-center gap-4">
                      <a href="<?php echo BASE_URI .
                        "/dashboard/coupon/update" .
                        "?id=" .
                        $coupon->id; ?>"
                        class="edit-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-blue-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <button
                        class="delete-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-red-600 transition-all">
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
      <div class="bg-white p-8 rounded-md shadow-lg w-[600px]">
        <h2 class="text-xl font-bold mb-4">Add Coupon</h2>
        <form class="flex flex-col" method="POST" action="<?php BASE_URI .
          "/dashboard/coupon"; ?>">
          <label for="image" class="my-2">Code:</label>
          <input type="text" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="code" />
          <label for="category" class="my-2">Description:</label>
          <textarea name="description" class="bg-gray-100 p-3 focus:outline-none rounded-lg"></textarea>
          <!-- <script>
            CKEDITOR.replace('description');
          </script> -->
          <label for="expired" class="my-2">Expired:</label>
          <input type="date" value="" id="task_date" class="bg-gray-100 p-3 focus:outline-none rounded-lg"
            name="expired" onchange="return CheckExpired();" />
          <label for="remaining" class="my-2">Quantity:</label>
          <input type="number" value="" class="bg-gray-100 p-3 focus:outline-none rounded-lg" name="quantity" />
          <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded"
            type="submit">
            Submit
          </button>
          <button id="cancel" class="my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
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
    document.querySelector(".add-form").classList.add("flex");
    document.querySelector(".add-form").classList.remove("hidden");

  })
  let cancel = document.querySelector("#cancel");
  cancel.addEventListener("click", (event) => {
    event.preventDefault();
    document.querySelector(".add-form").classList.add("hidden")
  })
  function CheckExpired() {
    var current = new Date(document.getElementById('task_date').value);
    var today = new Date();
    if (current.getTime() <= today.getTime()) {
      alert("You Can't Assign Task For Expired Date");
      document.getElementById('task_date').value = "";
    }
    else {
      return true;
    }
  }
</script>
