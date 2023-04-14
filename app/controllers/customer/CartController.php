<?php

namespace App\Controllers\Customer;

use App\Models\Author;
use App\Models\Cart;
use App\Models\Product;
use Core\Application;
use Core\Controller;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\View;


class CartController extends Controller
{

  public function index(Request $request, Response $response)
  {
    $auth = Application::getInstance()->getAuthentication();
    if (!$auth->isAuthenticated()) {
      return $response->redirect('/login');
    }
    $cartItems = Cart::where(['user_id' => $auth->getUser()->id]);
    $products = [];

    // Get all products in cart
    foreach ($cartItems as $cartItem) {
      $product = Product::find($cartItem->product_id);
      $product->quantity = $cartItem->quantity;
      $products[] = $product;
    }

    return $response->setBody(View::render(new View('pages/cart/index'), [
      'products' => $products,
    ]));
  }
}