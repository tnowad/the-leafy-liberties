<header class="flex justify-center bg-white z-10 sticky top-0 border-0 border-solid border-gray-200 border-b-[1px]">
  <div class="mt-5 h-24 container flex justify-between items-center">
    <a class="w-48" href="/">
      <img src="../../../resources/images/Logo.png" alt="HeaderLogo" />
    </a>
    <div class="hidden sm:block w-full max-w-[140px]">
      <button class="bg-[#315854] px-3 py-2 rounded-xl text-white font-semibold hover:bg-[#52938d] transition-all">
        <i class="fa-solid fa-bars mr-1"></i>
        Categories
      </button>
    </div>
    <div class="w-full box-border px-10">
      <form onSubmit="" class="flex items-center justify-center w-full h-10 bg-gray-100 rounded-full">
        <input type="text" name="searchQuery" class="pl-5 w-full h-full bg-transparent rounded-tl-full rounded-bl-full"
          placeholder="Search.... " />
        <button class="flex items-center justify-center w-10 h-10">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
    <div class="flex-row justify-between hidden md:flex gap-2">
      <button type="button"
        class="border-[1px] border-solid px-3 py-2 rounded-xl hover:bg-[#6cada6] transition-all hover:text-white w-10">
        <i class="fa-regular fa-user"></i>
      </button>
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
