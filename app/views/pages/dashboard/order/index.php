<?php
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Pagination;

?>

<div class="w-full mx-auto my-0">
  <div class="box-border w-full min-h-screen px-10 mt-10 sm:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Order</h1>
      <div class="box-border w-1/2 px-10">
        <form class="flex items-center justify-center w-full h-10 bg-white rounded-full input"
          action="<?php BASE_URI . "/dashboard/product"; ?>" method="POST">
          <input type="text" name="searchQuery"
            class="w-full h-full pl-5 bg-transparent rounded-tl-full rounded-bl-full" placeholder="Search.... " />
          <button class="flex items-center justify-center w-10 h-10">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
    </div>
    <?php if (count(Order::all()) == 0): ?>
      <div class="flex flex-col justify-center items-center h-[70vh]">
        <i class="fa-solid fa-cart-circle-plus text-5xl text-gray-400 mb-4"></i>
        <h1 class="text-5xl font-medium tracking-widest uppercase text-gray-400">Don't have any orders yet</h1>
      </div>
    <?php else: ?>
      <div class="my-8 bg-white shadow-lg cursor-pointer table-product-statistics rounded-2xl">
        <div class="relative">
          <table class="w-full overflow-y-scroll text-sm text-center text-gray-500 rounded-2xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <?php
                $name = [
                  "Order ID",
                  "Customer Name",
                  "Date",
                  "Status",
                  "Amount",
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
              $orders = Order::all();
              foreach ($orders as $order):
                ?>
                <tr class="transition-opacity bg-white border-b hover:bg-gray-200 even:bg-gray-100">
                  <td class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <?php echo $order->id ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $order->name ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php echo $order->create_at ?>
                  </td>
                  <td class="px-5 py-3 font-medium <?php echo ($order->status == 0) ? 'text-red-900' : 'text-primary' ?>">
                    <?php
                    if ($order->status == 0) {
                      echo "Pending";
                    } else if ($order->status == 1) {
                      echo "Accept";
                    } else if ($order->status == 2) {
                      echo "Shipping";
                    } else if ($order->status == 3) {
                      echo "Delivered";
                    } else if ($order->status == 4) {
                      echo "Cancel";
                    } else {
                      echo "Reject";
                    }
                    ?>
                  </td>
                  <td class="px-5 py-3">
                    <?php
                    echo count($order->products());
                    ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>
