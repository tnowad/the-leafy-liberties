<div class="flex justify-center my-10">
  <div class="container grid lg:grid-cols-[200px,auto] 2xl:grid-cols-[250px,auto]">
    <div class="min-h-[400px] box-border mx-2 ">
      <form class="fixed">
        <h1 class="mb-2 text-2xl font-bold">Filter</h1>
        <div class="grid justify-around grid-cols-3 lg:block">

          <div class="w-full">
            <h1 class="mt-2 mb-2 text-xl font-bold">Deals</h1>
            <div>
              <input type="radio" name="deals"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Best value from shop
              </label>
              <br>
              <input type="radio" name="deals"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Member only
              </label>
            </div>
            <h1 class="mt-2 mb-2 text-xl font-bold">Your budget</h1>
            <div>
              <input type="radio" name="yourBudget"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Less than $25
              </label>
              <br>
              <input type="radio" name="yourBudget"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                $250-$350
              </label>
              <br>
              <input type="radio" name="yourBudget"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Greater than
              </label>
            </div>
            <h1 class="mt-2 mb-2 text-xl font-bold">Rating</h1>
            <div>
              <input type="radio" id="star-1" name="rating" value="1"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="star-1" class="ml-2">
                1 Star
              </label>
              <br>
              <input type="radio" id="star-2" name="rating" value="2"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="star-2" class="ml-2">
                2 Star
              </label>
              <br>
              <input type="radio" id="star-3" name="rating" value="3"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="star-3" class="ml-2">
                3 Star
              </label>
              <br>
              <input type="radio" id="star-4" name="rating" value="4"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="star-4" class="ml-2">
                4 Star
              </label>
              <br>
              <input type="radio" id="star-5" name="rating" value="5"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="star-5" class="ml-2">
                5 Star
              </label>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="">
      <div id="product-list" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
        <?php
        use App\Models\Product;
        $productList = Product::all();
        // echo json_encode($productList);
        foreach ($productList as $product):
          ?>

          <div
            class="flex flex-col items-center justify-center w-full px-[22px] box-border pt-5 product-info group border-solid border hover:border-gray-500 transition-all hover:shadow-xl">
            <div class="object-cover h-full p-2 w-60">
              <img src="resources/images/products/<?php echo $product->image_url ?>" alt=""
                class="object-cover w-full h-full" />
            </div>
            <div
              class="flex flex-col items-start justify-center w-full p-1 text-lg font-medium transition-all bg-white product-body group-hover:-translate-y-16">
              <div class="product-name">
                <a href="/"><?php echo $product->title ?></a>
              </div>
              <div class=" product-rate">
                <?php for ($i = 1; $i <= $product->star; $i++): ?>
                  <i class="fa fa-star text-yellow-400" aria-hidden="true"></i>
                <?php endfor; ?>
              </div>
              <div class="text-sm product-author"><?php echo $product->author ?></div>
              <div class="p-0 font-semibold product-price text-primary-900">
                <?php echo $product->price ?>$
              </div>
              <div
                class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
                <p class="font-semibold select-option-text">Add to wishlist</p>
                <i
                  class="p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"></i>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="my-5">
        <ul class="flex items-center justify-center gap-5 text-center pagination">
          <li class="pagination-items p-2 bg-gray-100 rounded-full text-[#52938d] font-semibold
                        hover:text-white hover:bg-[#2e524e] transition-all">
            <button>Previous</button>
          </li>
          <?php

          ?>
          <li class="pagination-items p-2 bg-gray-100 rounded-full text-[#52938d] font-semibold
                        hover:text-white hover:bg-[#2e524e] transition-all">
            <button>Next</button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<script>
  $.ajax({
    url: 'app/controllers/frontend/ProductController.php',
    method: 'GET',
    success: function (data) {
      console.log(data);
    },
    error: function (xhr, status, error) {
      console.error(error);
    }
  });
</script>
