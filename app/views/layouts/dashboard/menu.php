<?php
?>
<div
  class="menu-left flex flex-col w-16 hover:w-64 md:w-64 bg-white h-full text-[#315854] transition-all duration-300 border-none z-[999] hover:shadow-lg">
  <div class="flex flex-col justify-between flex-grow sticky top-0 z-[888]">
    <ul class="flex flex-col py-4 space-y-1 list">
      <li class="block px-5">
        <a href="<?php echo BASE_URI . '/dashboard' ?>" class="flex items-center justify-center py-4">
          <img src="<?php echo BASE_URI . '/resources/images/logo.png' ?>" alt="logo" />
        </a>
      </li>
      <li
        class="focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
        <a href="/the-leafy-liberties/dashboard/" class="relative flex flex-row items-center h-11">
          <span class="inline-flex items-center justify-center ml-4">
            <i class="fa-solid fa-bars"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Dashboard
          </span>
        </a>
      </li>
      <li
        class="focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
        <a href="/the-leafy-liberties/dashboard/statistics" class="relative flex flex-row items-center h-11">
          <span class="inline-flex items-center justify-center ml-4">
            <i class="fa-solid fa-signal-bars"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Statistics
          </span>
        </a>
      </li>
      <li
        class="focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
        <a href="/the-leafy-liberties/dashboard/customer" class="relative flex flex-row items-center h-11">
          <span class="inline-flex items-center justify-center ml-4">
            <i class="fa-solid fa-users"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Customer
          </span>
        </a>
      </li>
      <li
        class="focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
        <a href="/the-leafy-liberties/dashboard/product" class="relative flex flex-row items-center h-11">
          <span class="inline-flex items-center justify-center ml-4">
            <i class="fa-solid fa-bag-shopping"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Product
          </span>
        </a>
      </li>
      <li
        class="focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
        <a href="/the-leafy-liberties/dashboard/comment" class="relative flex flex-row items-center h-11">
          <span class="inline-flex items-center justify-center ml-4">
            <i class="fa-solid fa-message"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Comment
          </span>
        </a>
      </li>
      <li
        class="focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
        <a href="/the-leafy-liberties/dashboard/coupon" class="relative flex flex-row items-center h-11 ">
          <span class="inline-flex items-center justify-center ml-4">
            <i class="fa-solid fa-ticket"></i>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">
            Coupon
          </span>
        </a>
      </li>
      <li
        class="focus:outline-none hover:bg-[#315854] text-[#40736d] hover:text-white border-l-4 border-transparent hover:border-[#add1ce] pr-6 transition-all">
        <a href="/the-leafy-liberties/dashboard/slider" class="relative flex flex-row items-center h-11">
          <span class="inline-flex items-center justify-center ml-4">
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
  let btnAll = document.querySelectorAll('ul.list li:not(:first-child)');
  btnAll.forEach(element => {
    element.addEventListener('click', function () {
      btnAll.forEach(btn => btn.classList.remove('bg-[#315854]'));
      element.classList.add('bg-[#315854]');
    });
  })
</script>
