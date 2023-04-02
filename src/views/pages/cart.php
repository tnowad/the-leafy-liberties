<div class="w-full my-10">
  <div class="container mx-auto">
    <div class="wrapper flex justify-between items-start gap-[2.5%]">
      <div class="cart-list w-[65%] h-[500px] overflow-y-scroll p-4 border-[1px] border-solid border-gray-400 rounded-2xl">
        <div class="w-full">
          <div class="item p-4 border-0 border-solid border-b-[1px] border-gray-200">
            <div class="item-detail flex justify-between items-center">
              <div class="item-img w-36">
                <img src="./views/assets/img/info_book_detail.png" alt="" class="w-full h-full object-cover rounded-2xl" />
              </div>
              <div class="text">
                <p class="book-name text-2xl mb-2">Misty Figueroa</p>
                <p class="book-author text-base">Misty Figueroa</p>
              </div>
              <p class="price text-xl">150.000VNĐ</p>
              <div class="">
                <div class="count-section flex flex-row justify-between items-center gap-2 border-[1px] border-solid p-1 rounded-full w-full">
                  <FontAwesomeIcon icon={faMinus} class="px-2" cursor="pointer" />
                  <input type="number" class="text-center counter w-10 border-none focus:outline-none text-lg" value="1" />
                  <FontAwesomeIcon icon={faPlus} class="px-2" cursor="pointer" />
                </div>
              </div>
              <p class="counter-price text-xl">150.000VNĐ</p>
            </div>
          </div>
        </div>
      </div>
      <div class="cart-bill w-[30%] p-4 border-[1px] border-solid border-gray-400 rounded-2xl">
        <p class="cart-bill-header text-2xl text-left py-3 border-0 border-b-[1px] border-solid border-gray-300 ">
          Cart Totals
        </p>
        <div class="total-bill flex justify-between items-center py-4">
          <span class="text-bill text-xl">Total:</span>
          <span class="money-bill text-xl">1500000VNĐ</span>
        </div>
        <button class="ml-5 px-5 py-2 bg-green-800 rounded-2xl text-white text-lg font-semibold hover:bg-green-500 hover:text-green transition-all">
          Check out
        </button>
      </div>
    </div>
    <div class="coupon-code flex my-8">
      <input type="text" name="" id="" placeholder="Enter coupon code" class="px-3 py-2 border-gray-400 border-solid border-[1px] rounded-2xl focus:outline-none" />
      <button class="ml-5 px-5 py-2 bg-green-800 rounded-2xl text-white text-lg font-semibold hover:bg-green-500 hover:text-green transition-all">
        Apply
      </button>
    </div>
  </div>
</div>