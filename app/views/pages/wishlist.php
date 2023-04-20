<?php
$products = $params["products"];
?>
<div class="container mx-auto">
  <div class="flex flex-col items-center my-10 md:my-16">
    <i class="fa-solid fa-heart text-9xl text-[#2e524e]"></i>
    <h1 class="text-4xl text-green-800 md:text-6xl">My wishlist</h1>
  </div>
  <div class="w-full h-[765px] overflow-y-scroll">
    <table class="w-full border-collapse border-0 border-solid border-b-[1px]">
      <thead class="w-full bg-[#2e524e] rounded-sm text-[#F1F1F1] sticky top-0">
        <tr class="">
          <th class="px-4 py-2">
            Product
          </th>
          <th class="px-4 py-2">
            Product name
          </th>
          <th class="px-4 py-2">
            Price
          </th>
          <!-- <th class="px-4 py-2">
            Quantity
          </th> -->
          <th class="px-4 py-2">
            Add to cart
          </th>
          <th class="px-4 py-2">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <!-- foreach product -->

        <?php foreach ($products as $product): ?>

          <tr class="text-center border-0 border-solid border-b-[1px]">
            <td>
              <img src="<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>" class="w-32 mx-auto h-36" />
            </td>
            <td>
              <?php echo $product->name; ?>
            </td>
            <td>
              <?php echo $product->price; ?>
            </td>
            <td class="px-1 py-2">

              <!-- button move to cart -->
              <button class="px-4 py-2 font-bold text-white transition-all rounded-md bg-primary hover:bg-primary-800">
                <i class="fa-solid fa-cart-plus"></i>
              </button>
            </td>
            <td class="px-4 py-2">
              <button class="px-4 py-2 font-bold text-white transition-all bg-red-500 rounded-md hover:bg-red-400">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
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