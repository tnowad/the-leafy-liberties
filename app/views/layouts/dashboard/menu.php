<div
  class="menu-left flex flex-col w-16 hover:w-64 md:w-64 bg-white h-full text-[#315854] transition-all duration-300 border-none z-[999] hover:shadow-lg">
  <div class="flex flex-col justify-between flex-grow sticky top-0 z-[888]">
    <ul class="flex flex-col py-4 space-y-1">
      <li class="px-5 block">
        <a href="" class="flex items-center justify-center py-4">
          <img
            src="<?php echo ($_SERVER['REQUEST_URI'] == '/the-leafy-liberties/dashboard') ? 'resources/images/Logo.png' : '../resources/images/Logo.png' ?>"
            alt="" />
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-bars"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Dashboard
          </span>
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/statistics"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-signal-bars"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Statistics
          </span>
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/customer"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-users"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Customer
          </span>
        </a>
      </li>
      <li>
        <div
          class="product-menu cursor-pointer relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <input type="checkbox" name="" id="" class="absolute peer top-0 inset-x-0 h-11 opacity-0">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-bag-shopping"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Products
          </span>
          <i
            class="icon-down fa-solid fa-chevron-down rotate-0 peer-checked:rotate-180 peer-check transition-all duration-300"></i>
        </div>
        <div id="sub-menu"
          class="z-10 hidden bg-gray-100 divide-y divide-gray-100 w-full rounded-l-lg transition-all cursor-pointer">
          <ul class="block py-2 px-6 text-sm text-gray-700 divide-y">
            <li
              class="text-[#40736d] p-2 h-11 hover:bg-[#315854] hover:text-white transition-all border-l-4 border-transparent hover:border-[#add1ce] flex flex-row justify-start items-center">
              <i class="fa-solid fa-at mr-1"></i>
              <a href="#">Author</a>
            </li>
            <li
              class="text-[#40736d] p-2 h-11 hover:bg-[#315854] hover:text-white transition-all border-l-4 border-transparent hover:border-[#add1ce] flex flex-row justify-start items-center">
              <i class="fa-solid fa-sitemap mr-1"></i>
              <a href="#">Publisher</a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/comment"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-message"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Comment
          </span>
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/coupon"
          class="relative flex flex-row  items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-ticket"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Coupon
          </span>
        </a>
      </li>
      <li>
        <a href="/the-leafy-liberties/dashboard/slider"
          class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
          <span class="inline-flex justify-center items-center ml-4">
            <i class="fa-solid fa-sliders"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Slider
          </span>
        </a>
      </li>
    </ul>
  </div>
</div>
<script>
  let dropmenu = document.querySelector('.product-menu');
  let icon_down = document.querySelector('.icon-down');
  let sub_menu = document.getElementById('sub-menu');

  dropmenu.addEventListener("click", () => {
    if (sub_menu.classList.contains('hidden')) {
      sub_menu.classList.remove('hidden');
      sub_menu.classList.add('block');
    } else {
      sub_menu.classList.remove('block');
      sub_menu.classList.add('hidden');

    }
  });
</script>
