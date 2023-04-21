<?php
$cartItems = $params["cartItems"];
?>
<div class="w-full my-10">
  <div class="container mx-auto">
    <div class="wrapper flex justify-between items-start gap-[2.5%]">
      <div class="cart-list w-[65%] h-[800px] overflow-y-scroll p-4 bg-white shadow-lg rounded-2xl">
        <?php foreach ($cartItems as $cartItem): ?>
          <?php $product = $cartItem->product() ?>
          <div class="w-full">
            <div class="item p-4 border-0 border-solid border-b-[1px] border-gray-200">
              <div class="flex items-center justify-between item-detail">
                <div class="item-img w-36 h-36">
                  <img src="<?php echo BASE_URI . '/' . $product->image; ?>" alt="" class="w-full h-full object-contain" />
                </div>
                <div class="text">
                  <p class="mb-2 text-2xl book-name">
                    <?php echo $product->name; ?>
                  </p>
                  <p class="text-base book-author">
                    <?php echo $product->author()->name; ?>
                  </p>
                </div>
                <p class="text-xl price">
                  <?php echo $product->price; ?>
                </p>
                <div>
                  <div class="flex items-center justify-center mx-auto w-fit h-fit">
                    <button class="minus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all">
                      <i class="fa-solid fa-minus"></i>
                    </button>
                    <span class="m-5 text-lg text-count">
                      <?php echo $cartItem->quantity; ?>
                    </span>
                    <button class="plus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </div>
                </div>
                <p class="text-xl counter-price">
                  <?php echo $product->price * $cartItem->quantity; ?>$
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="cart-bill w-[30%] p-5 bg-white shadow-lg rounded-2xl">
        <p class="cart-bill-header text-2xl text-left py-3 border-0 border-b-[1px] border-solid border-gray-300 ">
          Cart Totals
        </p>
        <div class="flex items-center justify-between py-4 total-bill">
          <span class="text-xl text-bill">Total:</span>
          <span class="text-xl money-bill">
            <?php
            $total = 0; foreach ($cartItems as $cartItem) {
              $product = $cartItem->product();
              $total += $product->price * $cartItem->quantity;
            }
            echo $total; ?>
            $
          </span>
        </div>
        <a href="<?php echo BASE_URI . "/checkout"; ?>"
          class="px-5 py-2 bg-[#315854] rounded-lg text-white text-lg font-semibold hover:bg-[#6cada6] hover:text-white transition-all">
          Check out
        </a>
      </div>
    </div>
    <div class="flex my-8 coupon-code">
      <input type="text" name="" id="" placeholder="Enter coupon code"
        class="px-3 py-2 border-gray-400 border-solid border-[1px] rounded-xl focus:outline-none" />
      <button
        class="ml-5 px-5 py-2 bg-[#315854] rounded-xl text-white text-lg font-semibold hover:bg-[#6cada6] hover:text-white transition-all">
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
