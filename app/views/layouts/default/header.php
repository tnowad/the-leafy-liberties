<?php
?>
<header class="flex justify-center bg-white z-10 sticky top-0 border-0 border-solid border-gray-200 border-b-[1px]">
  <div class="container flex items-center justify-between h-24 mt-5">
    <a class="w-48" href="<?php echo BASE_URI ?>">
      <img src="<?php echo BASE_URI . '/resources/images/logo.png' ?>" alt="HeaderLogo" />
    </a>
    <div class="hidden sm:flex w-full max-w-[140px] group h-full mx-auto justify-center items-center">
      <button class="bg-[#315854] px-3 py-2 rounded-xl text-white font-semibold hover:bg-[#52938d] transition-all">
        <i class="mr-1 fa-solid fa-bars"></i>
        Categories
      </button>
      <!-- show options -->
      <div
        class="opacity-0 hidden absolute w-52 top-24 translate-y-10 transition-all bg-white border border-gray-200 rounded-md shadow-lg outline-none mt-7 group-hover:block group-hover:top-20 group-hover:opacity-100 group-hover:translate-y-0">
        <div class="px-1 py-1">
          <!-- Get all category from database and show -->
          <?php
          // use Core\Database;
          $connect = mysqli_connect('localhost', 'root', '', 'bookstore');
          $query = "SELECT name from categories";
          $result = mysqli_query($connect, $query);
          while ($row = $result->fetch_assoc()) { ?>
          <span class="text-gray-700 group/category hover:bg-gray-300 hover:text-[#315854] px-4 py-2 transition-all block cursor-pointer">
            <a href="<?php

            ?>" class="block text-md translate-x-0 transition-all group-hover/category:translate-x-3">
                <?php echo $row['name'] ?>
            </a>
            </span>
          <?php }
          ?>
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
    <div class="flex-row justify-between hidden gap-2 md:flex relative">
      <button type="button"
        class="border-[1px] border-solid px-3 py-2 rounded-xl hover:bg-[#315854] transition-all hover:text-white w-10"
        data-dropdown-toggle="dropdownHover" data-dropdown-trigger="click" id="dropdownHoverButton">
        <i class="fa-regular fa-user"></i>
      </button>
      <div
        class="hidden absolute w-24 right-16 bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none mt-11 transition-all"
        id="dropdownHover">
        <div class="px-1 py-1 " aria-labelledby="dropdownHoverButton">
          <?php if (isset($_SESSION['user'])): ?>
            <a href="#"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#315854] hover:text-white transition-all">Your
              Profile</a>
            <a href="#"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#315854] hover:text-white transition-all">Settings</a>
            <a href="#"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#315854] hover:text-white transition-all">Sign
              out</a>
          <?php else: ?>
            <a href="/the-leafy-liberties/login"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#315854] hover:text-white transition-all text-center">Sign
              in</a>
            <a href="/the-leafy-liberties/register"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#315854] hover:text-white transition-all text-center">Sign
              up</a>
          <?php endif; ?>
        </div>
      </div>
      <button type="button"
        class="border-[1px] border-solid px-3 py-2 rounded-xl hover:bg-[#315854] transition-all hover:text-white w-10">
        <i class="fa-regular fa-heart"></i>
      </button>
      <button type="button"
        class="border-[1px] border-solid px-2 py-2 rounded-xl hover:bg-[#315854] transition-all hover:text-white w-10">
        <i class="fa-brands fa-opencart"></i>
      </button>
    </div>
  </div>
</header>
