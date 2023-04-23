<div class="flex justify-center w-full bg-white">
  <div class="container">
    <div class="box-border flex flex-col w-full mt-10 border border-b-2 border-gray-300 md:flex-row">
      <?php include "menu.php"; ?>
      <!-- content -->
      <?php

      use App\Models\Order;
      use App\Models\OrderProduct;

      $hasOrder = false;
      foreach (Order::all() as $order) :
        if ($order->status == 1) :
          $hasOrder = true;
        endif;
      endforeach;
      if (!$hasOrder) :
        echo '<div class="flex flex-col justify-center items-center h-[70vh]">';
        echo '<i class="fa-solid fa-cart-circle-plus text-5xl text-gray-400 mb-4"></i>';
        echo '<h1 class="text-5xl font-medium tracking-widest uppercase text-gray-400">Don\'t have any purchase history yet</h1>';
        echo '</div>';
      else :
      ?>
        <div class="my-5 overflow-hidden bg-white shadow-lg cursor-pointer table-statistics rounded-2xl w-full mx-4">
          <div class="relative w-full">
            <?php if (count(Order::all()) == 0) : ?>
              <div class="flex flex-col justify-center items-center h-[70vh]">
                <i class="fa-solid fa-cart-circle-plus text-5xl text-gray-400 mb-4"></i>
                <h1 class="text-5xl font-medium tracking-widest uppercase text-gray-400">Don't have any orders yet</h1>
              </div>
            <?php else : ?>
              <table class="w-full overflow-y-scroll text-sm text-center text-gray-500 rounded-2xl" width="100%">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                  <tr>
                    <?php
                    $tableName = [
                      "Name",
                      "Email",
                      "Order",
                      "Total price",
                      "Date",
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
                  <?php foreach ($orders as $order) :
                    if ($order->status == 1) :
                  ?>
                      <tr class="px-5 py-3">
                        <td class="px-5 py-3">
                          <?php echo $order->name; ?>
                        </td>
                        <td class="px-5 py-3">
                          <?php echo $order->email; ?>
                        </td>
                        <td class="px-5 py-3" width="50%">
                          <ul>
                            <?php foreach (array_slice(OrderProduct::findAll(['order_id' => $order->id]), 0, 3) as $orderProduct) : ?>
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
                          <?php echo date('d/m/Y H:i:s', strtotime($orderProduct->order()->create_at)); ?>
                        </td>
                        <td>
                          <a href="<?php echo BASE_URI .
                                      "/profile/orders/order_detail" .
                                      "?id=" .
                                      $order->id; ?>" class="edit-button py-2 px-3 rounded-md">
                            <i class="fa-solid fa-circle-info text-black text-xl hover:text-orange-600 transition-colors"></i>
                          </a>
                        </td>
                      </tr>
                  <?php
                    endif;
                  endforeach; ?>
                </tbody>
              </table>
            <?php endif ?>
          </div>
        </div>
      <?php
      endif;
      ?>
    </div>
  </div>
</div>