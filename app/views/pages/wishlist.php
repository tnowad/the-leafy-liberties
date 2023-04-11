<div class="container mx-auto">
  <div class="my-10 md:my-16 flex flex-col items-center">
    <i class="fa-solid fa-heart text-9xl text-[#2e524e]"></i>
    <h1 class=" text-4xl text-green-800 md:text-6xl">My wishlist</h1>
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
          <th class="px-4 py-2">
            Quantity
          </th>
          <th class="px-4 py-2">
            Add to cart
          </th>
          <th class="px-4 py-2">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $wishlist = $params['wishlist'];
        foreach ($wishlist as $wishlist) {
        ?>
          <tr class="text-center border-0 border-solid border-b-[1px]">
            <td>
              <img src="<?php echo $wishlist->image ?>" alt="<?php echo $wishlist->product_name ?>" class="h-36 w-32 mx-auto" />
            </td>
            <td><?php echo $wishlist->product_name ?></td>
            <td><?php echo $wishlist->price ?></td>
            <td>
              <div>
                <div class="flex items-center justify-center w-fit mx-auto h-fit">
                  <button class="minus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all">
                    <i class="fa-solid fa-minus"></i>
                  </button>
                  <span class="m-5 text-lg text-count <?php echo $wishlist->product_id ?> "><?php echo $wishlist->quantity ?></span>
                  <button class="plus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all">
                    <i class="fa-solid fa-plus"></i>
                  </button>
                </div>
              </div>
            </td>
            <td class="px-1 py-2">
              <button class="bg-[#315854] hover:bg-[#8cbfba] text-white font-bold py-2 px-4 rounded-md transition-all">
                <i class="fa-brands fa-opencart"></i>
              </button>
            </td>
            <td class="px-4 py-2">
              <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded-md transition-all">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>
        <?php }
        ?>
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