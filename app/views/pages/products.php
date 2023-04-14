<div class="flex justify-center my-10">
  <div class="container grid lg:grid-cols-[200px,auto] 2xl:grid-cols-[250px,auto]">
    <div class="min-h-[400px] box-border mx-2 ">
      <div class="fixed">
        <h1 class="mb-2 text-2xl font-bold">Filter</h1>
        <div class="grid justify-around grid-cols-3 lg:block">
          <form class="w-full" method="POST" action="">
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
                Less than $10
              </label>
              <br>
              <input type="radio" name="yourBudget" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                $11-$30
              </label>
              <br>
              <input type="radio" name="yourBudget" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label htmlFor="" class="ml-2">
                Greater than $30
              </label>
            </div>
            <input type="submit" value="Find" class="py-2 px-5 bg-[#315854] font-semibold text-white rounded-lg my-5 hover:bg-[#6cada6] transition-all cursor-pointer" />
          </form>
        </div>
      </div>
    </div>
    <div class="">
      <div id="product-list" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
        <?php
        $productList = $params['products'];
        foreach ($productList as $product) {
          $author = array_filter($authors, function ($author) use ($product) {
            return $author->id === $product->author_id;
          });
          $author = reset($author);
        ?>
          <div class="flex flex-col items-center justify-center w-full px-[22px] box-border pt-5 product-info group border-solid border hover:border-gray-500 transition-all hover:shadow-xl">
            <div class="object-cover h-full p-2 w-60">
              <img src="resources/images/products/<?php echo $product->image ?>" alt="" class="object-cover w-full h-full" />
            </div>
            <div class="flex flex-col items-start justify-center w-full p-1 text-lg font-medium transition-all bg-white product-body group-hover:-translate-y-16">
              <div class="product-name">
                <a href="/">
                  <?php echo $product->name ?>
                </a>
              </div>
              <!-- <div class=" product-rate">
                <?php for ($i = 1; $i <= $product->star; $i++) : ?>
                  <i class="fa fa-star text-yellow-400" aria-hidden="true"></i>
                <?php endfor; ?>
              </div> -->
              <div class="text-sm text-gray-500 product-author">
                <?php echo $author->name ?>
              </div>
              <div class="p-0 font-semibold product-price text-primary-900">
                <?php echo $product->price ?>$
              </div>
              <div class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
                <p class="font-semibold select-option-text">Add to wishlist</p>
                <i class="p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"></i>
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
  const getUsers = async () => {
    let d1 = await fetch("http://localhost/the-leafy-liberties/data/getProducts")
    let d2 = await d1.json()
    console.log(d2)
  }
  getUsers()
</script>