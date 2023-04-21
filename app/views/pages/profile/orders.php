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
                <?php
                $tableName = [
                  "ID",
                  "Name",
                  "Email",
                  "Product name",
                  "Total price",
                  "Status",
                  "Action",
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
              <?php foreach ($orders as $order) : ?>
                <tr class="px-5 py-3">
                  <td class="px-5 py-3">
                    <?php echo $order->id; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $order->name; ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $order->email; ?>
                  </td>
                  <td class="px-5 py-3">
                    <ul>
                      <?php foreach (array_slice(OrderProduct::findAll(['order_id' => $order->id]), 0, 3) as $orderProduct) : ?>
                        <li>
                          <?php echo $orderProduct->product()->name ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </td>

                  <td class="px-5 py-3">
                    <?php echo $order->total_price; ?>
                  </td>
                  <td class="px-5 py-3">
                    <!-- if status is 0 is pending, 1 is accept, 2 is shipping, 3 is successful, 4 is cancel, 5 is reject -->
                    <?php if ($order->status == 0) : ?>
                      <i class="text-yellow-500 fas fa-clock"></i>
                    <?php elseif ($order->status == 1) : ?>
                      <i class="text-blue-500 fas fa-check-circle"></i>
                    <?php elseif ($order->status == 2) : ?>
                      <i class="text-blue-600 fas fa-truck"></i>
                    <?php elseif ($order->status == 3) : ?>
                      <i class="text-green-500 fas fa-check"></i>
                    <?php elseif ($order->status == 4) : ?>
                      <i class="text-red-500 fas fa-times-circle"></i>
                    <?php elseif ($order->status == 5) : ?>
                      <i class="text-red-500 fas fa-times"></i>
                    <?php endif; ?>
                  </td>
                  <td class="px-5 py-3">
                    <!-- icon view -->
                    <a href="<?php echo BASE_URI . '/profile/orders?id=' . $order->id ?>" class="edit-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-blue-500 transition-all">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="">
                      <i class="text-blue-500 fas fa-eye"></i>
                    </a>
                  </td>
                  <td class="px-5 py-3">
                    <button class="delete-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-red-600 transition-all">
                      <i class="fa-solid fa-times"></i>
                    </button>
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