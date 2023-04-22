<?php
$products = $params["products"]; ?>
<div class="container mx-auto">
  <div class="flex justify-start items-center my-8 md:my-14">
    <h1 class="text-xl text-primary-700 md:text-3xl uppercase tracking-widest">wishlist</h1>
  </div>
  <div class="w-full h-[765px] overflow-y-scroll px-8">
    <?php if (count($products) == 0): ?>
      <div class="flex flex-col justify-center items-center h-[60%]">
        <i class="fa-solid fa-heart-pulse text-[100px] text-gray-400"></i>
        <h1 class="uppercase text-6xl text-gray-400 tracking-widest">Wishlist is
          empty</h1>
      </div>
    <?php else: ?>
      <table class="w-full border-collapse border-0 border-solid border-b-[1px]">
        <thead class="w-full rounded-sm text-gray-600 sticky top-0 border-b border-gray-300 m-3">
          <tr class="text-left uppercase font-normal">
            <th>

            </th>
            <th class="px-9 py-2">
              Product
            </th>
            <th class="py-2">
            </th>
            <th>
              Author
            </th>
            <th class="py-2">
              Price
            </th>
            <th class="py-2">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product): ?>
            <tr class="border-0 border-solid border-b-[1px]">
              <td class="text-right">
                <button class="px-4 py-2 font-bold text-gray-800 hover:text-black transition-all"
                  onclick="removeFromWishlist(<?php echo $product->id; ?>)">
                  <i class="fa-solid fa-x"></i>
                </button>
              </td>
              <td class="p-3 w-36 h-36">
                <img src="<?php echo BASE_URI . $product->image; ?>" alt="<?php echo $product->name; ?>"
                  class="w-full h-full mx-auto object-contain" />
              </td>
              <td>
                <?php echo $product->name; ?>
              </td>
              <td>
                <?php echo $product->author()->name ?>
              </td>
              <td>
                <?php echo $product->price; ?>
              </td>
              <td class="px-1 py-2">
                <button class="px-4 py-2 font-bold text-white transition-all bg-primary hover:bg-primary-700 w-full"
                  onclick="addToCart(<?php echo $product->id; ?>)">
                  <i class="fa-solid fa-cart-plus"></i>
                  Add to cart
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif ?>
  </div>
  <div class="flex justify-end mt-4 gap-3">
    <!-- move all product in wishlist to cart -->

    <button class="px-4 py-2 font-bold text-white transition-all bg-primary hover:bg-primary-700"
      onclick="moveAllToCart()">
      <i class="fa-solid fa-cart-plus"></i>
      Move all to cart
    </button>

    <!-- remove all product in wishlist -->

    <button class="px-4 py-2 font-bold text-white transition-all bg-red-500 hover:bg-red-400"
      onclick="removeAllFromWishlist()">
      <i class="fa-solid fa-trash"></i>
      Remove all
    </button>

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

<script type="module">
  import Toast from '<?php echo BASE_URI . "/resources/js/toast.js"; ?>';
  import FetchXHR from '<?php echo BASE_URI . "/resources/js/fetch-xhr.js"; ?>';

  document.addToCart = (id) => {
    FetchXHR.post('<?php echo BASE_URI . "/api/wishlist/add-to-cart"; ?>', { id }, {
      'Content-Type': 'application/json'
    }).then(response => {
      const data = response.data;
      new Toast({
        message: data.message,
        type: data.type,
      });
    }).catch(error => {
      new Toast({
        message: 'Something went wrong',
        type: 'error',
      });
    });
  }

  document.moveAllToCart = () => {
    FetchXHR.post('<?php echo BASE_URI . "/api/wishlist/move-all-to-cart"; ?>').then(response => {
      if (response.type === 'error') {
        alert(response.message);
      } else if (response.type === 'info') {
        alert(response.message);
      } else {
        alert('All products added to cart');
      }
    }).catch(error => {
      alert('Something went wrong');
    });
  }

  document.removeFromWishlist = (id) => {
    FetchXHR.post('<?php echo BASE_URI . "/api/wishlist/remove"; ?>', {
      id: id,
    }).then(response => {
      if (response.type === 'error') {
        alert(response.message);
      } else if (response.type === 'info') {
        alert(response.message);
      } else {
        alert('Product deleted from wishlist');
      }
    }).catch(error => {
      alert('Something went wrong');
    });
  }

  document.removeAllFromWishlist = () => {
    FetchXHR.post('<?php echo BASE_URI . "/api/wishlist/empty"; ?>').then(response => {
      if (response.type === 'error') {
        alert(response.message);
      } else if (response.type === 'info') {
        alert(response.message);
      } else {
        alert('All products deleted from wishlist');
      }
    }).catch(error => {
      alert('Something went wrong');
    });
  }
</script>
