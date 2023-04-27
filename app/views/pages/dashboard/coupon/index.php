<div class="w-full my-0 mx-auto">
  <div class="mt-10 min-h-screen box-border w-full px-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Coupon</h1>
      <div class="box-border w-1/2 px-10">
        <form action="<?php echo BASE_URI . '/dashboard/coupon' ?>" method="GET"
          class="flex items-center justify-center w-full h-10 bg-gray-100 rounded-full">
          <input type="text" name="keywords" class="w-full h-full pl-5 rounded-tl-full rounded-bl-full"
            placeholder="Search.... "
            value="<?php echo isset($params['filter']['keywords']) ? $params['filter']['keywords'] : '' ?>" />
          <button class="flex items-center justify-center w-10 h-10 bg-gray-100">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
      <a href="<?php echo BASE_URI . '/dashboard/coupon/create' ?>" class="add-coupon w-5 h-5 text-2xl">
        +
      </a>
    </div>
    <div class="table-coupon-statistics my-8 shadow-lg cursor-pointer rounded-2xl bg-white">
      <div class="relative">
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <?php
              $namess = [
                "No",
                "Code",
                "Expired",
                "Quantity",
                "Description",
                "Action",
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
            <?php
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
                        class="edit-button py-2 px-3 bg-blue-400 text-white rounded-xl hover:text-pink-500 transition-all">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <a href="<?php echo BASE_URI .
                        "/dashboard/coupon/delete" .
                        "?id=" .
                        $coupon->id; ?>"
                        class="delete-button py-2 px-3 bg-red-400 text-white rounded-xl hover:text-blue-500 transition-all">
                        <i class="fa-solid fa-trash"></i>
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
  </div>
</div>
<script>
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
