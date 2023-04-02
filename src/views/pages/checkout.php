<div class="w-full flex justify-center items-center mt-10">
  <div class="container flex flex-wrap sm:flex-wrap md:flex-wrap xl:flex-nowrap">
    <div class="left-container w-full flex flex-col justify-center">
      <div class="bill-container p-5 border-0 rounded-2xl shadow-lg shadow-gray-300 w-full">
        <h2 class="bill-header font-bold text-xl mb-5">
          Billing Address
        </h2>
        <form action="//" class="sm:w-full md:w-full lg:px-0 xl:px-5 ">
          <div class="full-name flex sm:flex-nowrap mobile:flex-wrap">
            <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-1 sm:mr-10 w-full mobile:mr-0">
              <legend class="px-1">First Name</legend>
              <input type="text" name="" id="" placeholder="Your first name" class="p-1" />
            </fieldset>
            <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-1 w-full">
              <legend class="px-1">Last Name</legend>
              <input type="text" name="" id="" placeholder="Your last name" class="p-1" />
            </fieldset>
          </div>
          <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-1 w-full mt-3">
            <legend class="px-1">Email Address</legend>
            <input type="email" name="" id="" placeholder="Your Email" class="p-1" />
          </fieldset>
          <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-1 mt-3">
            <legend class="px-1">Street Address</legend>
            <input type="email" name="" id="" class="p-1" />
          </fieldset>
          <div class="city flex sm:flex-nowrap mobile:flex-wrap justify-center mt-3">
            <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-1 sm:mr-10 w-full mobile:mr-0">
              <legend class="px-1">City</legend>
              <input type="text" name="" id="" placeholder="Your city name" class="p-1" />
            </fieldset>
            <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-1 w-full">
              <legend class="px-1">Phone</legend>
              <input type="text" name="" id="" placeholder="Your last name" class="p-1" />
            </fieldset>
          </div>
          <div class="checkForAddress flex items-center mt-3">
            <input type="checkbox" name="" id="" class="w-4 h-4" />
            <span class="ml-1 whitespace-nowrap">
              My billing and shipping address are the same
            </span>
          </div>
        </form>
      </div>
      <div class="shipping-container p-5 border-0 rounded-2xl shadow-lg shadow-gray-300 mt-5 w-full">
        <h2 class="bill-header font-bold text-xl mb-5">
          Shipping Method
        </h2>
        <div class="choice flex flex-col justify-between gap-5">
          <div class="first-choice border-[1px] border-gray-500 p-3 border-solid rounded-lg flex items-center justify-start">
            <input type="radio" name="options" id="" onChange={handleClicked} />
            <span class="font-bold text-lg ml-2">$2.99</span>
            <p class="ml-6">
              USPS 1st Class With Tracking (5 - 13 days) COVID19 Delay
            </p>
          </div>
          <div class="second-choice border-[1px] border-gray-500 p-3 border-solid rounded-lg flex items-center justify-start">
            <input type="radio" name="options" id="" />
            <span class="font-bold text-lg ml-2">$9.00</span>
            <p class="ml-6">
              USPS 1st Class With Tracking (3 - 5 days) COVID19 Delay
            </p>
          </div>
        </div>
      </div>
      <div class="payment-container p-5 border-0 rounded-2xl shadow-lg shadow-gray-300 mt-5 mb-10 w-full">
        <h2 class="payment-header font-bold text-xl mb-5">
          Payment method
        </h2>
        <div class="choice flex flex-col justify-between gap-5">
          <div class="paypal-choice border-[1px] border-gray-500 p-3 border-solid rounded-lg flex items-center justify-start">
            <input type="radio" name="payment-options" id="" />
            <span class="font-bold text-lg ml-2">Paypal</span>
            <p class="ml-6">
              You will be redirected to the PayPal website after submitting
              your order
            </p>
          </div>
          <div class="app-choice border-[1px] border-gray-500 p-3 border-solid rounded-lg flex items-center justify-start">
            <input type="radio" name="payment-options" id="" />
            <span class="font-bold text-lg ml-2">Momo</span>
            <p class="ml-6">
              You will be redirected to the Momo website after submitting
              your order
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="right-container flex flex-col justify-start items-end w-full sm:w-full md:w-full mb-10 xl:w-3/4">
      <div class="order-preview p-5 border-0 rounded-2xl shadow-lg shadow-gray-300 mt-5 w-full md:w-full xl:w-3/4">
        <div class="header flex justify-between">
          <div class="left">
            <h2 class="font-bold text-xl">Order review</h2>
            <p class="number-items pl-2 pt-1">3 items in cart</p>
          </div>
          <div class="right w-3 h-3">
            <FontAwesomeIcon icon={faChevronDown} />
          </div>
        </div>
      </div>
      <div class="discount-container flex justify-between items-start p-5 border-0 rounded-2xl shadow-lg shadow-gray-300 mt-5 w-full md:w-full xl:w-3/4">
        <div class="discount-code font-bold text-xl mb-5">
          <h2>Discount Codes</h2>
        </div>
        <div class="right w-3 h-3">
          <FontAwesomeIcon icon={faChevronDown} />
        </div>
      </div>
      <div class="billing-summary p-5 border-0 rounded-2xl shadow-lg shadow-gray-300 mt-5 w-full md:w-full xl:w-3/4">
        <div class="header flex justify-between items-start">
          <div class="font-bold text-xl mb-5">
            <h2>Billing Summary</h2>
          </div>
          <div class="w-3 h-3">
            <FontAwesomeIcon icon={faChevronDown} />
          </div>
        </div>
        <div class="body-summary">
          <div class="top-summary flex flex-col gap-5 border-0 border-solid border-gray-400 border-b-[1px] pb-5">
            <div class="subtotal flex justify-between items-center">
              <p class="f">Subtotal</p>
              <div class="subtotal-money font-bold">$3720,27</div>
            </div>
            <div class="discount flex justify-between items-center">
              <p>Discount</p>
              <div class="discount-money font-bold">-$3720,27</div>
            </div>
            <div class="membership flex justify-between items-center">
              <p>Warranty (Platinum)</p>
              <div class="membership-money font-bold">$3720,27</div>
            </div>
            <div class="shipping flex justify-between items-center">
              <p>Shipping</p>
              <div class="shipping-money font-bold">$3720,27</div>
            </div>
            <div class="tax flex justify-between items-center">
              <p>Tax</p>
              <div class="tax-money font-bold">$3720,27</div>
            </div>
          </div>
          <div class="bottom-summary mt-5">
            <div class="total-money flex justify-between items-center">
              <h2 class="grand-total text-lg font-bold">Grand Total</h2>
              <div class="grand-money font-bold">$3,439.00</div>
            </div>
            <!-- <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-1 mr-10 w-full h-auto mt-4">
              <legend class="px-2">Order Comment</legend>
              <textarea type="text" name="" id="" placeholder="Type here..." class="p-1 text-lg w-full" />
            </fieldset> -->
            <div class="btn-pay w-full bg-green-800 text-center p-2 text-white rounded-lg mt-5 cursor-pointer hover:bg-green-700 hover:transition-all">
              <button class="text-xl">
                Pay $3,439.00
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>