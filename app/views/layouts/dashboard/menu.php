<div
  class="flex flex-col w-16 hover:w-64 md:w-64 bg-white h-full text-[#315854] transition-all duration-300 border-none z-[999] sidebar hover:shadow-lg">
  <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow sticky top-0">
    <ul class="flex flex-col py-4 space-y-1">
      <li class="px-5 block">
        <a href="" class="flex items-center justify-center py-4">
          <img
            src="<?php echo ($_SERVER['REQUEST_URI'] == '/the-leafy-liberties/dashboard') ? 'resources/images/Logo.png' : '../resources/images/Logo.png' ?>"
            alt="" />
        </a>
      </li>
      <?php
      $menus = [
        [
          'title' => 'Dashboard',
          'link' => '/the-leafy-liberties/dashboard/',
          'icon' => 'fa-solid fa-bars'
        ],
        [
          'title' => 'Statistics',
          'link' => '/the-leafy-liberties/dashboard/statistics',
          'icon' => 'fa-solid fa-signal-bars'
        ],
        [
          'title' => 'Customer',
          'link' => '/the-leafy-liberties/dashboard/customer',
          'icon' => 'fa-solid fa-users'
        ],
        [
          'title' => 'Products',
          'link' => '/the-leafy-liberties/dashboard/product',
          'icon' => 'fa-solid fa-bag-shopping'
        ],
        [
          'title' => 'Comment',
          'link' => '/the-leafy-liberties/dashboard/comment',
          'icon' => 'fa-solid fa-message'
        ],
        [
          'title' => 'Slider',
          'link' => '/the-leafy-liberties/dashboard/slider',
          'icon' => 'fa-solid fa-ticket'
        ],
      ];
      ?>

      <?php foreach ($menus as $menu): ?>
      <li>
        <a href="<?php echo $menu['link'] ?>"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="<?php echo $menu['icon'] ?>"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate"><?php echo $menu['title'] ?> </span>
        </a>
      </li>
      <?php endforeach; ?>

      <!-- <li>
        <a href="/the-leafy-liberties/dashboard/"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-bars"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
        </a>

      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/statistics"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-signal-bars"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Statistics</span>
        </a>
      </li>
      <li>
        <a href="dashboard/
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-users"></i>

          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Customer</span>
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/product"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-bag-shopping"></i>

          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Products</span>
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/comment"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-message"></i>

          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Comment</span>
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/coupon"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-ticket"></i>

          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Coupon</span>
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/slider"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-sliders"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Slider</span>
        </a>
      </li> -->
    </ul>
  </div>
</div>
