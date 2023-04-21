<?php
$products = $params['products'];
?>
<div class="flex justify-center my-10">
  <div class="container grid lg:grid-cols-[200px,auto] 2xl:grid-cols-[250px,auto]">
    <div class="min-h-[400px] box-border mx-2 ">
      <div class="fixed">
        <h1 class="mb-2 text-2xl font-bold">Filter</h1>
        <div class="grid justify-around grid-cols-3 lg:block">
          <form class="w-full" method="" action="">
            <h1 class="mt-2 mb-2 text-xl font-bold">Your budget</h1>
            <div>
              <input type="radio" name="yourBudget" id="less-than-10"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="less-than-10" class="ml-2">
                Less than $10
              </label>
              <br>
              <input type="radio" name="yourBudget" id="11-to-30"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="11-to-30" class="ml-2">
                $11-$30
              </label>
              <br>
              <input type="radio" name="yourBudget" id="greater-than-30"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="greater-than-30" class="ml-2">
                Greater than $30
              </label>
            </div>
            <h1 class="mt-2 mb-2 text-xl font-bold">Filter prices by</h1>
            <div>
              <input type="radio" name="price-sort" id="high-to-low"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="high-to-low" class="ml-2">
                High to low
              </label>
              <br>
              <input type="radio" name="price-sort" id="low-to-high"
                class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="low-to-high" class="ml-2">
                Low to high
              </label>
            </div>
            <h1 class="mt-2 mb-2 text-xl font-bold">Price range</h1>
            <div class="flex items-center">
              <span class="ml-2 font-medium text-gray-700">$0</span>
              <input id="price-slider" class="w-full" type="range" min="0" max="100" step="1" value="0">
              <span class="ml-auto font-medium text-gray-700">$100</span>
            </div>
            <button onclick="resetOption(event)"
              class="py-2 px-5 bg-[#315854] font-semibold text-white rounded-lg my-5 hover:bg-[#6cada6] transition-all cursor-pointer">Reset</button>
            <input type="submit" value="Find" onclick="filterProducts(event)"
              class="py-2 px-5 bg-[#315854] font-semibold text-white rounded-lg my-5 hover:bg-[#6cada6] transition-all cursor-pointer" />
          </form>
        </div>
      </div>
    </div>
    <div id="products-content">
      <div id="product-list" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
        <?php foreach ($products as $product): ?>
          <div
            class="box-border flex flex-col items-center w-full pt-5 transition-all border border-solid product-info group hover:border-gray-500 hover:shadow-xl">
            <div class="object-cover h-[330px] overflow-hidden p-2 px-[22px] w-60">
              <a href="<?php echo BASE_URI . "/product" . "?id=" .
                $product->id; ?>">
                <img src="<?php echo BASE_URI . "/" . $product->image; ?>" alt="" class="object-cover w-full h-full" />
              </a>
            </div>
            <div
              class="flex flex-col items-start justify-center w-full box-border px-[20px] text-lg font-medium transition-all bg-white product-body group-hover:-translate-y-16">
              <div class="product-name">
                <a href="<?php echo BASE_URI .
                  "/product?id=" . $product->id; ?>">
                  <?php echo $product->name; ?>
                </a>
              </div>
              <div class="text-sm text-gray-500 product-author">
                <?php echo $product->author()->name ?>
              </div>
              <div class="p-0 font-semibold product-price text-primary-900">
                <?php echo $product->price ?>$
              </div>
              <div
                class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
                <p class="font-semibold select-option-text hover:color-red-400 ">Add to wishlist</p>
                <i class="p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"
                  onclick="addToWishList(`<?php echo $product->id; ?>`)"></i>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="my-5">
        <ul id="pagination" class="flex items-center justify-center gap-5 text-center pagination">
          <li
            class="pagination-items p-2 bg-gray-100 rounded-full text-[#52938d] font-semibold hover:text-white hover:bg-[#2e524e] transition-all">
            <button>Previous</button>
          </li>
          <?php ?>
          <li
            class="pagination-items p-2 bg-gray-100 rounded-full text-[#52938d] font-semibold hover:text-white hover:bg-[#2e524e] transition-all">
            <button>Next</button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script src="resources/js/pages/product.js">
</script>

<script src="resources/js/pages/search-p
roduct.js">
</script>