<div class="flex justify-center my-10">
  <div class="container grid lg:grid-cols-[200px,auto] 2xl:grid-cols-[250px,auto]">
    <div class="min-h-[400px] box-border mx-2 ">
      <div class="fixed">
        <h1 class="mb-2 text-2xl font-bold">Filter</h1>
        <div class="grid justify-around grid-cols-3 lg:block">
          <form class="w-full" method="" action="">
            <h1 class="mt-2 mb-2 text-xl font-bold">Deals</h1>
            <div>
              <input type="radio" name="deals" id="best-value" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="best-value" class="ml-2">
                Best value from shop
              </label>
              <br>
              <input type="radio" name="deals" id="member-only" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="member-only" class="ml-2">
                Member only
              </label>
            </div>
            <h1 class="mt-2 mb-2 text-xl font-bold">Your budget</h1>
            <div>
              <input type="radio" name="yourBudget" id="less-than-10" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="less-than-10" class="ml-2">
                Less than $10
              </label>
              <br>
              <input type="radio" name="yourBudget" id="11-to-30" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="11-to-30" class="ml-2">
                $11-$30
              </label>
              <br>
              <input type="radio" name="yourBudget" id="greater-than-30" class="w-4 h-4 text-green-600 bg-gray-300 rounded focus:ring-green-500 " />
              <label for="greater-than-30" class="ml-2">
                Greater than $30
              </label>
            </div>
            <input type="submit" value="Find" onclick="filterProducts(event)" class="py-2 px-5 bg-[#315854] font-semibold text-white rounded-lg my-5 hover:bg-[#6cada6] transition-all cursor-pointer" />
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
  function renderProducts(products) {
    const productContainer = document.getElementById('product-list');
    productContainer.innerHTML = '';

    products.forEach(product => {
      const productElement = document.createElement('div');
      productElement.classList.add('product');

      productContainer.innerHTML += `
          <div class="flex flex-col items-center justify-center w-full px-[22px] box-border pt-5 product-info group border-solid border hover:border-gray-500 transition-all hover:shadow-xl">
            <div class="object-cover h-full p-2 w-60">
              <img src="resources/images/products/${product.image}" alt="" class="object-cover w-full h-full" />
            </div>
            <div class="flex flex-col items-start justify-center w-full p-1 text-lg font-medium transition-all bg-white product-body group-hover:-translate-y-16">
              <div class="product-name">
                <a href="/">
               ${product.name}
                </a>
              </div>
              <div class="text-sm text-gray-500 product-author">
                Gia Bảo
              </div>
              <div class="p-0 font-semibold product-price text-primary-900">
              ${product.price}
              </div>
              <div class="flex items-center justify-between w-full transition-all translate-y-0 opacity-0 heart-option group-hover:opacity-100">
                <p class="font-semibold select-option-text">Add to wishlist</p>
                <i class="p-2 transition-all rounded-full cursor-pointer fa-regular fa-heart hover:bg-red-400 hover:text-white"></i>
              </div>
            </div>
          </div>
          `;
    });
  }

  function filterByPrice(products, priceRange) {
    let filteredProducts = [];
    // console.log(products)


    for (let i = 0; i < products.length; i++) {
      let product = products[i];
      if (priceRange === 'lessThan10' && product.price < 10) {
        filteredProducts.push(product);
      } else if (priceRange === 'between11And30' && product.price >= 11 && product.price <= 30) {
        filteredProducts.push(product);
      } else if (priceRange === 'greaterThan30' && product.price > 30) {
        filteredProducts.push(product);
      }
    }

    return filteredProducts;
  }



  async function filterProducts(event) {
    event.preventDefault();

    let products = await fetch("http://localhost/the-leafy-liberties/data/getProducts").then((response) => response.json())

    const bestValue = document.getElementById('best-value').checked;
    const memberOnly = document.getElementById('member-only').checked;
    const lessThan10 = document.getElementById('less-than-10').checked;
    const between11And30 = document.getElementById('11-to-30').checked;
    const greaterThan30 = document.getElementById('greater-than-30').checked;

    let filteredProducts = [];
    if (lessThan10) {
      filteredProducts = filterByPrice(products, "lessThan10");
    } else if (between11And30) {
      filteredProducts = filterByPrice(products, "between11And30");
    } else if (greaterThan30) {
      filteredProducts = filterByPrice(products, "greaterThan30");
    }

    renderProducts(filteredProducts);
  }
</script>