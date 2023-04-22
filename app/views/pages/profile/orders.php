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
      <div class="my-5 overflow-hidden bg-white shadow-lg cursor-pointer table-statistics rounded-2xl w-full mx-4">
        <div class="relative w-full">
          <table class="w-full overflow-y-scroll text-sm text-center text-gray-500 rounded-2xl" width="100%">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <?php
                $tableName = [
                  "Name",
                  "Email",
                  "Order",
                  "Total price",
                  "Status",
                  "Action",
                  ""
                ];
                for ($i = 1; $i <= count($tableName); $i++) { ?>
                  <th scope="col" class="px-6 py-3">
                    <?php echo $tableName[$i - 1]; ?>
                  </th>
                <?php }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $order): ?>
                <tr class="px-5 py-3">
                  <td class="px-5 py-3">
                    <?php echo $order->name; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $order->email; ?>
                  </td>
                  <td class="px-5 py-3" width="50%">
                    <ul>
                      <?php foreach (array_slice(OrderProduct::findAll(['order_id' => $order->id]), 0, 3) as $orderProduct): ?>
                        <li>
                          <?php echo $orderProduct->product()->name ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </td>

                  <td class="px-5 py-3" width="15%">
                    <?php echo $order->total_price; ?>
                  </td>
                  <td class="px-5 py-3">
                    <!-- if status is 0 is pending, 1 is accept, 2 is shipping, 3 is successful, 4 is cancel, 5 is reject -->
                    <?php if ($order->status == 0): ?>
                    <p class="font-medium text-primary">Pending</p>
                      <?php elseif ($order->status == 1): ?>
                      <p class="font-medium text-green-800">Accept</p>
                      <?php elseif ($order->status == 2): ?>
                      <p class="font-medium text-yellow-800">Shipping</p>
                      <?php elseif ($order->status == 3): ?>
                      <p class="font-medium text-green-800">Successful</p>
                      <?php elseif ($order->status == 4): ?>
                      <p class="font-medium text-pink-800">Cancel</p>
                      <?php elseif ($order->status == 5): ?>
                      <p class="font-medium text-red-800">Reject</p>
                      <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?php echo BASE_URI . '/profile/orders?id=' . $order->id ?>"
                      class="edit-button p-2 rounded-md text-center">
                      <!-- <i class="fa-solid fa-pen-to-square"></i> -->
                      <a href="<?php echo BASE_URI .
                        "/profile/orders/orderDetail" .
                        "?id=" .
                        $order->id; ?>"
                        class="edit-button py-2 px-3 bg-blue-400 text-white rounded-xl hover:text-pink-500 transition-all"
                        >
                        <i class="fa-solid fa-circle-info text-black text-xl hover:text-orange-600 transition-colors"></i>
                      </a>
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
  // if order status is pending, the button is show else hidden
</script>
