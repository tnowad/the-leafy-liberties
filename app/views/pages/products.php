<div class="flex justify-center my-10">
  <div class="container grid lg:grid-cols-[200px,auto] 2xl:grid-cols-[250px,auto]">
    <div class="box-border mx-2">

      <form>
        <h1 class="mb-2 text-2xl font-bold">Filter</h1>
        <div class="grid justify-around grid-cols-3 lg:block">

          <div class="w-full">
            <h1 class="mt-2 mb-2 text-xl font-bold">Deals</h1>
            <div>
              <input type="radio" name="deals" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Best value from shop
              </label>
              <br>
              <input type="radio" name="deals" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Member only
              </label>
            </div>
            <h1 class="mt-2 mb-2 text-xl font-bold">Your budget</h1>
            <div>
              <input type="radio" name="yourBudget" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Less than $25
              </label>
              <br>
              <input type="radio" name="yourBudget" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                $250-$350
              </label>
              <br>
              <input type="radio" name="yourBudget" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Greater than
              </label>
            </div>
            <h1 class="mt-2 mb-2 text-xl font-bold">Rating</h1>
            <div>
              <input type="radio" name="rating" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                1 Star
              </label>
              <br>
              <input type="radio" name="rating" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                2 Star
              </label>
              <br>
              <input type="radio" name="rating" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                3 Star
              </label>
              <br>
              <input type="radio" name="rating" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                4 Star
              </label>
              <br>
              <input type="radio" name="rating" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                5 Star
              </label>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="">
      <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
        <?php
        $productList = $params['products'];

        foreach ($productList as $product) {

          // echo $product->image_url;
        ?>

          <div class="flex flex-col items-center justify-center w-full p-1">
            <div class="object-cover w-56 h-full">
              <img src="<?php echo $product->image_url; ?>" alt="<?php echo $product->title ?>" class="w-full" />
            </div>
            <div class="flex flex-col items-center justify-center w-full p-1 text-lg font-medium ">
              <div class="text-center">
                <a class="text-2xl" href="" alt> <?php echo $product->title ?></a>
              </div>
              <div class="">
                <?php for ($i = 1; $i <= $product->star; $i++) : ?>
                  <i class="fa fa-star text-yellow-600" aria-hidden="true"></i>
                <?php endfor; ?>
              </div>
              <div class="text-sm product-author">Enrique Wallace</div>
              <div class="desc"><?php echo $product->description ?></div>
              <div class="flex justify-center p-0 font-semibold text-primary-900">
                <span><?php echo $product->price ?></span>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="my-5">
        <ul class="flex items-center justify-center gap-5 text-center pagination">
          <li class="pagination-items p-2 bg-gray-100 rounded-full text-[#52938d] font-semibold
                        hover:text-white hover:bg-[#2e524e] transition-all">
            <button>Previous</button>
          </li>
          <li class="pagination-items p-2 bg-green-800 text-white rounded-full w-10 h-10 font-semibold
                        hover:text-white hover:bg-[#2e524e] transition-all">
            <button>1</button>
          </li>
          <li class="pagination-items p-2 bg-gray-100 rounded-full w-10 h-10 text-[#52938d]
                        font-semibold hover:text-white hover:bg-[#2e524e] transition-all">
            <button>2</button>
          </li>
          <li class="pagination-items p-2 bg-gray-100 rounded-full w-10 h-10 text-[#52938d]
                        font-semibold hover:text-white hover:bg-[#2e524e] transition-all">
            <button>3</button>
          </li>
          <li class="pagination-items p-2 bg-gray-100 rounded-full w-10 h-10 text-[#52938d]
                        font-semibold hover:text-white hover:bg-[#2e524e] transition-all">

            <button>4</button>
          </li>
          <li class="pagination-items p-2 bg-gray-100 rounded-full text-[#52938d] font-semibold
                        hover:text-white hover:bg-[#2e524e] transition-all">
            <button>Next</button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>