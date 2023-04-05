<!-- <div class="lg:w-64 w-[75px] bg-white shadow-md">
  <div class="sticky top-0 lg:block">
    <a href="" class="flex items-center justify-center py-4">
      <img src="../../../../resources/images/Logo.png" alt="" />
    </a>
    <div class="flex flex-col justify-center px-5">
      <?php
      $name = array("Dashboard", "Statistics", "Customer", "Products", "Messages", "Coupon", "Slider");
      $icon = array("fa-solid fa-bars ", "fa-solid fa-signal-bars", "fa-solid fa-users", "fa-solid fa-bag-shopping", "fa-solid fa-message", "fa-solid fa-ticket", "fa-solid fa-sliders");
      $total = 7;
      for ($i = 1; $i <= $total; $i++) { ?>
        <span
          class='h-12 flex items-center transition-colors hover:bg-[#315854] hover:text-white cursor-pointer my-[2px] rounded-md box-border px-4  <?php echo ($i == 1) ? 'bg-[#315854] text-white' : '' ?>' >
          <i class="<?php echo $icon[$i - 1] ?>"></i>
          <a href="" class="ml-2 w-full h-full lg:flex items-center font-semibold hidden">
            <?php echo $name[$i - 1] ?>
          </a>
        </span>
      <?php }
      ?>
    </div>
  </div>
</div> -->
<div
  class="flex flex-col w-16 hover:w-64 md:w-64 bg-white h-full text-[#315854] transition-all duration-300 border-none z-[999] sidebar">
  <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow sticky top-0">
    <ul class="flex flex-col py-4 space-y-1">
      <li class="px-5 block">
        <a href="" class="flex items-center justify-center py-4">
          <img src="../../../../resources/images/Logo.png" alt="" />
        </a>
      </li>
      <li>
        <a href="#"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
          <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
              </path>
            </svg>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
          <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
              </path>
            </svg>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Board</span>
        </a>
      </li>
      <li>
        <a href="#"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
          <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
            </svg>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Messages</span>
        </a>
      </li>
      <li>
        <a href="#"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
          <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
              </path>
            </svg>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
        </a>
      </li>
    </ul>
    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
  </div>
</div>
