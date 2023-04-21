<div class="box-border p-5 pt-3 sm:p-12 md:p-25 md:pt-12 lg:p-36 lg:pt-20">
  <!-- // ? option  -->
  <div class="grid grid-cols-1 xl:grid-cols-2 gap-3">
    <div
      class="box-border flex justify-center p-5 border border-gray-400 border-solid lg:mr-5 rounded-3xl w-full h-[600px] ">
      <img class="h-full w=h-full object-contain" src="<?php echo BASE_URI .
        "/" .
        $product->image; ?>" alt="Book info" />
    </div>
    <div class="box-border w-auto h-auto p-4 mt-5 border border-gray-400 border-solid lg:p-10 lg:mt-0 rounded-3xl">
      <p class="p-1 mb-2 md:mb-6 text-[11px] sm:text-sm text-primary-700 font-medium inline-block">
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

        <div class="flex w-full justify-start gap-3  items-center mt-4">
          <div
            class="cursor-pointer flex justify-between items-center bg-gray-50 border border-gray-300 py-2 px-3 rounded-full text-lg gap-2 hover:bg-primary-500 hover:text-gray-700 transition-all group"
            onclick="addToCart(<?php echo $product->id; ?>)">
            <i
              class="fa-brands fa-opencart group-hover:text-white transition-all p-2 group-hover:bg-primary-400 rounded-full"></i>
            <button src="" alt="" class="font-medium text-sm sm:text-base md:text-lg">
              Add to cart
            </button>
          </div>
          <div
            class="cursor-pointer flex justify-between items-center bg-gray-50 border border-gray-300 py-2 px-3 rounded-full text-lg gap-2 hover:bg-primary-500 hover:text-gray-700 transition-all group"
            onclick="addToWishList(<?php echo $product->id; ?>)">
            <i
              class="fa-regular fa-heart group-hover:text-white transition-all p-2 group-hover:bg-red-400 rounded-full"></i>
            <button type="submit" src="" alt="" class="text-sm sm:text-base md:text-lg font-medium add-to-wishlist">
              Add to wishlist
            </button>
          </div>
        </div>
      </div>

      <p class="inline-block mt-5 text-gray-400">Category: </p>
      <a href="<?php echo BASE_URI .
        "/products" .
        "?category=" .
        $category->id; ?>" class="hover:underline font-medium text-primary">

        <?php echo $category->name; ?>
      </a>
      <br />
      <p class="inline-block text-gray-400">Tags :</p>
      <p class="inline-block ml-1">
        <?php
        $tags = $product->tags();
        $count = count($tags);
        foreach ($tags as $i => $tag) { ?>
          <a href="<?php echo BASE_URI . '/' ?>" class="hover:underline font-medium text-primary">
            <?php echo $tag->name ?>
          </a>
          <?php
          if ($i != $count - 1) {
            echo ', ';
          }
        }
        ?>
      </p>

      <div class="flex justify-start mt-10 items-center gap-4">
        <i
          class="text-2xl transition-all cursor-pointer fa-brands fa-facebook-f hover:text-white hover:bg-blue-500 p-2 border border-gray-300 rounded-full w-12 h-12 text-center"></i>
        <i
          class="text-2xl transition-all cursor-pointer fa-brands fa-twitter hover:text-white hover:bg-blue-500 p-2 border border-gray-300 rounded-full w-12 h-12 text-center"></i>
        <i
          class="text-2xl transition-all cursor-pointer fa-brands fa-instagram hover:text-white hover:bg-pink-500 p-2 border border-gray-300 rounded-full w-12 h-12 text-center"></i>
      </div>
    </div>
  </div>
  <!-- //? info detail  -->
  <div class="mt-20">
    <ul class="box-content flex justify-center">
      <li class="p-2 rounded mb-5 mr-10 cursor-pointer hover:bg-primary hover:text-white transition-all"
        onclick="showDescription()">
        Description
      </li>
      <li class="p-2 rounded mb-2 mr-5 sm:mr-10 sm:mb-5 cursor-pointer hover:bg-primary hover:text-white transition-all"
        onclick="showReveiw()">
        Review
      </li>
    </ul>
    <div class="box-border p-2 border border-gray-400 border-solid rounded-3xl sm:h-auto sm:py-10 sm:px-20"
      id="description">
      <p class="mt-3 text-lg sm:mt-8 text-center">
        <?php echo $product->description; ?>
      </p>
    </div>
    <div class="box-border p-2 border border-gray-400 border-solid rounded-3xl sm:h-auto sm:py-10 sm:px-20 hidden"
      id="review">
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
<script type="module">
  import Toast from '<?php echo BASE_URI . "/resources/js/toast.js"; ?>';
  import FetchXHR from '<?php echo BASE_URI . "/resources/js/fetch-xhr.js"; ?>';

  document.addToWishList = (id) => {
    FetchXHR.post('<?php echo BASE_URI . '/api/wishlist/add' ?>', { id }, {
      'Content-Type': 'application/json'
    }).then(response => {
      const data = response.data;
      new Toast({
        message: data.message,
        type: data.type
      });
    }).catch(error => {
      console.error(error);
    });
  };
</script>
