<?php
dd($params['product']);
?>

<div class="box-border p-5 pt-3 sm:pt-10 sm:p-12 md:p-25 md:pt-12 lg:p-36 lg:pt-20">
  <!-- // ? option  -->
  <div class="grid grid-cols-1 xl:grid-cols-2">
    <div class="box-border flex justify-center p-5 border border-gray-400 border-solid lg:mr-5 rounded-3xl ">
      <img class="h-full" src="./views/assets/img/info_book_detail.png" alt="Book info" />
    </div>
    <div class="box-border w-auto h-auto p-4 mt-5 border border-gray-400 border-solid lg:p-10 lg:mt-0 rounded-3xl">
      <p class="p-1 mb-2 md:mb-6 text-[11px] sm:text-sm text-green-400 bg-gray-200 inline-block">
        IN STOCK
      </p>
      <br />
      <label class="text-2xl md:text-3xl lg:text-4xl">
        DIRE WOLF STAKES
      </label>
      <br />
      <p class="mt-4 sm:mt-8 md:mt-10 mr-1 inline-block text-[10px] sm:text-xs">
        Author :
      </p>
      <p class="inline-block text-[10px] sm:text-xs"> JESSICA MUNOZ</p>
      <span class="inline-block ml-5">
        <img class="inline-block w-12 sm:w-20" src={star} alt="" />
      </span>
      <p class="ml-5 mr-1 inline-block text-[10px] sm:text-xs text-gray-400">
        BKU :
      </p>
      <p class="inline-block mb-4 text-xs sm:mb-10">65377017</p>
      <div class="box-border border border-gray-400 border-solid border-x-0">
        <span class="text-2xl text-green-800 sm:text-3xl">
          150.000 VNĐ
        </span>
        <p class="mt-4 text-xs sm:mt-8">
          Aliquid nesciunt molestiae totam. Nostrum quidem officia dolores
          quo ut. Autem conse quatur molestiae quos tempore sunt.
        </p>
        <div class="flex flex-wrap justify-around mt-8 mb-6 sm:mt-28 sm:mb-10 sm:flex-row">
          <div
            class="box-border flex justify-around w-2/5 p-2 border border-gray-400 border-solid  sm:w-3/12 rounded-3xl">
            <button>-</button>
            <span>1</span>
            <button>+</button>
          </div>
          <button class="order-last w-3/4">
            <i class="fa-brands fa-opencart"></i>

            Add to cart
          </button>
          <div
            class="box-border flex justify-around w-2/4 p-2 border border-gray-400 border-solid sm:w-3/12 rounded-3xl">
            <i class="fa-regular fa-heart"></i>

            <a href="/wishlist" src="" alt="" class="pt-1 text-xs">
              Add to wishlist
            </a>
          </div>
        </div>
      </div>
      <p class="inline-block mt-5 text-gray-400">Categories : </p>
      <p class="inline-block ml-1">Genre Fiction</p>
      <br />
      <p class="inline-block text-gray-400">Tags :</p>
      <p class="inline-block ml-1">
        Books, Fiction, Romance - Contemporary
      </p>
      <div class="flex justify-around w-1/5 mt-10">
        <i class="text-2xl transition-all cursor-pointer fa-brands fa-facebook-f hover:text-blue-500"></i>
        <i class="text-2xl transition-all cursor-pointer fa-brands fa-twitter hover:text-blue-600"></i>
        <i class="text-2xl transition-all cursor-pointer fa-brands fa-instagram hover:text-pink-500"></i>
      </div>
    </div>
  </div>
  <!-- //? info detail  -->
  <div class="mt-20">
    <ul class="box-content flex justify-center">
      <li class="mb-5 mr-10">
        <a href="/book_detail" src="" alt="" class="text-base sm:text-2xl">
          Description
        </a>
      </li>
      <li class="mb-5 mr-10">
        <a href="/book_detail" src="" alt="" class="text-base sm:text-2xl">
          Review
        </a>
      </li>
      <li class="mb-2 mr-5 sm:mr-10 sm:mb-5">
        <a href="/book_detail" src="" alt="" class="text-base sm:text-2xl">
          Vendor
        </a>
      </li>
    </ul>
    <div class="box-border p-2 border border-gray-400 border-solid rounded-3xl sm:h-auto sm:py-10 sm:px-20">
      <p>
        Ut earum iure dolor tenetur. Et sit et est deserunt. Cumque
        voluptatum recusandae molestiae recusandae velit. Eaque quam
        repellat omnis.
        <br />
        <br />
        Nulla excepturi iure nobis rerum. Voluptatum aut doloribus quos amet
        ipsa voluptatibus eius aperiam. Occaecati reiciendis dicta adipisci
        eum aut velit.
        <br />
        <br />
        Consequuntur occaecati in maxime ab numquam voluptatem. Quo cumque
        harum quam dolorem. Suscipit quos ratione et nemo dolore. Et
        voluptatem molestiae sit vel. Libero qui rerum cum quo nesciunt et
        dolorem.
      </p>
    </div>
  </div>
</div>
