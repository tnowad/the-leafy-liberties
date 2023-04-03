<div class="lg:w-64 bg-white shadow-md">
  <div class="sticky top-0 lg:block">
    <a href="" class="flex items-center justify-center py-4">
      <img src="../../../../resources/images/Logo.png" alt="" />
    </a>
    <div class="flex flex-col justify-center px-5">
      <?php
      $name = array("Dashboard", "Statistics", "Customer", "Products", "Messages", "Coupon","Slider");
      $icon = array("fa-solid fa-bars ", "fa-solid fa-signal-bars", "fa-solid fa-users", "fa-solid fa-bag-shopping", "fa-solid fa-message", "fa-solid fa-ticket","fa-solid fa-sliders");
      $total = 7;
      for ($i = 1; $i <= $total; $i++) { ?>
        <span
          class='h-12 flex items-center transition-colors hover:bg-[#315854] hover:text-white cursor-pointer my-[2px] rounded-md box-border px-4  <?php echo ($i == 1) ? 'bg-[#315854] text-white' : '' ?>' >
          <i class="<?php echo $icon[$i - 1] ?>"></i>
          <a href="" class="ml-2 w-full h-full flex items-center font-semibold">
            <?php echo $name[$i - 1] ?>
          </a>
        </span>
      <?php }
      ?>
    </div>
  </div>
</div>
