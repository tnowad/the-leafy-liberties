<div class="flex justify-center w-full bg-white">
  <div class="container">
    <div class="box-border flex flex-col w-full mt-10 border border-b-2 border-gray-300 md:flex-row">
      <?php include "menu.php"; ?>
      <!-- content -->
      <?php

      use App\Models\Order;

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
      endif;
      ?>
    </div>
  </div>
</div>