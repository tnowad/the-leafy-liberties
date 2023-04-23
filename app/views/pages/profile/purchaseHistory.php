<?php $user = $params["user"]; ?>
<div class="flex justify-center w-full bg-white">
  <div class="container">
    <div class="box-border flex flex-col w-full mt-10 border border-b-2 border-gray-300 md:flex-row">
      <?php include "menu.php"; ?>
      <!-- content -->
      <?php

      use App\Models\Order;

      if (count(Order::all()) == 0) : ?>
        <div class="flex flex-col justify-center items-center h-[70vh]">
          <i class="fa-solid fa-cart-circle-plus text-5xl text-gray-400 mb-4"></i>
          <h1 class="text-5xl font-medium tracking-widest uppercase text-gray-400">Don't have any purchase history yet</h1>
        </div>
      <?php else : ?>
      <?php endif ?>
    </div>
  </div>
</div>