<?php
$cartItems = $params["cartItems"];
?>
<div class="w-full my-10">
  <div class="container mx-auto">
    <div class="wrapper flex justify-between items-start gap-[2.5%]">
      <div class="cart-list w-[65%] h-[800px] overflow-y-scroll p-4 bg-white shadow-lg rounded-2xl">
        <?php if (count($cartItems) == 0): ?>
          <div class="flex flex-col items-center justify-center h-full gap-2">
            <i class="fa-solid fa-basket-shopping-simple text-[85px] text-gray-400"></i>
            <h1 class="text-5xl tracking-wider text-gray-400 uppercase">Cart is empty</h1>
          </div>
        <?php else: ?>
          <?php foreach ($cartItems as $cartItem): ?>
            <?php $product = $cartItem->product() ?>
            <div class="w-full">
              <div class="item p-4 border-0 border-solid border-b-[1px] border-gray-200">
                <div class="flex items-center justify-between item-detail">
                  <div class="item-img w-36 h-36">
                    <img src="<?php echo BASE_URI .  $product->image; ?>" alt=""
                      class="object-contain w-full h-full" />
                  </div>
                  <div class="text">
                    <p class="w-40 mb-2 text-2xl break-words book-name">
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
                    <form class="flex items-center justify-center mx-auto product-quantity w-fit h-fit">
                      <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                      <input type="submit" value="-" name="minus"
                        class="fa-solid fa-minus minus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all" />
                      <input type="number" name="quantity" class="w-6 m-5 text-lg text-count text-center"
                        value="<?php echo $cartItem->quantity; ?>" />
                      <input type="submit" value="+" name="plus"
                        class="fa-solid fa-plus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all" />
                    </form>
                  </div>
                  <p class="text-xl counter-price">
                    <?php echo $product->price * $cartItem->quantity; ?>$
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif ?>
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
    <div class="flex justify-between items-center w-[65%]">
      <div class="flex my-8 coupon-code">
        <input type="text" name="" id="" placeholder="Enter coupon code"
          class="px-5 py-3 border-gray-400 border-solid border-[1px] rounded-md focus:outline-none" />
        <button
          class="ml-5 px-4 py-3 bg-[#315854] rounded-md text-white text-lg font-semibold hover:bg-[#6cada6] hover:text-white transition-all">
          Apply
        </button>
      </div>
      <!-- remove all product in wishlist -->
      <button
        class="px-4 py-3 font-bold text-black transition-all border-2 rounded-sm hover:bg-red-400 hover:text-white hover:border-red-600 h-fit"
        onclick="removeAllFromCart()">
        <i class="fa-solid fa-trash"></i>
        Remove all
      </button>
    </div>
  </div>
</div>
<script type="module">
  import Toast from '<?php echo BASE_URI . "/resources/js/toast.js"; ?>';
  import FetchXHR from '<?php echo BASE_URI . "/resources/js/fetch-xhr.js"; ?>';

  document.removeAllFromCart = () => {
    FetchXHR.post('<?php echo BASE_URI . "/api/cart/empty"; ?>').then(response => {
      if (response.type === 'error') {
        alert(response.message);
      } else if (response.type === 'info') {
        alert(response.message);
      } else {
        alert('All products deleted from cart');
      }
    }).catch(error => {
      alert('Something went wrong');
    });
  }

  document.querySelectorAll('.product-quantity').forEach(form => {
    form.addEventListener('submit', event => {
      event.preventDefault();
      const id = form.querySelector('input[name="id"]').value;
      let quantity = form.querySelector('input[name="quantity"]').value;

      // base the value of the button to update the quantity of the product
      const button = event.submitter;
      if (button.name === 'plus') {
        quantity = parseInt(quantity) + 1;
      } else if (button.name === 'minus') {
        quantity = parseInt(quantity) - 1;
      }
      // update the quantity of the product
      document.updateQuantity(id, quantity);
      // reload the page
      location.reload();
    });
  });

  document.updateQuantity = (id, quantity) => {
    FetchXHR.post('<?php echo BASE_URI . '/api/cart/update' ?>', { id, quantity }, {
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
