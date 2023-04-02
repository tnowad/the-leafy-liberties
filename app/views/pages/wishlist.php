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
        $total = 6;
        for ($i = 1; $i <= $total; $i++) { ?>
          <tr class="text-center border-0 border-solid border-b-[1px]">
            <td>
              <img src="../assets/img/info_book_detail.png" class="h-36 w-32 mx-auto" />
            </td>
            <td>Jack Phats</td>
            <td>Jack Phats</td>
            <td>
              <div>
                <div class="flex items-center justify-center w-fit mx-auto h-fit">
                  <button class="minus text-white bg-[#40736d] px-4 py-2 rounded hover:bg-[#6cada6] transition-all">
                    <i class="fa-solid fa-minus"></i>
                  </button>
                  <span class="m-5 text-lg text-count">1</span>
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
  <!-- <table key={item.id}
    class="ml-5 mb-8 pt-10 flex flex-row justify-around border-0 border-t-2 border-gray-200 border-solid ">
    <thead>
      <tr class="flex flex-col">
        <th class={ item.name==='Action' ? `h-16 pt-5` : `h-auto` } key={item.name}>
          {item.name}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center flex flex-col justify-around ">
        <td>{item.image}</td>
        <td>{item.category}</td>

        <td>{item.status}</td>
        <td>{item.amount}</td>
        <td class="border px-1 py-2">
          <button class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            <FontAwesomeIcon class="hover:" icon={faCartPlus} />
          </button>
          <button class="ml-3 bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            <FontAwesomeIcon icon={faTrash} />
          </button>
        </td>
        <td class="border px-4 py-2"></td>
      </tr>
    </tbody>
  </table> -->
</div>
<script>
  let count = 1;
  let text = document.querySelector(".text-count")
  let minus = document.querySelector(".minus")
  let plus = document.querySelector(".plus")
  console.log(text.innerHTML);
  minus.addEventListener("click", () => {
    if (count > 1) {
      count--;
      text.innerHTML = count;
    }
  })
  plus.addEventListener("click", () => {
    count++;
    text.innerHTML = count;
  })

</script>
