<?php
use App\Models\OrderProduct;
use App\Models\Product;

$orders = $params['orders'];
?>

<div class="flex justify-center w-full bg-white">
  <div class="container">
    <div class="box-border flex flex-col w-full mt-10 border border-b-2 border-gray-300 md:flex-row">
      <?php include "menu.php"; ?>
      <!-- content -->
      <div class="my-8 overflow-hidden bg-white shadow-lg cursor-pointer table-statistics rounded-2xl">
        <div class="relative">
          <table class="w-full h-64 overflow-y-scroll text-sm text-center text-gray-500 rounded-2xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-16 py-3">

                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $order): ?>
                <tr class="py-3">
                  <td class="">
                    <?php echo $order->id; ?>
                  </td>
                  <td class="">
                    <?php echo $order->name; ?>
                  </td>
                  <td class="">
                    <?php echo $order->email; ?>
                  </td>

                  <td>
                    <ul>
                      <?php foreach (array_slice(OrderProduct::findAll(['order_id' => $order->id]), 0, 3) as $orderProduct): ?>
                        <li>
                          <?php echo $orderProduct->product()->name ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </td>

                  <td class="">
                    <?php echo $order->total_price; ?>
                  </td>
                  <td class="">
                    <!-- if status is 0 is pending, 1 is accept, 2 is shipping, 3 is successful, 4 is cancel, 5 is reject -->
                    <?php if ($order->status == 0): ?>
                      <i class="text-yellow-500 fas fa-clock"></i>
                    <?php elseif ($order->status == 1): ?>
                      <i class="text-blue-500 fas fa-check-circle"></i>
                    <?php elseif ($order->status == 2): ?>
                      <i class="text-blue-600 fas fa-truck"></i>
                    <?php elseif ($order->status == 3): ?>
                      <i class="text-green-500 fas fa-check"></i>
                    <?php elseif ($order->status == 4): ?>
                      <i class="text-red-500 fas fa-times-circle"></i>
                    <?php elseif ($order->status == 5): ?>
                      <i class="text-red-500 fas fa-times"></i>
                    <?php endif; ?>
                  </td>
                  <td class="">
                    <!-- icon view -->
                    <a href="<?php echo BASE_URI . '/profile/orders?id=' . $order->id ?>">
                      <i class="text-blue-500 fas fa-eye"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  async function getUser() {
    let d1 = await fetch("http://localhost/the-leafy-liberties/profile")
    let d2 = await d1.json()
    console.log(d2)
    // document.getElementById("name").value = d2.name;
    // document.getElementById("gender").value = d2.gender;
    // document.getElementById("birthday").value = d2.birthday;
    // document.getElementById("password").value = d2.password;
  }
  console.log(1)
  getUser()
</script>
