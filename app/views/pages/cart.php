<div class="w-full my-10">
  <div class="container mx-auto">
    .
    <div class="wrapper flex justify-between items-start gap-[2.5%]">
      <div
        class="cart-list w-[65%] h-[800px] overflow-y-scroll p-4 bg-white shadow-lg rounded-2xl">
        <?php
        $total = 6;
        for ($i = 1; $i <= $total; $i++) { ?>
          <div class="w-full">
            <div class="item p-4 border-0 border-solid border-b-[1px] border-gray-200">
              <div class="item-detail flex justify-between items-center">
                <div class="item-img w-36">
                  <img src="../assets/img/info_book_detail.png" alt="" class="w-full h-full object-cover rounded-2xl" />
                </div>
                <div class="text">
                  <p class="book-name text-2xl mb-2">Misty Figueroa</p>
                  <p class="book-author text-base">Misty Figueroa</p>
                </div>
                <p class="price text-xl">150.000VNĐ</p>
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
                <p class="counter-price text-xl">150.000VNĐ</p>
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
          <span class="money-bill text-xl">1500000VNĐ</span>
        </div>
        <button
          class="px-5 py-2 bg-[#315854] rounded-2xl text-white text-lg font-semibold hover:bg-[#6cada6] hover:text-white transition-all">
          Check out
        </button>
      </div>
    </div>
    <div class="coupon-code flex my-8">
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
