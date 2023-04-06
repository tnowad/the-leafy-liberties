<?php
?>
<header class="flex justify-center bg-white z-10 sticky top-0 border-0 border-solid border-gray-200 border-b-[1px]">
  <div class="container flex items-center justify-between h-24 mt-5">
    <a class="w-48" href="<?php echo BASE_URI ?>">
      <img src="<?php echo BASE_URI . '/resources/images/logo.png' ?>" alt="HeaderLogo" />
    </a>
    <div class="hidden sm:block w-full max-w-[140px]">
      <button class="bg-[#315854] px-3 py-2 rounded-xl text-white font-semibold hover:bg-[#52938d] transition-all">
        <i class="mr-1 fa-solid fa-bars"></i>
        Categories
      </button>
      <!-- show options -->
      <div
        class="absolute w-48 -translate-x-[20%] origin-top-left bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none mt-7 ">
        <div class="px-1 py-1 ">
          <!-- Get all category from database and show -->
          <?php
          $categories = [
            [
              'id' => 1,
              'name' => 'Category 1'
            ],
            [
              'id' => 2,
              'name' => 'Category 2'
            ]
          ];
          // $categories = Category::all();
          foreach ($categories as $category): ?>
            <a href="<?php

            ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
              <?php echo $category['name'] ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="box-border w-full px-10">
      <form onSubmit="" class="flex items-center justify-center w-full h-10 bg-gray-100 rounded-full">
        <input type="text" name="searchQuery" class="w-full h-full pl-5 bg-transparent rounded-tl-full rounded-bl-full"
          placeholder="Search.... " />
        <button class="flex items-center justify-center w-10 h-10">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
    <!-- list button -->
    <div class="flex-row justify-between hidden gap-2 md:flex">
      <button type="button"
        class="border-[1px] border-solid px-3 py-2 rounded-xl hover:bg-[#6cada6] transition-all hover:text-white w-10 ">
        <i class="fa-regular fa-user"></i>
      </button>
      <div
        class="absolute w-48 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none mt-11 ">
        <div class="px-1 py-1 ">
          <?php if (isset($_SESSION['user'])): ?>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Your
              Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Sign out</a>
          <?php else: ?>
            <a href="/the-leafy-liberties/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Sign
              in</a>
            <a href="/the-leafy-liberties/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Sign
              up</a>
          <?php endif; ?>
        </div>
      </div>
      <button type="button"
        class="border-[1px] border-solid px-3 py-2 rounded-xl hover:bg-[#6cada6] transition-all hover:text-white w-10">
        <i class="fa-regular fa-heart"></i>
      </button>
      <button type="button"
        class="border-[1px] border-solid px-2 py-2 rounded-xl hover:bg-[#6cada6] transition-all hover:text-white w-10">
        <i class="fa-brands fa-opencart"></i>
      </button>
    </div>
  </div>
</header>
