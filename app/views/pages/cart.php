<div class="w-full my-10">
  <div class="container mx-auto">
    .
    <div class="wrapper flex justify-between items-start gap-[2.5%]">
      <div class="cart-list w-[65%] h-[800px] overflow-y-scroll p-4 bg-white shadow-lg rounded-2xl">
        <?php
        $total = 0;
        foreach ($cart as $cart) {
          $product = array_filter($products, function ($product) use ($cart) {
            return $product->id === $cart->product_id;
          });
          $product = reset($product);
          $author = array_filter($authors, function ($author) use ($product) {
            return $author->id === $product->author_id;
          });
          $author = reset($author);
          $total = $total + $product->price * $cart->quantity;
        ?>
          <div class="w-full">
            <div class="item p-4 border-0 border-solid border-b-[1px] border-gray-200">
              <div class="item-detail flex justify-between items-center">
                <div class="item-img w-36">
                  <img src="resources/images/products/<?php echo $product->image_url ?>" alt="" class="w-full h-full object-cover rounded-2xl" />
                </div>
                <div class="text">
                  <p class="book-name text-2xl mb-2"><?php echo $product->title ?></p>
                  <p class="book-author text-base"><?php echo $author->name ?></p>
                </div>
                <p class="price text-xl"><?php echo $product->price  ?></p>
                <div>
                  <div class="flex items-center justify-center w-fit mx-auto h-fit">
                    <button class="minus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all">
                      <i class="fa-solid fa-minus"></i>
                    </button>
                    <span class="m-5 text-lg text-count"><?php echo $cart->quantity ?></span>
                    <button class="plus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </div>
                </div>
                <p class="counter-price text-xl"><?php echo $product->price * $cart->quantity  ?>$</p>
              </div>
            </div>
          </div>
        <?php }
        ?>
      </div>
      <div class="cart-bill w-[30%] p-5 bg-white shadow-lg rounded-2xl">
        <p class="cart-bill-header text-2xl text-left py-3 border-0 border-b-[1px] border-solid border-gray-300 ">
          Cart Totals
        </p>
        <div class="total-bill flex justify-between items-center py-4">
          <span class="text-bill text-xl">Total:</span>
          <span class="money-bill text-xl">
            <?php
            echo $total;
            ?>
            $
          </span>
        </div>
        <button class="px-5 py-2 bg-[#315854] rounded-2xl text-white text-lg font-semibold hover:bg-[#6cada6] hover:text-white transition-all">
          Check out
        </button>
      </div>
    </div>
    <div class="coupon-code flex my-8">
      <input type="text" name="" id="" placeholder="Enter coupon code" class="px-3 py-2 border-gray-400 border-solid border-[1px] rounded-xl focus:outline-none" />
      <button class="ml-5 px-5 py-2 bg-[#315854] rounded-xl text-white text-lg font-semibold hover:bg-[#6cada6] hover:text-white transition-all">
        Apply
      </button>
    </div>
  </div>
</div>
<script>
  document.querySelectorAll('.plus, .minus').forEach(button => {
    button.addEventListener('click', event => {
      const span = event.currentTarget.parentElement.querySelector('.text-count');
      let quantity = parseInt(span.textContent);
      if (event.currentTarget.classList.contains('plus')) {
        quantity++;
      } else if (event.currentTarget.classList.contains('minus') && quantity > 0) {
        quantity--;
      }
      span.textContent = quantity;
    });
  });
</script>