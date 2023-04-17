<?php
$product = $params['product'];
$author = $params['author'];
?>

<div class="box-border p-5 pt-3 sm:pt-10 sm:p-12 md:p-25 md:pt-12 lg:p-36 lg:pt-20">
  <!-- // ? option  -->
  <div class="grid grid-cols-1 xl:grid-cols-2 gap-3">
    <div class="box-border flex justify-center p-5 border border-gray-400 border-solid lg:mr-5 rounded-3xl w-full h-[600px] ">
      <img class="h-full w=h-full object-contain" src="<?php echo BASE_URI . $product->image ?>" alt="Book info" />
    </div>
    <div class="box-border w-auto h-auto p-4 mt-5 border border-gray-400 border-solid lg:p-10 lg:mt-0 rounded-3xl">
      <p class="p-1 mb-2 md:mb-6 text-[11px] sm:text-sm text-green-400 bg-gray-200 inline-block">
        IN STOCK
      </p>
      <br />
      <label class="text-2xl md:text-3xl lg:text-4xl">
        <?php echo $product->name ?>
      </label>
      <br />
      <div class="author-tag my-3">
        <span class="">
          Author:
        </span>
        <span class="">
          <?php echo $author->name ?>
        </span>
      </div>
      <div class="isbn-tag">
        <span>ISBN:</span>
        <span class="font-bold text-primary hover:underline cursor-pointer">
          <?php echo $product->isbn ?>
        </span>
      </div>
      <div class="box-border border border-gray-400 border-solid border-x-0 py-3">
        <span class="text-2xl text-green-800 sm:text-3xl font-semibold">
          <?php echo $product->price ?>$
        </span>
        <p class="mt-3 text-lg sm:mt-8">
          <?php echo $product->description ?>
        </p>
        <div class="flex w-1/2 justify-between items-center mt-4">
          <div
            class="flex justify-between items-center bg-gray-50 border border-gray-300 py-2 px-3 rounded-full text-lg gap-2 hover:bg-primary-500 hover:text-gray-700 transition-all group">
            <i
              class="fa-brands fa-opencart group-hover:text-white transition-all p-2 group-hover:bg-primary-400 rounded-full"></i>
            <a href="/wishlist" src="" alt="" class="font-medium">
              Add to cart
            </a>
          </div>
          <div
            class="flex justify-between items-center bg-gray-50 border border-gray-300 py-2 px-3 rounded-full text-lg gap-2 hover:bg-primary-500 hover:text-gray-700 transition-all group">
            <i
              class="fa-regular fa-heart group-hover:text-white transition-all p-2 group-hover:bg-red-400 rounded-full"></i>
            <a href="/wishlist" src="" alt="" class="font-medium">
              Add to wishlist
            </a>
          </div>
        </div>
      </div>
      <p class="inline-block mt-5 text-gray-400">Categories: </p>
      <p class="inline-block ml-1">Genre Fiction</p>
      <br />
      <p class="inline-block text-gray-400">Tags :</p>
      <p class="inline-block ml-1">
        Books, Fiction, Romance - Contemporary
      </p>
      <div class="flex justify-start mt-10 items-center gap-4">
        <i class="text-2xl transition-all cursor-pointer fa-brands fa-facebook-f hover:text-white hover:bg-blue-500 p-2 border border-gray-300 rounded-full w-12 h-12 text-center"></i>
        <i class="text-2xl transition-all cursor-pointer fa-brands fa-twitter hover:text-white hover:bg-blue-500 p-2 border border-gray-300 rounded-full w-12 h-12 text-center"></i>
        <i class="text-2xl transition-all cursor-pointer fa-brands fa-instagram hover:text-white hover:bg-pink-500 p-2 border border-gray-300 rounded-full w-12 h-12 text-center"></i>
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
        Consequuntur occaecati in maxime ab numquam voluptatem. Quo cumque
        harum quam dolorem. Suscipit quos ratione et nemo dolore. Et
        voluptatem molestiae sit vel. Libero qui rerum cum quo nesciunt et
        dolorem.
      </p>
    </div>
  </div>
</div>
