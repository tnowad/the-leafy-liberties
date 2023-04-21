<?php

namespace App\Controllers\Customer;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ShippingMethod;
use Core\Application;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;

class CheckoutController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      return $response->redirect(BASE_URI . "/login");
    }
    $cartItems = Cart::findAll(["user_id" => $auth->getUser()->id]);
    return $response->setBody(
      View::renderWithLayout(new View("pages/checkout"), [
        "title" => "Checkout",
        "cartItems" => $cartItems,
      ])
    );
  }

  public function confirm(Request $request, Response $response)
  {
    dd($request->getParams());
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      return $response->redirect(BASE_URI . "/login");
    }
    Database::getInstance()->beginTransaction();

    $cartItems = Cart::findAll(["user_id" => $auth->getUser()->id]);
    $orderItems = [];
    $totalPrice = 0;
    foreach ($cartItems as $cartItem) {
      $orderItem = new OrderProduct();
      $orderItem->product_id = $cartItem->product_id;
      $orderItem->quantity = $cartItem->quantity;
      $orderItem->price = $cartItem->product()->price;
      $totalPrice += $orderItem->price * $orderItem->quantity;
      $orderItems[] = $orderItem;
    }

    $order = new Order();
    $order->user_id = $auth->getUser()->id;
    $order->name = $request->getParam('name');
    $order->email = $request->getParam('email');
    $order->address = $request->getParam('address');
    $order->phone = $request->getParam('phone');
    $order->shipping_method_id = ShippingMethod::findOne(['id' => $request->getParam('shipping-method-id')])->id;
    $order->payment_method_type = $request->getParam('payment-method-type');
    $order->description = $request->getParam('description');
    $order->total_price = $totalPrice;
    if ($order->payment_method_type == 'credit') {
      $order->card_number = $request->getParam('card-number');
      $order->expired_date = $request->getParam('expired-date');
      $order->cvv = $request->getParam('cvv');
    }

    $order->save();
    foreach ($orderItems as $orderItem) {
      $orderItem->order_id = $order->id;
      $orderItem->save();
    }
    foreach ($cartItems as $cartItem) {
      $cartItem->delete();
    }

    Database::getInstance()->commitTransaction();

    return $response->redirect(BASE_URI . "/checkout/success");

  }
}