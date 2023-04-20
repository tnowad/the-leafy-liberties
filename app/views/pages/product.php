<div class="box-border p-5 pt-3 sm:p-12 md:p-25 md:pt-12 lg:p-36 lg:pt-20">
  <!-- // ? option  -->
  <div class="grid grid-cols-1 xl:grid-cols-2 gap-3">
    <div class="box-border flex justify-center p-5 border border-gray-400 border-solid lg:mr-5 rounded-3xl w-full h-[600px] ">
      <img class="h-full w=h-full object-contain" src="<?php echo BASE_URI .
                                                          "/" .
                                                          $product->image; ?>" alt="Book info" />
    </div>
    <div class="box-border w-auto h-auto p-4 mt-5 border border-gray-400 border-solid lg:p-10 lg:mt-0 rounded-3xl">
      <p class="p-1 mb-2 md:mb-6 text-[11px] sm:text-sm text-green-400 bg-gray-200 inline-block">
        IN STOCK
      </p>
      <br />
      <label class="text-2xl md:text-3xl lg:text-4xl">
        <?php echo $product->name; ?>
      </label>
      <br />
      <div class="author-tag my-3">
        <span class="">
          Author:
        </span>
        <span class="font-bold text-primary hover:underline cursor-pointer">
          <?php echo $author->name; ?>
        </span>
      </div>
      <div class="isbn-tag">
        <span>ISBN:</span>
        <span class="font-bold text-primary hover:underline cursor-pointer">
          <?php echo $product->isbn; ?>
        </span>
      </div>
      <div class="box-border border border-gray-400 border-solid border-x-0 py-3">
        <span class="text-2xl text-green-800 sm:text-3xl font-semibold">
          <?php echo $product->price; ?>$
        </span>

        <div class="flex w-full justify-around items-center mt-4">
          <div class="cursor-pointer flex justify-between items-center bg-gray-50 border border-gray-300 py-2 px-3 rounded-full text-lg gap-2 hover:bg-primary-500 hover:text-gray-700 transition-all group">
            <i class="fa-brands fa-opencart group-hover:text-white transition-all p-2 group-hover:bg-primary-400 rounded-full"></i>
            <a href="/cart" src="" alt="" class="font-medium text-sm sm:text-base md:text-lg">
              Add to cart
            </a>
          </div>
          <div class="cursor-pointer flex justify-between items-center bg-gray-50 border border-gray-300 py-2 px-3 rounded-full text-lg gap-2 hover:bg-primary-500 hover:text-gray-700 transition-all group">
            <i class="fa-regular fa-heart group-hover:text-white transition-all p-2 group-hover:bg-red-400 rounded-full"></i>
            <button type="submit" src="" alt="" class="text-sm sm:text-base md:text-lg font-medium add-to-wishlist" onclick="addToCart(<?php echo $product->id; ?>)">
              Add to wishlist
            </button>
          </div>
        </div>
      </div>
      <a href="<?php echo BASE_URI .
                  "/products" .
                  "?category=" .
                  $category->id; ?>">

        <p class="inline-block mt-5 text-gray-400">Category: </p>
        <p class="inline-block ml-1">

          <?php echo $category->name; ?>
        </p>
        <br />
        <p class="inline-block text-gray-400">Tags :</p>
        <p class="inline-block ml-1">
          Books, Fiction, Romance - Contemporary
        </p>
      </a>

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
      <li class="mb-5 mr-10 cursor-pointer" onclick="showDescription()">
        Description
      </li>
      <li class="mb-2 mr-5 sm:mr-10 sm:mb-5 cursor-pointer" onclick="showReveiw()">
        Review
      </li>
    </ul>
    <div class="box-border p-2 border border-gray-400 border-solid rounded-3xl sm:h-auto sm:py-10 sm:px-20" id="description">
      <p class="mt-3 text-lg sm:mt-8 text-center">
        <?php echo $product->description; ?>
      </p>
    </div>
    <div class="box-border p-2 border border-gray-400 border-solid rounded-3xl sm:h-auto sm:py-10 sm:px-20" id="review">
      <p class="mt-3 text-lg sm:mt-8 text-center">
        Sản phẩm chất cmn lượng
      </p>
    </div>
  </div>
</div>
<script>
  function addToCart(id) {
    alert(id);
  }

  function showDescription() {
    document.getElementById("description").style.display = "block"
    document.getElementById("review").style.display = "none"
  }

  function showReveiw() {
    console.log(1)
    document.getElementById("review").style.display = "block";
    document.getElementById("description").style.display = "none"
  }
</script>