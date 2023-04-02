<div class="flex justify-center my-10">
  <div class="container grid lg:grid-cols-[200px,auto] 2xl:grid-cols-[250px,auto]">
    <div class="box-border mx-2">

      <form>
        <h1 class="font-bold text-2xl mb-2">Filter</h1>
        <div class="grid grid-cols-3 justify-around lg:block">

          <div class="w-full">
            <h1 class="font-bold text-xl mb-2 mt-2">Deals</h1>
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
            <h1 class="font-bold text-xl mb-2 mt-2">Your budget</h1>
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
            <h1 class="font-bold text-xl mb-2 mt-2">Rating</h1>
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
        $total = 20;
        for ($i = 1; $i <= $total; $i++) { ?>
          <div class="w-full flex flex-col justify-center  items-center p-1">
            <div class="w-56 h-full object-cover">
              <img src="./views/assets/img/productImg.png" alt="" class="w-full" />
            </div>
            <div class=" w-full p-1 text-lg font-medium flex flex-col justify-center items-center">
              <div class="text-center">
                <a class="text-2xl" href="" alt> My Dearest Darkest</a>
              </div>
              <div class="">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <div class="product-author text-sm">Enrique Wallace</div>
              <div class="desc">description</div>
              <div class=" flex justify-center p-0 text-primary-900 font-semibold">
                <span>150.000</span>
              </div>
            </div>
          </div>
        <?php }
        ?>
      </div>
      <div class="my-5">
        <ul class="pagination flex justify-center items-center gap-5 text-center">
          <li class="pagination-items p-2 bg-gray-100 rounded-full text-green-bg-green-800-600 font-semibold
                        hover:text-white hover:bg-green-800 transition-all">
            <button>Previous</button>
          </li>
          <li class="pagination-items p-2 bg-green-800 text-white rounded-full w-10 h-10 font-semibold
                        hover:text-white hover:bg-green-800 transition-all">
            <button>1</button>
          </li>
          <li class="pagination-items p-2 bg-gray-100 rounded-full w-10 h-10 text-green-bg-green-800-600
                        font-semibold hover:text-white hover:bg-green-800 transition-all">
            <button>2</button>
          </li>
          <li class="pagination-items p-2 bg-gray-100 rounded-full w-10 h-10 text-green-bg-green-800-600
                        font-semibold hover:text-white hover:bg-green-800 transition-all">
            <button>3</button>
          </li>
          <li class="pagination-items p-2 bg-gray-100 rounded-full w-10 h-10 text-green-bg-green-800-600
                        font-semibold hover:text-white hover:bg-green-800 transition-all">

            <button>4</button>
          </li>
          <li class="pagination-items p-2 bg-gray-100 rounded-full text-green-bg-green-800-600 font-semibold
                        hover:text-white hover:bg-green-800 transition-all">
            <button>Next</button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>