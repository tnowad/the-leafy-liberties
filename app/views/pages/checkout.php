<?php

use App\Models\Setting;
use Core\Application;

$auth = Application::getInstance()->getAuthentication();
$user = $auth->getUser();

$shippingMethods = [
  [
    "id" => 1,
    "name" => "Standard",
    "price" => 2.99,
  ],
  [
    "id" => 2,
    "name" => "Express",
    "price" => 5.99,
  ],
  [
    "id" => 3,
    "name" => "Premium",
    "price" => 9.99,
  ]
];

$tax = 0;
$setting = Setting::findOne(["name" => "tax"]);
if ($setting) {
  $tax = $setting->value / 100;
}

$cartItems = $params["cartItems"];

$totalMoney = 0;

foreach ($cartItems as $cartItem) {
  $totalMoney += $cartItem->quantity * $cartItem->product()->price;
}

$shipping = 2.99;
$taxMoney = $totalMoney * $tax;
$grandTotal = $totalMoney + $shipping + $taxMoney;

?>
<div class="flex items-center justify-center w-full mt-10">
  <form class="container flex flex-wrap xl:flex-nowrap">
    <div class="flex flex-col w-full left-container">
      <div class="w-full p-5 border-0 shadow-lg bill-container rounded-2xl shadow-gray-300">
        <h2 class="mb-5 text-xl font-bold bill-header">
          Billing Address
        </h2>
        <div class="px-5 sm:w-full md:w-full ">
          <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-2 w-full mt-3">
            <legend class="px-1">Name</legend>
            <input type="text" name="name" placeholder="Your name" class="w-full px-2 py-1 focus:outline-none focus:border-0" value="<?php echo $user->name ?>" />
          </fieldset>
          <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-2 w-full mt-3">
            <legend class="px-1">Email</legend>
            <input type="email" name="email" id="" placeholder="Your Email" class="w-full px-2 py-1 focus:outline-none focus:border-0" value="<?php echo $user->email ?>" />
          </fieldset>
          <fieldset class="border-[1px] border-gray-600 border-solid rounded-md px-2 py-1 mt-3">
            <legend class="px-1">Address</legend>
            <input type="text" name="address" id="" value="<?php echo $user->address ?>" class="w-full p-2 focus:outline-none focus:border-0" placeholder="12 Wall Street,. . . . ." />
          </fieldset>

          <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-2 w-full">
            <legend class="px-1">Phone</legend>
            <input type="number" name="phone" id="" placeholder="Your phone" class="w-full px-2 py-1 focus:outline-none focus:border-0" value="<?php echo $user->phone ?>" />
          </fieldset>
        </div>
      </div>
      <div class="w-full p-5 mt-5 border-0 shadow-lg shipping-container rounded-2xl shadow-gray-300 ">
        <h2 class="mb-5 text-xl font-bold bill-header">
          Shipping Method
        </h2>
        <div class="flex flex-col justify-between gap-5 px-5 choice">
          <?php foreach ($shippingMethods as $shippingMethod) : ?>
            <div class="first-choice border-[1px] border-gray-500 p-3 border-solid rounded-lg flex items-center justify-start cursor-pointer" onclick="document.getElementById('shipping-method-<?php echo $shippingMethod['id']; ?>').checked = true;">
              <input type="radio" name="shipping-method" id="shipping-method-<?php echo $shippingMethod['id']; ?>" class="accent-[#315854]" />
              <label for="shipping-method-<?php echo $shippingMethod['id']; ?>" class="ml-2 text-lg font-bold cursor-pointer">
                <?php echo $shippingMethod["price"] ?>$
              </label>
              <p class="ml-6">
                <?php echo $shippingMethod["name"] ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="w-full p-5 mt-5 mb-10 border-0 shadow-lg payment-container rounded-2xl shadow-gray-300">
        <h2 class="mb-5 text-xl font-bold payment-header">
          Payment method
        </h2>
        <div class="flex flex-col justify-between gap-5 px-5 choice">
          <div class="payment-choice border-[1px] border-gray-500 p-3 border-solid rounded-lg flex items-center justify-start cursor-pointer transition-all">
            <input type="radio" name="pay-option" id="cash" class="accent-[#315854]" value="cash" />
            <label for="cash" class="ml-2 text-lg font-bold">Cash on delivery
              <span class="ml-6 text-sm font-normal ">
                You will pay when your order is delivered</span>
            </label>
          </div>
          <div class="payment-choice border-[1px] border-gray-500 p-3 border-solid rounded-lg flex items-center justify-start cursor-pointer" for="credit">
            <input type="radio" name="pay-option" id="credit" class="accent-[#315854]" value="credit" />
            <label for="credit" class="ml-2 text-lg font-bold">Credit
              <span class="ml-6 text-sm font-normal">
                You will pay with your credit card and your order will be delivered
              </span>
            </label>
          </div>
          <div id="credit-info" class="hidden mt-5">
            <label for="card-number" class="block mb-2 font-medium">Card Number:</label>
            <input type="text" name="card-number" id="card-number" class="block w-full px-4 py-2 mb-4 leading-tight bg-white border border-gray-400 rounded shadow-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
            <label for="expiry-date" class="block mb-2 font-medium">Expiration Date:</label>
            <input type="text" name="expiry-date" id="expiry-date" class="block w-full px-4 py-2 mb-4 leading-tight bg-white border border-gray-400 rounded shadow-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
            <label for="cvv" class="block mb-2 font-medium">CVV:</label>
            <input type="text" name="cvv" id="cvv" class="block w-full px-4 py-2 mb-4 leading-tight bg-white border border-gray-400 rounded shadow-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col items-end justify-start w-full mb-10 right-container sm:w-full md:w-full xl:w-3/4">
      <div class="w-full p-5 mt-5 border-0 shadow-lg order-preview rounded-2xl shadow-gray-300 md:w-full xl:w-3/4">
        <div class="flex justify-between header">
          <div class="left">
            <h2 class="text-xl font-bold">Order review</h2>
            <p class="pt-1 pl-2 number-items">
              <?php echo count($cartItems) ?> items in cart
            </p>
          </div>
          <div class="w-3 h-3 right" id="btn-toggle-order-preview">
            <i class="cursor-pointer fa-solid fa-chevron-down"></i>
          </div>
        </div>
        <div class="w-full" id="order-preview-list">
          <?php foreach ($cartItems as $CartItem) : ?>
            <?php $product = $CartItem->product(); ?>
            <div class="flex items-center justify-between mt-5">
              <div class="flex items-center">
                <img src="<?php echo BASE_URI . $product->image ?>" alt="<?php echo $product->name ?>" class="object-cover w-20 h-24 rounded-md">
                <div class="ml-4">
                  <h3 class="font-medium text-gray-700">
                    <?php echo $product->name ?>
                  </h3>
                  <div class="mt-1 text-sm text-gray-500">
                    <?php echo $product->author()->name ?>
                  </div>
                  <div class="mt-1 text-sm font-medium text-gray-700">
                    <?php echo $cartItem->quantity ?> x
                    <?php echo $product->price ?>
                  </div>
                </div>
              </div>
              <div class="text-gray-600">
                <?php echo $product->price * $cartItem->quantity ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php if (isset($coupon)) : ?>
        <div class="flex items-start justify-between w-full p-5 mt-5 border-0 shadow-lg discount-container rounded-2xl shadow-gray-300 md:w-full xl:w-3/4">
          <div class="mb-5 text-xl font-bold discount-code">
            <h2>Discount Codes</h2>
          </div>
          <div class="w-3 h-3 right">
            <i class="cursor-pointer fa-solid fa-chevron-down"></i>
          </div>
        </div>
      <?php endif; ?>
      <div class="w-full p-5 mt-5 border-0 shadow-lg billing-summary rounded-2xl shadow-gray-300 md:w-full xl:w-3/4">
        <div class="flex items-start justify-between header">
          <div class="mb-5 text-xl font-bold">
            <h2>Billing Summary</h2>
          </div>
        </div>
        <div class="body-summary">
          <div class="top-summary flex flex-col gap-5 border-0 border-solid border-gray-400 border-b-[1px] pb-5 px-5">
            <div class="flex items-center justify-between subtotal">
              <p class="f">Subtotal</p>
              <div class="font-bold subtotal-money">$
                <?php echo $totalMoney ?>
              </div>
            </div>
            <div class="flex items-center justify-between shipping">
              <p>Shipping</p>
              <div class="font-bold shipping-money">$
                <?php echo $shipping ?>
              </div>
            </div>
            <div class="flex items-center justify-between tax">
              <p>Tax</p>
              <div class="font-bold tax-money">
                <?php echo $tax ?>
              </div>
            </div>
          </div>
          <div class="mt-5 bottom-summary">
            <div class="flex items-center justify-between total-money">
              <h2 class="text-lg font-bold grand-total">Grand Total</h2>
              <div class="font-bold grand-money">$
                <?php echo $grandTotal ?>
              </div>
            </div>
            <fieldset class="border-[1px] border-gray-600 border-solid rounded-md p-1 mr-10 w-full h-auto mt-4">
              <legend class="px-2">Order Comment</legend>
              <textarea type="text" name="" id="" placeholder="Type here..." rows="7" class="w-full p-1 text-lg focus:outline-none focus:border-0">
              </textarea>
            </fieldset>
            <div class="btn-pay w-full bg-[#2e524e] text-center p-2 text-white rounded-lg mt-5 cursor-pointer hover:bg-[#52938d] hover:transition-all">
              <button type="submit" class="text-xl">
                Pay $
                <?php echo $grandTotal ?>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script>
  const cashOnDelivery = document.getElementById("cash");
  const creditCard = document.getElementById("credit");

  const creditInfo = document.getElementById("credit-info");

  creditCard.addEventListener("click", function() {
    creditInfo.classList.remove("hidden");
  });

  cashOnDelivery.addEventListener("click", function() {
    creditInfo.classList.add("hidden");
  });

  const btnToggleOrderPreview = document.getElementById("btn-toggle-order-preview");
  const orderPreviewList = document.getElementById("order-preview-list");

  btnToggleOrderPreview.addEventListener("click", function() {
    orderPreviewList.classList.toggle("hidden");
  });
</script>